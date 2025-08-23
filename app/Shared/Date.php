<?php

namespace App\Shared;

class Date
{
    /* ---- Internal helpers ---- */
    private static function _fixAngle($a)
    {
        $twoPi = 2 * M_PI;
        $a = fmod($a, $twoPi);
        if ($a < 0) $a += $twoPi;
        return $a;
    }

    private static function _newMoon($k)
    {
        // Meeus-style approximation; returns JDN (TT) of mean new moon with corrections
        $T  = $k / 1236.85;
        $T2 = $T * $T;
        $T3 = $T2 * $T;
        $T4 = $T3 * $T;

        $Jd = 2451550.09765
            + 29.530588853 * $k
            + 0.0001337 * $T2
            - 0.000000150 * $T3
            + 0.00000000073 * $T4;

        // Convert anomalies to radians
        $M   = self::_fixAngle(2 * M_PI * (0.993126 + 99.997360560 * $T));      // Sun's mean anomaly
        $Mpr = self::_fixAngle(2 * M_PI * (0.451574 +  1.336755114 * $T));      // Moon's mean anomaly
        $F   = self::_fixAngle(2 * M_PI * (0.158210 + 13.064993006 * $T));      // Moon's argument of latitude

        $E = 1 - 0.002516 * $T - 0.0000074 * $T2;

        $deltaJd =
            -0.40720 * sin($Mpr)
                + 0.17241 * $E * sin($M)
                + 0.01608 * sin(2 * $Mpr)
                + 0.01039 * sin(2 * $F)
                + 0.00739 * $E * sin($Mpr - $M)
                - 0.00514 * $E * sin($Mpr + $M)
                + 0.00208 * $E * $E * sin(2 * $M)
                - 0.00111 * sin($Mpr - 2 * $F)
                - 0.00057 * sin($Mpr + 2 * $F)
                + 0.00056 * $E * sin(2 * $Mpr + $M)
                - 0.00042 * sin(3 * $Mpr)
                + 0.00042 * $E * sin($M + 2 * $F)
                + 0.00038 * $E * sin($M - 2 * $F)
                - 0.00024 * $E * sin(2 * $Mpr - $M)
                - 0.00017 * sin($Mpr + $M)
                - 0.00007 * sin($Mpr - 2 * $M)
                + 0.00004 * sin(2 * $Mpr + 2 * $F)
                + 0.00004 * sin(4 * $Mpr)
                + 0.00003 * sin($M + 2 * $F - $Mpr)
                + 0.00003 * sin(2 * $M + 2 * $F)
                - 0.00003 * sin($M + 2 * $Mpr)
                + 0.00003 * sin($Mpr + 2 * $F - $M);

        // ΔT can be ~0 for modern years; keeping as 0 keeps errors within minutes
        $deltaT = 0.0;

        return $Jd + $deltaJd + $deltaT;
    }

    private static function _sunLongitude($jdnUT)
    {
        // Returns ecliptic longitude (radians) at given UT JDN
        $T  = ($jdnUT - 2451545.0) / 36525.0;
        $T2 = $T * $T;

        // Mean anomaly of the Sun
        $M = self::_fixAngle(2 * M_PI * (0.993126 + 99.997360560 * $T));

        // Mean longitude of the Sun
        $L0 = self::_fixAngle(2 * M_PI * (0.7859453 + 99.997360560 * $T + 0.0003032 * $T2));

        // Equation of the center
        $DL = (6898 * sin($M) + 72 * sin(2 * $M)) / 1000000.0; // radians approx
        $L  = $L0 + $DL;
        return self::_fixAngle($L);
    }

    /* ---- Public API (names kept exactly as requested) ---- */

    private static function jdFromDate($dd, $mm, $yy)
    {
        $a = floor((14 - $mm) / 12);
        $y = $yy + 4800 - $a;
        $m = $mm + 12 * $a - 3;
        $jd = $dd + floor((153 * $m + 2) / 5) + 365 * $y + floor($y / 4) - floor($y / 100) + floor($y / 400) - 32045;
        return (int)$jd;
    }

    private static function getNewMoonDay($k, $timeZone)
    {
        $jdTT = self::_newMoon((int)$k);
        // Convert to local civil date (approx): add timezone offset and round to day
        return (int)floor($jdTT + 0.5 + $timeZone / 24.0);
    }

    private static function getSunLongitude($jdn, $timeZone)
    {
        // Compute the Sun longitude at local midnight -> convert to UT
        $jdnUT = $jdn - $timeZone / 24.0;
        return self::_sunLongitude($jdnUT); // radians in [0, 2π)
    }

    private static function getLunarMonth11($yy, $timeZone)
    {
        $off = self::jdFromDate(31, 12, $yy) - 2415021;
        $k = (int)floor($off / 29.530588853);
        $nm = self::getNewMoonDay($k, $timeZone);
        $sunLong = self::getSunLongitude($nm, $timeZone);
        // Lunar month 11 is the one containing the winter solstice (~270° = 3π/2)
        if ($sunLong >= self::_fixAngle(3 * M_PI / 2)) {
            $nm = self::getNewMoonDay($k - 1, $timeZone);
        }
        return (int)$nm;
    }

    private static function getLeapMonthOffset($a11, $timeZone)
    {
        $k = (int)floor(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
        $last = 0;
        $i = 1;
        $arc = self::getSunLongitude(self::getNewMoonDay($k + $i, $timeZone), $timeZone);
        do {
            $last = $arc;
            $i++;
            $arc = self::getSunLongitude(self::getNewMoonDay($k + $i, $timeZone), $timeZone);
        } while ((int)floor($arc / (M_PI / 6)) != (int)floor($last / (M_PI / 6)) && $i < 15);
        return $i - 1;
    }

    public static function convertSolar2Lunar($dd, $mm, $yy, $timeZone = 7)
    {
        $dayNumber = self::jdFromDate($dd, $mm, $yy);
        $k = (int)floor(($dayNumber - 2415021.076998695) / 29.530588853);
        $monthStart = self::getNewMoonDay($k + 1, $timeZone);
        if ($monthStart > $dayNumber) {
            $monthStart = self::getNewMoonDay($k, $timeZone);
        }

        $a11 = self::getLunarMonth11($yy, $timeZone);
        $b11 = self::getLunarMonth11($yy + 1, $timeZone);
        $lunarYear = $yy + 1;

        if ($a11 >= $monthStart) {
            $a11 = self::getLunarMonth11($yy - 1, $timeZone);
            $b11 = self::getLunarMonth11($yy, $timeZone);
            $lunarYear = $yy;
        }

        $lunarDay = $dayNumber - $monthStart + 1;
        $diff = (int)floor(($monthStart - $a11) / 29);
        $lunarLeap = 0;
        $lunarMonth = $diff + 11;

        if ($b11 - $a11 > 365) {
            $leapMonthDiff = self::getLeapMonthOffset($a11, $timeZone);
            if ($diff >= $leapMonthDiff) {
                $lunarMonth = $diff + 10;
                if ($diff == $leapMonthDiff) {
                    $lunarLeap = 1;
                }
            }
        }

        if ($lunarMonth > 12) {
            $lunarMonth -= 12;
        }
        if ($lunarMonth >= 11 && $diff < 4) {
            $lunarYear -= 1;
        }

        return [$lunarDay, $lunarMonth, $lunarYear, $lunarLeap];
    }
}
