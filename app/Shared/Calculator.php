<?php

namespace App\Shared;

use DateTime;

class Calculator
{
    /**
     * 1. Calculate Agricultural date
     * @param mixed $date
     * @return object
     */
    public static function calculateAgricultural($date)
    {
        $day = date('d', $date);
        $month = date('m', $date);

        $agricultural_format = Formula::getFormulaAgricutural();

        $input_date = DateTime::createFromFormat('d-m', "$day-$month");
        $agricultural = null;
        foreach ($agricultural_format as $month) {
            foreach ($month->range as $range) {
                $start_date = DateTime::createFromFormat('d-m', $range->start);
                $end_date = DateTime::createFromFormat('d-m', $range->end);
                if ($input_date >= $start_date && $input_date <= $end_date) {
                    $month->selected_range = $range;
                    $agricultural = $month;
                    break 2;
                }
            }
        }

        if (!$agricultural) {
            return Helper::release("Invalid agricultural date");
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $agricultural
        );
    }

    /**
     * 2. Calculate Heavenly Stem
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStem($date)
    {
        $year = date('Y', $date);

        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();

        $round_year_int = intval($year % 10);
        // $last_number_of_year = $year - $round_year_int * 10;

        $current_heavenly_stem = null;
        foreach ($heavenly_stem_format as $heavenly_stem) {
            if ($heavenly_stem->id != $round_year_int) {
                continue;
            }
            $current_heavenly_stem = $heavenly_stem;
            break;
        }

        if (!$current_heavenly_stem) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $current_heavenly_stem
        );
    }

    /**
     * 3. Calculate Earthly Branch
     * @param mixed $date
     * @return object
     */
    public static function calculateEarthlyBranch($date)
    {
        $year = date('Y', $date);

        $earthly_branch_format = Formula::getFormulaEarthlyBranch();

        $remaining = ($year - 4) % 12;

        $current_earthly_branch = null;
        foreach ($earthly_branch_format as $earthly_branch) {
            if ($earthly_branch->id != $remaining) {
                continue;
            }
            $current_earthly_branch = $earthly_branch;
            break;
        }
        if (!$current_earthly_branch) {
            return Helper::release("Invalid Earthly Branch date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $current_earthly_branch
        );
    }

    /**
     * 4. Calculate Heavenly Stem Month
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStemMonth($date)
    {
        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();

        $year = date('Y', $date);
        $lunar_date = Date::convertSolar2Lunar(
            date('d', $date),
            date('m', $date),
            $year
        );
        [$lunar_day, $lunar_month, $lunar_year, $isLeap] = $lunar_date;
        $heavenly_stem_year = intval($year % 10);
        $heavenly_stem_month = intval(($lunar_month - 1  + (($heavenly_stem_year + 9) * 2)) % 10);

        $current_heavenly_stem_by_month = null;
        foreach ($heavenly_stem_format as $format) {
            if ($format->id != $heavenly_stem_month) {
                continue;
            }
            $current_heavenly_stem_by_month = $format;
            break;
        }
        if (!$current_heavenly_stem_by_month) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $current_heavenly_stem_by_month
        );
    }

    /**
     * 5. Calculate Earthly Branch Month
     * @param mixed $date
     * @return object
     */
    public static function calculateEarthlyBranchMonth($date)
    {

        $earthly_branch_format = Formula::getFormulaEarthlyBranch();
        $lunar_date = Date::convertSolar2Lunar(
            date('d', $date),
            date('m', $date),
            date('Y', $date)
        );
        [$lunar_day, $lunar_month, $lunar_year, $isLeap] = $lunar_date;
        $earthly_branch = intval(($lunar_month + 1) % 12);

        $selected_earthly_branch_month = null;
        foreach ($earthly_branch_format as $format) {
            if ($format->id != $earthly_branch) {
                continue;
            }
            $selected_earthly_branch_month = $format;
            break;
        }

        if (!$selected_earthly_branch_month) {
            return Helper::release("Invalid Earthly Branch date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_earthly_branch_month
        );
    }

    /**
     * 6. Calculaed heavenly stem of day
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStemDay($date)
    {
        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();
        $result_calculate_hs_and_eb_day = self::calculateHSandEBday($date);

        $heavenly_stem_of_day_calculated = intval($result_calculate_hs_and_eb_day % 10);
        $selected_heavenly_stem_day = null;
        foreach ($heavenly_stem_format as $format) {
            if ($format->id == $heavenly_stem_of_day_calculated) {
                $selected_heavenly_stem_day = $format;
                break;
            }
        }
        if (!$selected_heavenly_stem_day) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_heavenly_stem_day
        );
    }

    /**
     * 7. Calculate earthly branch of day
     * @param mixed $date
     * @return object
     */
    public static function calculateEarthlyBranchDay($date)
    {
        $earthly_branch_format = Formula::getFormulaEarthlyBranch();
        $result_calculate_hs_and_eb_day = self::calculateHSandEBday($date);

        $earthly_branch_of_day_calculated = intval($result_calculate_hs_and_eb_day % 12);
        $selected_earthly_branch_day = null;
        foreach ($earthly_branch_format as $format) {
            if ($format->id == $earthly_branch_of_day_calculated) {
                $selected_earthly_branch_day = $format;
                break;
            }
        }
        if (!$selected_earthly_branch_day) {
            return Helper::release("Invalid Earthly Branch date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_earthly_branch_day
        );
    }

    /**
     * 8. Calculate heavenly stem by hour
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStemHour($date, $is_input_time = false)
    {
        if (!$is_input_time) {
            return Helper::release(
                "Get data successfully",
                Helper::$SUCCESS_CODE,
                null
            );
        }
        // Calculate heavenly stem of day
        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();
        $result_calculate_hs_and_eb_day = self::calculateHSandEBday($date);

        $heavenly_stem_of_day_calculated = intval($result_calculate_hs_and_eb_day % 10);

        $hour = date('H', $date);
        $heavenly_stem_by_hour = intval((($hour + 1) / 2 + ($heavenly_stem_of_day_calculated - 2) * 2) % 10);

        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();
        $selected_heavenly_stem_by_hour = null;
        foreach ($heavenly_stem_format as $format) {
            if ($format->id == $heavenly_stem_by_hour) {
                $selected_heavenly_stem_by_hour = $format;
                break;
            }
        }
        if (!$selected_heavenly_stem_by_hour) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_heavenly_stem_by_hour
        );
    }

    /**
     * 9. Calculate earthly branch by hour
     * @param mixed $date
     * @return object
     */
    public static function calculateEarthlyBranchHour($date, $is_input_time = false)
    {
        if (!$is_input_time) {
            return Helper::release(
                "Get data successfully",
                Helper::$SUCCESS_CODE,
                null
            );
        }
        $hour = date('H', $date);
        $earthly_branch_format = Formula::getFormulaEarthlyBranch();
        $earthly_branch_by_hour = intval((($hour + 1) / 2) % 10);

        $selected_earthly_branch_by_hour = null;
        foreach ($earthly_branch_format as $format) {
            if ($format->id == $earthly_branch_by_hour) {
                $selected_earthly_branch_by_hour = $format;
                break;
            }
        }
        if (!$selected_earthly_branch_by_hour) {
            return Helper::release("Invalid Earthly Branch date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_earthly_branch_by_hour
        );
    }

    public static function calculateHiddenStems($data)
    {
        $hidden_hs_in_eb_format = Formula::getFormulaHiddenHSinEB();

        $heavenly_stem = $data->heavenly_stem;
        $earthly_branch = $data->earthly_branch;
        $heavenly_stem_month = $data->heavenly_stem_month;
        $earthly_branch_month = $data->earthly_branch_month;
        $heavenly_stem_day = $data->heavenly_stem_day;
        $earthly_branch_day = $data->earthly_branch_day;
        $heavenly_stem_hour = $data->heavenly_stem_hour;
        $earthly_branch_hour = $data->earthly_branch_hour;

        $hidden_hs_in_eb_by_year = null;
        $hidden_hs_in_eb_by_month = null;
        $hidden_hs_in_eb_by_day = null;
        $hidden_hs_in_eb_by_hour = null;

        foreach ($hidden_hs_in_eb_format as $format) {
            if ($format->id == $earthly_branch->id) {
                $hidden_hs_in_eb_by_year = $format;
            }
            if ($format->id == $earthly_branch_month->id) {
                $hidden_hs_in_eb_by_month = $format;
            }
            if ($format->id == $earthly_branch_day->id) {
                $hidden_hs_in_eb_by_day = $format;
            }
            if ($earthly_branch_hour && $format->id == $earthly_branch_hour->id) {
                $hidden_hs_in_eb_by_hour = $format;
            }
        }

        $hidden_stem_format = Formula::getFormulaHiddenStem();
        $hidden_stem_by_year = null;
        $hidden_stem_by_month = null;
        $hidden_stem_by_day = null;
        $hidden_stem_by_hour = null;
        foreach ($hidden_stem_format as $format) {
            if (
                $format->begin_yin_yang == $heavenly_stem->yin_yang
                && $format->begin_polarity == $heavenly_stem->polarity
            ) {
                $hidden_stems_by_year = $format->hidden_stems;
                foreach ($hidden_stems_by_year as $hs) {
                    if (
                        $hs->end_yin_yang == $earthly_branch->yin_yang
                        && $hs->end_polarity == $earthly_branch->polarity
                    ) {
                        $hidden_stem_by_year = $hs;
                        break;
                    }
                }
            }
            if (
                $format->begin_yin_yang == $heavenly_stem_month->yin_yang
                && $format->begin_polarity == $heavenly_stem_month->polarity
            ) {
                $hidden_stems_by_month = $format->hidden_stems;
                foreach ($hidden_stems_by_month as $hs) {
                    if (
                        $hs->end_yin_yang == $earthly_branch_month->yin_yang
                        && $hs->end_polarity == $earthly_branch_month->polarity
                    ) {
                        $hidden_stem_by_month = $hs;
                        break;
                    }
                }
            }
            if (
                $format->begin_yin_yang == $heavenly_stem_day->yin_yang
                && $format->begin_polarity == $heavenly_stem_day->polarity
            ) {
                $hidden_stems_by_day = $format->hidden_stems;
                foreach ($hidden_stems_by_day as $hs) {
                    if (
                        $hs->end_yin_yang == $earthly_branch_day->yin_yang
                        && $hs->end_polarity == $earthly_branch_day->polarity
                    ) {
                        $hidden_stem_by_day = $hs;
                        break;
                    }
                }
            }
            if (
                $heavenly_stem_hour
                && $format->begin_yin_yang == $heavenly_stem_hour->yin_yang
                && $format->begin_polarity == $heavenly_stem_hour->polarity
            ) {
                $hidden_stems_by_hour = $format->hidden_stems;
                foreach ($hidden_stems_by_hour as $hs) {
                    if (
                        $earthly_branch_hour
                        && $hs->end_yin_yang == $earthly_branch_hour->yin_yang
                        && $hs->end_polarity == $earthly_branch_hour->polarity
                    ) {
                        $hidden_stem_by_hour = $hs;
                        break;
                    }
                }
            }
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            (object) [
                'hidden_stem_by_year' => $hidden_stem_by_year,
                'hidden_stem_by_month' => $hidden_stem_by_month,
                'hidden_stem_by_day' => $hidden_stem_by_day,
                'hidden_stem_by_hour' => $hidden_stem_by_hour,
                'hidden_hs_in_eb_by_year' => $hidden_hs_in_eb_by_year,
                'hidden_hs_in_eb_by_month' => $hidden_hs_in_eb_by_month,
                'hidden_hs_in_eb_by_day' => $hidden_hs_in_eb_by_day,
                'hidden_hs_in_eb_by_hour' => $hidden_hs_in_eb_by_hour
            ]
        );
    }

    private static function calculateHSandEBday($date)
    {
        $day = date("d", $date);
        $month = date("m", $date);
        $year = date("Y", $date);

        $century = intval($year / 100);
        $yy = intval($year % 100);

        $a_dd = $day;
        $a_mm = intval($month / 2) + 30 * ($month % 2 + 1) + ($month % 2) * intval($month / 9);
        $a_yy = 5 * ($yy % 12) + intval($yy / 4);
        $a_cc = 33 - 16 * ($century % 4) - 3 * intval($century / 4);
        $a_ss = 0;

        if ($month > 2) {
            $a_ss = -2;
        } else {
            if (self::isLeapYear($year)) {
                $a_ss = -1;
            } else {
                $a_ss = 0;
            }
        }

        return ($a_dd + $a_mm + $a_cc + $a_yy + $a_ss);
    }

    public static function gregorianToJDN($date)
    {
        $day = date('d', $date);
        $month = date('m', $date);
        $year = date('Y', $date);

        if ($month <= 2) {
            $year -= 1;
            $month += 12;
        }

        $A = intval($year / 100);
        $B = 2 - $A + intval($A / 4);

        $jdn = intval(365.25 * ($year + 4716))
            + intval(30.6001 * ($month + 1))
            + $day + $B - 1524;

        return $jdn;
    }

    private static function isLeapYear($year): bool
    {
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }
}
