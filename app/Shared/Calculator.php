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
        $year = date('Y', time());

        $agricultural_format = Formula::getFormulaAgricutural();

        $input_date = DateTime::createFromFormat('d-m-Y', "$day-$month-$year");
        $agricultural = null;
        foreach ($agricultural_format as $agr) {
            foreach ($agr->range as $range) {
                $start_date = DateTime::createFromFormat('d-m-Y', $range->start . "-$year");
                $end_date = DateTime::createFromFormat('d-m-Y', $range->end . "-$year");
                if ($start_date > $end_date) {
                    $year++;
                    $end_date = DateTime::createFromFormat('d-m-Y',  $range->end . "-$year");
                    if ($start_date > $input_date) {
                        $input_date = DateTime::createFromFormat('d-m-Y', "$day-$month-$year");
                    }
                }
                if ($input_date >= $start_date && $input_date <= $end_date) {
                    $agr->selected_range = $range;
                    $agricultural = $agr;
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
        $lunar_date = Date::convertSolar2Lunar(
            date('d', $date),
            date('m', $date),
            $year
        );
        [$lunar_day, $lunar_month, $lunar_year, $isLeap] = $lunar_date;

        $calculated_year = $year;
        if ($date < strtotime("{$year}-02-04")) {
            $calculated_year = $year - 1;
        }

        $heavenly_stem_format = Formula::getFormulaHeavenlyStem();

        $round_year_int = intval($calculated_year % 10);
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
        $lunar_date = Date::convertSolar2Lunar(
            date('d', $date),
            date('m', $date),
            $year
        );
        [$lunar_day, $lunar_month, $lunar_year, $isLeap] = $lunar_date;

        $calculated_year = $year;
        if ($date < strtotime("{$year}-02-04")) {
            $calculated_year = $year - 1;
        }

        $earthly_branch_format = Formula::getFormulaEarthlyBranch();

        $remaining = ($calculated_year - 4) % 12;

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

        $agricultural_date = self::calculateAgriculturalDate($date);
        $agricultural_data = $agricultural_date->data;
        if (!$agricultural_data) {
            return Helper::release("Invalid agricultural date");
        }

        $agricultural_month = $agricultural_data->month;

        $year = date('Y', $date);
        $lunar_date = Date::convertSolar2Lunar(
            date('d', $date),
            date('m', $date),
            $year
        );
        [$lunar_day, $lunar_month, $lunar_year, $isLeap] = $lunar_date;
        $calculated_year = $year;
        if ($date < strtotime("{$year}-02-04")) {
            $calculated_year = $year - 1;
        }

        $heavenly_stem_year = intval($calculated_year % 10);
        if ($heavenly_stem_year == 0) {
            $heavenly_stem_month = intval((8 + ($agricultural_month - 1)) % 10);
        } else {
            $heavenly_stem_month = intval((2 * ($calculated_year - 1) + ($agricultural_month - 1)) % 10);
        }
        // $heavenly_stem_month = intval(($agricultural_month - 1  + (($heavenly_stem_year - 1) * 2)) % 10);

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

        // $heavenly_stem_of_day_calculated = intval($result_calculate_hs_and_eb_day % 10);

        $hour = date('H', $date);
        // $heavenly_stem_by_hour = intval((($hour + 1) / 2 + ($heavenly_stem_of_day_calculated - 2) * 2) % 10);
        $x_calculator = $result_calculate_hs_and_eb_day % 5;
        $y_calculator = 0;
        switch ($x_calculator) {
            case 0:
                $y_calculator = 6;
                break;
            case 1:
                $y_calculator = 8;
                break;
            case 2:
                $y_calculator = 0;
                break;
            case 3:
                $y_calculator = 2;
                break;
            case 4:
                $y_calculator = 4;
                break;
        }
        $heavenly_stem_by_hour = intval($y_calculator + intval(($hour + 1) / 2) % 12) % 10;

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
        $earthly_branch_by_hour = intval(intval(($hour + 1) / 2) % 12);

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

    /**
     * Private function to calculate hidden stems
     * @param mixed $data
     * @return object
     */
    public static function calculateHiddenStems($data)
    {
        $calculate_hidden_stems = [];
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
            // Compare by year
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
                        if (isset($calculate_hidden_stems[$hs->name])) {
                            $calculate_hidden_stems[$hs->name] = $calculate_hidden_stems[$hs->name] + 1;
                        } else {
                            $calculate_hidden_stems[$hs->name] = 1;
                        }
                    }
                }
            }

            // Compare by month
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
                        if (isset($calculate_hidden_stems[$hs->name])) {
                            $calculate_hidden_stems[$hs->name] = $calculate_hidden_stems[$hs->name] + 1;
                        } else {
                            $calculate_hidden_stems[$hs->name] = 1;
                        }
                    }
                }
            }

            // Compare by day
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
                        if (isset($calculate_hidden_stems[$hs->name])) {
                            $calculate_hidden_stems[$hs->name] = $calculate_hidden_stems[$hs->name] + 1;
                        } else {
                            $calculate_hidden_stems[$hs->name] = 1;
                        }
                    }
                }

                // Tính thiên can ẩn trong địa chi theo năm
                if (isset($hidden_hs_in_eb_by_year->hidden) && count($hidden_hs_in_eb_by_year->hidden) > 0) {
                    foreach ($hidden_hs_in_eb_by_year->hidden as &$hidden_item) {
                        $hidden_item->hidden_combo = '';
                        foreach ($hidden_stems_by_day as $hs_check) {
                            if (
                                $hs_check->end_yin_yang == $hidden_item->yin_yang
                                && $hs_check->end_polarity == $hidden_item->polarity
                            ) {
                                $hidden_item->hidden_combo = $hs_check->name;
                                if (isset($calculate_hidden_stems[$hs_check->name])) {
                                    $calculate_hidden_stems[$hs_check->name] = $calculate_hidden_stems[$hs_check->name] + 1;
                                } else {
                                    $calculate_hidden_stems[$hs_check->name] = 1;
                                }
                                break;
                            }
                        }
                    }
                }

                // Tính thiên can ẩn trong địa chi theo tháng
                if (isset($hidden_hs_in_eb_by_month->hidden) && count($hidden_hs_in_eb_by_month->hidden) > 0) {
                    foreach ($hidden_hs_in_eb_by_month->hidden as &$hidden_item) {
                        $hidden_item->hidden_combo = '';
                        foreach ($hidden_stems_by_day as $hs_check) {
                            if (
                                $hs_check->end_yin_yang == $hidden_item->yin_yang
                                && $hs_check->end_polarity == $hidden_item->polarity
                            ) {
                                $hidden_item->hidden_combo = $hs_check->name;
                                if (isset($calculate_hidden_stems[$hs_check->name])) {
                                    $calculate_hidden_stems[$hs_check->name] = $calculate_hidden_stems[$hs_check->name] + 1;
                                } else {
                                    $calculate_hidden_stems[$hs_check->name] = 1;
                                }
                                break;
                            }
                        }
                    }
                }

                // Tính thiên can ẩn trong địa chi theo ngày
                if (isset($hidden_hs_in_eb_by_day->hidden) && count($hidden_hs_in_eb_by_day->hidden) > 0) {
                    foreach ($hidden_hs_in_eb_by_day->hidden as &$hidden_item) {
                        $hidden_item->hidden_combo = '';
                        foreach ($hidden_stems_by_day as $hs_check) {
                            if (
                                $hs_check->end_yin_yang == $hidden_item->yin_yang
                                && $hs_check->end_polarity == $hidden_item->polarity
                            ) {
                                $hidden_item->hidden_combo = $hs_check->name;
                                if (isset($calculate_hidden_stems[$hs_check->name])) {
                                    $calculate_hidden_stems[$hs_check->name] = $calculate_hidden_stems[$hs_check->name] + 1;
                                } else {
                                    $calculate_hidden_stems[$hs_check->name] = 1;
                                }
                                break;
                            }
                        }
                    }
                }

                // Tính thiên can ẩn trong địa chi theo giờ
                if (isset($hidden_hs_in_eb_by_hour->hidden) && count($hidden_hs_in_eb_by_hour->hidden) > 0) {
                    foreach ($hidden_hs_in_eb_by_hour->hidden as &$hidden_item) {
                        $hidden_item->hidden_combo = '';
                        foreach ($hidden_stems_by_day as $hs_check) {
                            if (
                                $hs_check->end_yin_yang == $hidden_item->yin_yang
                                && $hs_check->end_polarity == $hidden_item->polarity
                            ) {
                                $hidden_item->hidden_combo = $hs_check->name;
                                if (isset($calculate_hidden_stems[$hs_check->name])) {
                                    $calculate_hidden_stems[$hs_check->name] = $calculate_hidden_stems[$hs_check->name] + 1;
                                } else {
                                    $calculate_hidden_stems[$hs_check->name] = 1;
                                }
                                break;
                            }
                        }
                    }
                }
            }

            // Compare by hour
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
                        if (isset($calculate_hidden_stems[$hs->name])) {
                            $calculate_hidden_stems[$hs->name] = $calculate_hidden_stems[$hs->name] + 1;
                        } else {
                            $calculate_hidden_stems[$hs->name] = 1;
                        }
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
                'hidden_hs_in_eb_by_hour' => $hidden_hs_in_eb_by_hour,
                'calculate_hidden_stems' => $calculate_hidden_stems
            ]
        );
    }

    /**
     * Calculate Heavenly stem and Earthly branch day
     * @param mixed $date
     * @return int
     */
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

    /**
     * 10. Calculate Elemental Sound
     * @param mixed $data
     * @return object
     */
    public static function calculateElementalSound($data)
    {
        $heavenly_stem = $data->heavenly_stem;
        $earthly_branch = $data->earthly_branch;
        $heavenly_stem_month = $data->heavenly_stem_month;
        $earthly_branch_month = $data->earthly_branch_month;
        $heavenly_stem_day = $data->heavenly_stem_day;
        $earthly_branch_day = $data->earthly_branch_day;
        $heavenly_stem_hour = $data->heavenly_stem_hour;
        $earthly_branch_hour = $data->earthly_branch_hour;


        $elemental_sound_format = Formula::getFormulaElementSound();

        $id_elemental_sound = $heavenly_stem->name . " " . $earthly_branch->name;
        $id_elemental_sound_month = $heavenly_stem_month->name . " " . $earthly_branch_month->name;
        $id_elemental_sound_day = $heavenly_stem_day->name . " " . $earthly_branch_day->name;
        $id_elemental_sound_hour = '';
        if ($heavenly_stem_hour && $earthly_branch_hour) {
            $id_elemental_sound_hour = $heavenly_stem_hour->name . " " . $earthly_branch_hour->name;
        }

        $elemental_sound = null;
        $elemental_sound_month = null;
        $elemental_sound_day = null;
        $elemental_sound_hour = null;
        $is_all_filled = false;
        foreach ($elemental_sound_format as $format) {
            if ($format->id == $id_elemental_sound) {
                $elemental_sound = $format;
            }

            if ($format->id == $id_elemental_sound_month) {
                $elemental_sound_month = $format;
            }

            if ($format->id == $id_elemental_sound_day) {
                $elemental_sound_day = $format;
            }

            if ($heavenly_stem_hour && $earthly_branch_hour && $format->id == $id_elemental_sound_hour) {
                $elemental_sound_hour = $format;
            }

            if ($elemental_sound && $elemental_sound_month && $elemental_sound_day && $elemental_sound_hour) {
                $is_all_filled = true;
            }

            if ($is_all_filled) {
                break;
            }
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            (object) [
                'elemental_sound' => $elemental_sound,
                'elemental_sound_month' => $elemental_sound_month,
                'elemental_sound_day' => $elemental_sound_day,
                'elemental_sound_hour' => $elemental_sound_hour
            ]
        );
    }

    /**
     * 11. Calculate growth stage
     * @param mixed $data
     * @return object
     */
    public static function calculateGrowthStage($data)
    {
        $growth_stage_formula = Formula::getFormulaGrowthStage();

        $heavenly_stem = $data->heavenly_stem;
        $earthly_branch = $data->earthly_branch;
        $heavenly_stem_month = $data->heavenly_stem_month;
        $earthly_branch_month = $data->earthly_branch_month;
        $heavenly_stem_day = $data->heavenly_stem_day;
        $earthly_branch_day = $data->earthly_branch_day;
        $heavenly_stem_hour = $data->heavenly_stem_hour;
        $earthly_branch_hour = $data->earthly_branch_hour;

        $growth_stage_year = null;
        $growth_stage_month = null;
        $growth_stage_day = null;
        $growth_stage_hour = null;
        foreach ($growth_stage_formula as $formula) {
            if ($formula->id == $heavenly_stem->name) {
                $growth_stage_year = $formula;
            }

            if ($formula->id == $heavenly_stem_month->name) {
                $growth_stage_month = $formula;
            }

            if ($formula->id == $heavenly_stem_day->name) {
                $growth_stage_day = $formula;
            }

            if ($heavenly_stem_hour && isset($heavenly_stem_hour->name) && $formula->id == $heavenly_stem_hour->name) {
                $growth_stage_hour = $formula;
            }
        }

        $zodiac_formula = Formula::getFormulaZodiac();

        $growth_stage_year_zodiac = null;
        $growth_stage_month_zodiac = null;
        $growth_stage_day_zodiac = null;
        $growth_stage_hour_zodiac = null;
        foreach ($zodiac_formula as $formula) {
            if ($growth_stage_year != false && $growth_stage_year->start == $formula->name) {
                $growth_stage_year_zodiac = $formula;
            }

            if ($growth_stage_month != false && $growth_stage_month->start == $formula->name) {
                $growth_stage_month_zodiac = $formula;
            }

            if ($growth_stage_day != false && $growth_stage_day->start == $formula->name) {
                $growth_stage_day_zodiac = $formula;
            }

            if ($growth_stage_hour != false && $growth_stage_hour->start == $formula->name) {
                $growth_stage_hour_zodiac = $formula;
            }
        }

        $zodiac_year = null;
        $zodiac_month = null;
        $zodiac_day = null;
        $zodiac_hour = null;
        foreach ($zodiac_formula as $formula) {
            if ($growth_stage_year_zodiac != false && $growth_stage_year !== false && $earthly_branch->name == $formula->name) {
                $zodiac_year = (($formula->id - $growth_stage_year_zodiac->id) * ($growth_stage_year->direction == 1 ? 1 : -1) + 12) % 12;
            }

            if ($growth_stage_month_zodiac != false && $growth_stage_month !== false && $earthly_branch_month->name == $formula->name) {
                $zodiac_month = (($formula->id - $growth_stage_month_zodiac->id) * ($growth_stage_month->direction == 1 ? 1 : -1) + 12) % 12;
            }

            if ($growth_stage_day_zodiac != false && $growth_stage_day !== false && $earthly_branch_day->name == $formula->name) {
                $zodiac_day = (($formula->id - $growth_stage_day_zodiac->id) * ($growth_stage_day->direction == 1 ? 1 : -1) + 12) % 12;
            }

            if ($growth_stage_hour_zodiac != false && $growth_stage_hour !== false && $earthly_branch_hour && $earthly_branch_hour->name == $formula->name) {
                $zodiac_hour = (($formula->id - $growth_stage_hour_zodiac->id) * ($growth_stage_hour->direction == 1 ? 1 : -1) + 12) % 12;
            }
        }

        $growth_stage_result_formula = Formula::getFormulaGrowthStageResult();

        $growth_stage_year_result = null;
        $growth_stage_month_result = null;
        $growth_stage_day_result = null;
        $growth_stage_hour_result = null;
        foreach ($growth_stage_result_formula as $formula) {
            if ($zodiac_year != false && $zodiac_year == $formula->id) {
                $growth_stage_year_result = $formula;
            }

            if ($zodiac_month != false && $zodiac_month == $formula->id) {
                $growth_stage_month_result = $formula;
            }

            if ($zodiac_day != false && $zodiac_day == $formula->id) {
                $growth_stage_day_result = $formula;
            }

            if ($zodiac_hour != false && $zodiac_hour == $formula->id) {
                $growth_stage_hour_result = $formula;
            }
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            (object) [
                'growth_stage' => $growth_stage_year_result,
                'growth_stage_month' => $growth_stage_month_result,
                'growth_stage_day' => $growth_stage_day_result,
                'growth_stage_hour' => $growth_stage_hour_result
            ]
        );
    }

    /**
     * 12. Calculate Shensha System
     * @param mixed $data
     * @return object
     */
    public static function calculateShenshaSystem($data)
    {
        $heavenly_stem = $data->heavenly_stem;
        $earthly_branch = $data->earthly_branch;
        $heavenly_stem_month = $data->heavenly_stem_month;
        $earthly_branch_month = $data->earthly_branch_month;
        $heavenly_stem_day = $data->heavenly_stem_day;
        $earthly_branch_day = $data->earthly_branch_day;
        $heavenly_stem_hour = $data->heavenly_stem_hour;
        $earthly_branch_hour = $data->earthly_branch_hour;

        $shensha_system = [
            "year" => [],
            "month" => [],
            "day" => [],
            "hour" => []
        ];

        $combo_year = $heavenly_stem->name . " " .$earthly_branch->name;
        $combo_month = $heavenly_stem_month->name . " " .$earthly_branch_month->name;
        $combo_day = $heavenly_stem_day->name . " " .$earthly_branch_day->name;
        $combo_hour = null;
        if (isset($heavenly_stem_hour->name) && isset($earthly_branch_hour->name)) {
            $combo_hour = $heavenly_stem_hour->name . " " .$earthly_branch_hour->name;
        }

        // 1. Tính theo nhật chủ
        $formula_shensha_system_by_day_master = Formula::getFormulaShenshaSystemByDayMaster();
        foreach ($formula_shensha_system_by_day_master as $formula) {
            if (
                $heavenly_stem_day->name == $formula->can &&
                $earthly_branch_day->name == $formula->chi
            ) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $formula->data);
            }
        }

        // 2. Tính dữ liệu Không vong
        $formula_shensha_kv = Formula::getFormulaShenshaSpecialByDayMaster();
        $final_data = "Không Vong";
        foreach ($formula_shensha_kv as $formula) {
            if (!in_array($combo_day, $formula->data)) {
                continue;
            }

            if (in_array($earthly_branch->name, $formula->earthly_data)) {
                $shensha_system['year'][] = $final_data;
            }

            if (in_array($earthly_branch_month->name, $formula->earthly_data)) {
                $shensha_system['month'][] = $final_data;
            }

            if (isset($earthly_branch_hour->name) && in_array($earthly_branch_hour->name, $formula->earthly_data)) {
                $shensha_system['hour'][] = $final_data;
            }
        }

        // 3. Tính dữ liệu thần sát của các phần còn lại

        // a. Tính theo địa chi năm
        $formula_shensha_by_earthly_year = Formula::getFormulaShenshaByEarthlyYear();
        $formula_shensha_by_earthly_year_with_heavenly = Formula::getFormulaShenshaByEarthlyYearWithHeavenly();
        $formula_shensha_by_earthly_year_special = Formula::getFormulaShenshaByEarthlyYearSpecial();
        foreach ($formula_shensha_by_earthly_year as $formula) {
            if ($earthly_branch->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$earthly_branch_month->name])) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$earthly_branch_month->name]);
            }

            if (isset($data_shensha[$earthly_branch_day->name])) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha[$earthly_branch_day->name]);
            }

            if (isset($earthly_branch_hour->name) && isset($data_shensha[$earthly_branch_hour->name])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$earthly_branch_hour->name]);
            }
        }

        foreach ($formula_shensha_by_earthly_year_with_heavenly as $formula) {
            if ($earthly_branch->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha->{$heavenly_stem_month->name})) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha->{$heavenly_stem_month->name});
            }

            if (isset($data_shensha->{$heavenly_stem_day->name})) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha->{$heavenly_stem_day->name});
            }

            if (isset($heavenly_stem_hour->name) && isset($data_shensha->{$heavenly_stem_hour->name})) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha->{$heavenly_stem_hour->name});
            }
        }
        
        foreach ($formula_shensha_by_earthly_year_special as $formula) {
            if ($earthly_branch->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha->{$combo_month})) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha->{$combo_month});
            }

            if (isset($data_shensha->{$combo_day})) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha->{$combo_day});
            }

            if ($combo_hour && isset($data_shensha->{$combo_hour})) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha->{$combo_hour});
            }
        }

        // b. Tính theo thiên can năm
        $formula_shensha_by_heavenly_year = Formula::getFormulaShenshaByHeavenlyYear();
        foreach ($formula_shensha_by_heavenly_year as $formula) {
            if ($heavenly_stem->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$earthly_branch_month->name])) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$earthly_branch_month->name]);
            }

            if (isset($data_shensha[$earthly_branch_day->name])) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha[$earthly_branch_day->name]);
            }

            if (isset($earthly_branch_hour->name) && isset($data_shensha[$earthly_branch_hour->name])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$earthly_branch_hour->name]);
            }
        }

        // c. Tính theo địa chi tháng
        $formula_shensha_by_earthly_month = Formula::getFormulaShenshaByEarthlyMonth();
        foreach ($formula_shensha_by_earthly_month as $formula) {
            if ($earthly_branch_month->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha->{$earthly_branch->name})) {
                $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha->{$earthly_branch->name});
            }

            if (isset($data_shensha->{$earthly_branch_day->name})) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha->{$earthly_branch_day->name});
            }

            if (isset($earthly_branch_hour->name) && isset($data_shensha->{$earthly_branch_hour->name})) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha->{$earthly_branch_hour->name});
            }
        }

        $formula_shensha_by_earthly_month_with_heavenly = Formula::getFormulaShenshaByEarthlyMonthWithHeavenly();
        foreach ($formula_shensha_by_earthly_month_with_heavenly as $formula) {
            if ($earthly_branch_month->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$heavenly_stem->name])) {
                $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha[$heavenly_stem->name]);
            }

            if (isset($data_shensha[$heavenly_stem_day->name])) {
                $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha[$heavenly_stem_day->name]);
            }

            if (isset($heavenly_stem_hour->name) && isset($data_shensha[$heavenly_stem_hour->name])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$heavenly_stem_hour->name]);
            }
        }

        // d. Tính theo địa chi ngày
        $formula_shensha_by_earthly_day = Formula::getFormulaShenshaByEarthlyDay();
        foreach ($formula_shensha_by_earthly_day as $formula) {
            if ($earthly_branch_day->name != $formula->id) {
                continue;
            }
            
            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$earthly_branch->name])) {
                $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha[$earthly_branch->name]);
            }

            if (isset($data_shensha[$earthly_branch_month->name])) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$earthly_branch_month->name]);
            }

            if (isset($earthly_branch_hour->name) && isset($data_shensha[$earthly_branch_hour->name])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$earthly_branch_hour->name]);
            }
        }

        // e. Tính theo thiên can ngày
        $formula_shensha_by_heavenly_day = Formula::getFormulaShenshaByHeavenlyDay();
        foreach ($formula_shensha_by_heavenly_day as $formula) {
            if ($heavenly_stem_day->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$earthly_branch->name])) {
                $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha[$earthly_branch->name]);
            }

            if (isset($data_shensha[$earthly_branch_month->name])) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$earthly_branch_month->name]);
            }

            if (isset($earthly_branch_hour->name) && isset($data_shensha[$earthly_branch_hour->name])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$earthly_branch_hour->name]);
            }
        }

        $formula_shensha_by_heavenly_day_by_combo = Formula::getFormulaShenshaByHeavenlyDayByCombo();
        foreach ($formula_shensha_by_heavenly_day_by_combo as $formula) {
            if ($heavenly_stem_day->name != $formula->id) {
                continue;
            }

            $data_shensha = $formula->data_shensha;
            if (isset($data_shensha[$combo_year])) {
                $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha[$combo_year]);
            }

            if (isset($data_shensha[$combo_month])) {
                $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$combo_month]);
            }

            if ($combo_hour && isset($data_shensha[$combo_hour])) {
                $shensha_system['hour'] = array_merge($shensha_system['hour'], $data_shensha[$combo_hour]);
            }
        }

        if ($earthly_branch_hour) {
            $formula_shensha_by_earthly_hour = Formula::getFormulaShenshaByEarthlyHour();
            foreach ($formula_shensha_by_earthly_hour as $formula) {
                if ($earthly_branch_hour->name != $formula->id) {
                    continue;
                }

                $data_shensha = $formula->data_shensha;
                if (isset($data_shensha[$earthly_branch->name])) {
                    $shensha_system['year'] = array_merge($shensha_system['year'], $data_shensha[$earthly_branch->name]);
                }

                if (isset($data_shensha[$earthly_branch_month->name])) {
                    $shensha_system['month'] = array_merge($shensha_system['month'], $data_shensha[$earthly_branch_month->name]);
                }

                if (isset($data_shensha[$earthly_branch_day->name])) {
                    $shensha_system['day'] = array_merge($shensha_system['day'], $data_shensha[$earthly_branch_day->name]);
                }
            }
        }

        foreach ($shensha_system as $key => $value) {
            $shensha_system[$key] = array_unique($value);
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $shensha_system
        );
    }

    /**
     * 13. Calculate Elements Data Point
     * @param mixed $data
     * @return object
     */
    public static function calculateElementsDataPoint($data)
    {
        $heavenly_stem = $data->heavenly_stem;
        $earthly_branch = $data->earthly_branch;
        $heavenly_stem_month = $data->heavenly_stem_month;
        $earthly_branch_month = $data->earthly_branch_month;
        $heavenly_stem_day = $data->heavenly_stem_day;
        $earthly_branch_day = $data->earthly_branch_day;
        $heavenly_stem_hour = $data->heavenly_stem_hour;
        $earthly_branch_hour = $data->earthly_branch_hour;

        $calculated_data_point = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];

        $calculated_number_elements_existed = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];
        foreach ($calculated_number_elements_existed as $key => &$value) {
            if ($key == $heavenly_stem->yin_yang) {
                $value++;
            }
            if ($key == $heavenly_stem_month->yin_yang) {
                $value++;
            }
            if ($key == $heavenly_stem_day->yin_yang) {
                $value++;
            }
            if ($heavenly_stem_hour && $key == $heavenly_stem_hour->yin_yang) {
                $value++;
            }

            if ($key == $earthly_branch->yin_yang) {
                $value++;
            }
            if ($key == $earthly_branch_month->yin_yang) {
                $value++;
            }
            if ($key == $earthly_branch_day->yin_yang) {
                $value++;
            }
            if ($earthly_branch_hour && $key == $earthly_branch_hour->yin_yang) {
                $value++;
            }
        }

        $heavenly_stem_data_point_format = Formula::getFormulaCalculateDataPointHeavenlyStems();
        foreach ($heavenly_stem_data_point_format as $format) {
            if ($heavenly_stem->name == $format->name) {
                $calculated_data_point[$format->element] = $calculated_data_point[$format->element] + ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($heavenly_stem_month->name == $format->name) {
                $calculated_data_point[$format->element] = $calculated_data_point[$format->element] + ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($heavenly_stem_day->name == $format->name) {
                $calculated_data_point[$format->element] = $calculated_data_point[$format->element] + ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($heavenly_stem_hour && isset($heavenly_stem_hour->name) && $heavenly_stem_hour->name == $format->name) {
                $calculated_data_point[$format->element] = $calculated_data_point[$format->element] + ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }
        }

        $earthly_branch_data_point_format = Formula::getFormulaCalculateDataPointEarthlyBranches();
        foreach ($earthly_branch_data_point_format as $format) {
            if ($earthly_branch->name == $format->name) {
                $calculated_data_point[$format->element] += ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($earthly_branch_month->name == $format->name) {
                $calculated_data_point[$format->element] += ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($earthly_branch_day->name == $format->name) {
                $calculated_data_point[$format->element] += ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }

            if ($earthly_branch_hour && isset($earthly_branch_hour->name) && $earthly_branch_hour->name == $format->name) {
                $calculated_data_point[$format->element] += ($format->point * ($format->yin_yang == "Dương" ? 1 : -1));
            }
        }

        $total_point = 0;
        $calculated_percentage_data = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];
        foreach ($calculated_data_point as $key => $value) {
            $total_point += abs($value);
        }

        foreach ($calculated_data_point as $key => $value) {
            $calculated_percentage_data[$key] = round(abs($value) / $total_point * 100);
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            (object) [
                'calculated_data_point' => $calculated_data_point,
                'calculated_percentage_data' => $calculated_percentage_data,
                'calculated_number_elements_existed' => $calculated_number_elements_existed
            ]
        );
    }

    public static function calculateElementsInterrelation($data)
    {
        $calculated_data_point = $data->calculated_data_point;
        $calculated_percentage_data = $data->calculated_percentage_data;

        $calculated_interrelation = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];

        $calculated_deposite_percentage_data = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];

        $calculated_continuous_data = [
            "Kim" => 0,
            "Mộc" => 0,
            "Thủy" => 0,
            "Hỏa" => 0,
            "Thổ" => 0
        ];
        $array_point_values = [];

        $default_data_point = 40;

        foreach ($calculated_percentage_data as $key => $value) {
            $calculated_value = $default_data_point - $value;
            $calculated_deposite_percentage_data[$key] = $calculated_value;
            $array_point_values[] = $calculated_value;
        }
        
        $lowest_value = min($array_point_values);

        $default_mean_value = 10;
        $formatted_mean_value = intval(($default_mean_value - $lowest_value) / 4);

        $lowest_key = null;
        $sum_total_value = 0;
        foreach ($calculated_deposite_percentage_data as $key => $value) {
            if ($value == $lowest_value) {
                $lowest_key = $key;
                continue;
            }
            $calculated_continuous_value = $value - $formatted_mean_value;
            $calculated_continuous_data[$key] = $calculated_continuous_value;
            $sum_total_value += $calculated_continuous_value;
        }

        if ($lowest_key) {
            $calculated_continuous_data[$lowest_key] = 100 - $sum_total_value;
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $calculated_continuous_data,
        );
    }

    private static function calculateAgriculturalDate($date)
    {
        $day = date('d', $date);
        $month = date('m', $date);
        $year = date('Y', time());

        $agricultural_date_format = Formula::getFormulaAgricuturalDate();
        
        $input_date = DateTime::createFromFormat('d-m-Y', "$day-$month-$year");
        $agricultural_date = null;
        foreach ($agricultural_date_format as $agr) {
            $start_date = DateTime::createFromFormat('d-m-Y', $agr->start . "-$year");
            $end_date = DateTime::createFromFormat('d-m-Y', $agr->end . "-$year");
            if ($start_date > $end_date) {
                $year++;
                $end_date = DateTime::createFromFormat('d-m-Y',  $agr->end . "-$year");
                if ($start_date > $input_date) {
                    $input_date = DateTime::createFromFormat('d-m-Y', "$day-$month-$year");
                }
            }
            if ($input_date >= $start_date && $input_date <= $end_date) {
                $agricultural_date = $agr;
                break;
            }
        }

        if (!$agricultural_date) {
            return Helper::release("Invalid agricultural date");
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $agricultural_date
        );
    }

    public static function calculateMissingElements($data)
    {
        $calculated_data_point = $data->calculated_data_point;
        $calculated_number_elements_existed = $data->calculated_number_elements_existed;
        $formula_calculate_missing_elements = Formula::getFormulaCalculateMissingElements();
        $missing_elements = [];
        foreach ($calculated_number_elements_existed as $key => $value) {
            if ($value > 0) {
                continue;
            }
            $missing_elements[] = $key;
        }

        $weak_elements = [];
        foreach ($calculated_data_point as $key => $value) {
            if (abs($value) > 1) {
                continue;
            }
            $weak_elements[] = $key;
        }

        $missing_elements_data = [];
        $weak_elements_data = [];
        foreach ($formula_calculate_missing_elements as $formula) {
            foreach ($missing_elements as $element) {
                if ($formula->id == $element) {
                    $missing_elements_data[] = $formula;
                }
            }

            foreach ($weak_elements as $element) {
                if ($formula->id == $element) {
                    $weak_elements_data[] = $formula;
                }
            }
        }
        
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            (object) [
                'missing_elements_data' => $missing_elements_data,
                'weak_elements_data' => $weak_elements_data,
            ]
        );
    }
}
