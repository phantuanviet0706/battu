<?php

namespace App\Shared;

class Date
{
    private const PI = 3.14159265358979323846;

    /* ----------------- Helpers ----------------- */
    private static function jdFromDate($dd, $mm, $yy)
    {
        $a = floor((14 - $mm) / 12);
        $y = $yy + 4800 - $a;
        $m = $mm + 12 * $a - 3;
        $jd = $dd + floor((153 * $m + 2) / 5) + 365 * $y + floor($y / 4) - floor($y / 100) + floor($y / 400) - 32045;
        return (int)$jd;
    }

    /** Sóc (new moon) – chuỗi cổ điển dùng rộng rãi trong lịch VN/CN */
    private static function getNewMoonDay($k, $timeZone)
    {
        $T  = $k / 1236.85;
        $T2 = $T * $T;
        $T3 = $T2 * $T;
        $dr = self::PI / 180.0;

        // Mean time of new moon
        $Jd1 = 2415020.75933 + 29.53058868 * $k + 0.0001178 * $T2 - 0.000000155 * $T3;
        // Small correction
        $Jd1 += 0.00033 * sin((166.56 + 132.87 * $T - 0.009173 * $T2) * $dr);

        // Anomalies (degrees)
        $M   = 359.2242 + 29.10535608 * $k - 0.0000333 * $T2 - 0.00000347 * $T3;
        $Mpr = 306.0253 + 385.81691806 * $k + 0.0107306 * $T2 + 0.00001236 * $T3;
        $F   = 21.2964  + 390.67050646 * $k - 0.0016528 * $T2 - 0.00000239 * $T3;

        // Periodic terms
        $C1  = (0.1734 - 0.000393 * $T) * sin($M * $dr)
            + 0.0021 * sin(2 * $dr * $M)
            - 0.4068 * sin($Mpr * $dr)
            + 0.0161 * sin(2 * $dr * $Mpr)
            - 0.0004 * sin(3 * $dr * $Mpr)
            + 0.0104 * sin(2 * $dr * $F)
            - 0.0051 * sin($dr * ($M + $Mpr))
            - 0.0074 * sin($dr * ($M - $Mpr))
            + 0.0004 * sin($dr * (2 * $F + $M))
            - 0.0004 * sin($dr * (2 * $F - $M))
            - 0.0006 * sin($dr * (2 * $F + $Mpr))
            + 0.0010 * sin($dr * (2 * $F - $Mpr))
            + 0.0005 * sin($dr * ($M + 2 * $Mpr));

        // ΔT (ngày) – xấp xỉ đủ cho các năm hiện đại
        if ($T < -11) {
            $deltaT = 0.001 + 0.000839 * $T + 0.0002261 * $T2 - 0.00000845 * $T3 - 0.000000081 * $T * $T3;
        } else {
            $deltaT = -0.000278 + 0.000265 * $T + 0.000262 * $T2;
        }

        $jdNew = $Jd1 + $C1 - $deltaT;
        return (int) floor($jdNew + 0.5 + $timeZone / 24.0);
    }

    private static function getSunLongitude($jdn, $timeZone)
    {
        $dr = self::PI / 180.0;
        $T  = ($jdn - 2451545.5 - $timeZone / 24.0) / 36525.0;
        $T2 = $T * $T;

        $M  = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2;
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2;
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M)
            + (0.019993 - 0.000101 * $T) * sin(2 * $dr * $M)
            + 0.000290 * sin(3 * $dr * $M);
        $L  = $L0 + $DL;
        $L  = fmod($L, 360.0);
        if ($L < 0) $L += 360.0;
        return $L * $dr;
    }

    private static function getLunarMonth11($yy, $timeZone)
    {
        $off = self::jdFromDate(31, 12, $yy) - 2415021;
        $k = (int) floor($off / 29.530588853);
        $nm = self::getNewMoonDay($k, $timeZone);
        $sunLong = self::getSunLongitude($nm, $timeZone);
        if ((int) floor($sunLong / self::PI * 6) >= 9) {
            $nm = self::getNewMoonDay($k - 1, $timeZone);
        }
        return (int)$nm;
    }

    private static function getLeapMonthOffset($a11, $timeZone)
    {
        $k = (int) floor(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
        $last = 0;
        $i = 1;
        $arc = (int) floor(self::getSunLongitude(self::getNewMoonDay($k + $i, $timeZone), $timeZone) / self::PI * 6);
        while ($arc != $last && $i < 14) {
            $last = $arc;
            $i++;
            $arc = (int) floor(self::getSunLongitude(self::getNewMoonDay($k + $i, $timeZone), $timeZone) / self::PI * 6);
        }
        return $i - 1;
    }

    public static function convertSolar2Lunar($dd, $mm, $yy, $timeZone = 7)
    {
        $dayNumber = self::jdFromDate($dd, $mm, $yy);
        $k = (int) floor(($dayNumber - 2415021.076998695) / 29.530588853);

        $monthStart = self::getNewMoonDay($k + 1, $timeZone);
        if ($monthStart > $dayNumber) {
            $monthStart = self::getNewMoonDay($k, $timeZone);
        }

        $a11 = self::getLunarMonth11($yy - 1, $timeZone);
        $b11 = self::getLunarMonth11($yy, $timeZone);
        if ($monthStart >= $b11) {
            $a11 = $b11;
            $b11 = self::getLunarMonth11($yy + 1, $timeZone);
            $lunarYear = $yy + 1;
        } elseif ($monthStart >= $a11) {
            $lunarYear = $yy;
        } else {
            $a11 = self::getLunarMonth11($yy - 2, $timeZone);
            $b11 = self::getLunarMonth11($yy - 1, $timeZone);
            $lunarYear = $yy - 1;
        }
        $lunarDay = $dayNumber - $monthStart + 1;
        $diff = (int) floor(($monthStart - $a11) / 29);
        $lunarLeap = 0;
        $lunarMonth = $diff + 11;
        if ($b11 - $a11 > 365) {
            $leapMonthDiff = self::getLeapMonthOffset($a11, $timeZone);
            if ($diff >= $leapMonthDiff) {
                $lunarMonth = $diff + 10;
                if ($diff == $leapMonthDiff) $lunarLeap = 1;
            }
        }

        if ($lunarMonth > 12) $lunarMonth -= 12;
        if ($lunarMonth >= 11 && $diff < 4) $lunarYear -= 1;

        return [$lunarDay, $lunarMonth, $lunarYear, $lunarLeap];
    }
}
