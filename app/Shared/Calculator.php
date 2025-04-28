<?php

namespace App\Shared;

class Calculator
{
    /**
     * 1. Calculate Agricultural date
     * @param mixed $date
     * @return object
     */
    public static function calculateAgricultural($date)
    {
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));

        $agricultural_format = [
            (object) ['id' => 'lap_xuan',     'name' => 'Lập Xuân',     'from_day' => 4,  'from_month' => 2,  'to_day' => 18, 'to_month' => 2],
            (object) ['id' => 'vu_thuy',      'name' => 'Vũ Thủy',      'from_day' => 19, 'from_month' => 2,  'to_day' => 4,  'to_month' => 3],
            (object) ['id' => 'kinh_trap',    'name' => 'Kinh Trập',    'from_day' => 5,  'from_month' => 3,  'to_day' => 20, 'to_month' => 3],
            (object) ['id' => 'xuan_phan',    'name' => 'Xuân Phân',    'from_day' => 21, 'from_month' => 3,  'to_day' => 4,  'to_month' => 4],
            (object) ['id' => 'thanh_minh',   'name' => 'Thanh Minh',   'from_day' => 5,  'from_month' => 4,  'to_day' => 19, 'to_month' => 4],
            (object) ['id' => 'coc_vu',       'name' => 'Cốc Vũ',       'from_day' => 20, 'from_month' => 4,  'to_day' => 5,  'to_month' => 5],
            (object) ['id' => 'lap_ha',       'name' => 'Lập Hạ',       'from_day' => 6,  'from_month' => 5,  'to_day' => 20, 'to_month' => 5],
            (object) ['id' => 'tieu_man',     'name' => 'Tiểu Mãn',     'from_day' => 21, 'from_month' => 5,  'to_day' => 5,  'to_month' => 6],
            (object) ['id' => 'mang_chung',   'name' => 'Mang Chủng',   'from_day' => 6,  'from_month' => 6,  'to_day' => 20, 'to_month' => 6],
            (object) ['id' => 'ha_chi',       'name' => 'Hạ Chí',       'from_day' => 21, 'from_month' => 6,  'to_day' => 6,  'to_month' => 7],
            (object) ['id' => 'tieu_thu',     'name' => 'Tiểu Thử',     'from_day' => 7,  'from_month' => 7,  'to_day' => 22, 'to_month' => 7],
            (object) ['id' => 'dai_thu',      'name' => 'Đại Thử',      'from_day' => 23, 'from_month' => 7,  'to_day' => 6,  'to_month' => 8],
            (object) ['id' => 'lap_thu',      'name' => 'Lập Thu',      'from_day' => 7,  'from_month' => 8,  'to_day' => 22, 'to_month' => 8],
            (object) ['id' => 'xu_thu',       'name' => 'Xử Thử',       'from_day' => 23, 'from_month' => 8,  'to_day' => 7,  'to_month' => 9],
            (object) ['id' => 'bach_lo',      'name' => 'Bạch Lộ',      'from_day' => 8,  'from_month' => 9,  'to_day' => 22, 'to_month' => 9],
            (object) ['id' => 'thu_phan',     'name' => 'Thu Phân',     'from_day' => 23, 'from_month' => 9,  'to_day' => 7,  'to_month' => 10],
            (object) ['id' => 'han_lo',       'name' => 'Hàn Lộ',       'from_day' => 8,  'from_month' => 10, 'to_day' => 22, 'to_month' => 10],
            (object) ['id' => 'suong_giang',  'name' => 'Sương Giáng',  'from_day' => 23, 'from_month' => 10, 'to_day' => 6,  'to_month' => 11],
            (object) ['id' => 'lap_dong',     'name' => 'Lập Đông',     'from_day' => 7,  'from_month' => 11, 'to_day' => 21, 'to_month' => 11],
            (object) ['id' => 'tieu_tuyet',   'name' => 'Tiểu Tuyết',   'from_day' => 22, 'from_month' => 11, 'to_day' => 6,  'to_month' => 12],
            (object) ['id' => 'dai_tuyet',    'name' => 'Đại Tuyết',    'from_day' => 7,  'from_month' => 12, 'to_day' => 21, 'to_month' => 12],
            (object) ['id' => 'dong_chi',     'name' => 'Đông Chí',     'from_day' => 22, 'from_month' => 12, 'to_day' => 5,  'to_month' => 1],
            (object) ['id' => 'tieu_han',     'name' => 'Tiểu Hàn',     'from_day' => 6,  'from_month' => 1,  'to_day' => 20, 'to_month' => 1],
            (object) ['id' => 'dai_han',      'name' => 'Đại Hàn',      'from_day' => 21, 'from_month' => 1,  'to_day' => 3,  'to_month' => 2]
        ];

        $selected_agricultural = null;

        foreach ($agricultural_format as $agricultural) {
            if (
                ($month == $agricultural->from_month && $day >= $agricultural->from_day) ||
                ($month <= $agricultural->to_month && $day <= $agricultural->to_day)
            ) {
                $selected_agricultural = $agricultural;
                break;
            }
        }

        if (!$selected_agricultural) {
            return Helper::release("Invalid Argicultural date");
        }

        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_agricultural
        );
    }

    /**
     * 2. Calculate Heavenly Stem
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStem($date)
    {
        $year = date('Y', strtotime($date));

        $heavenly_stem_format = [
            (object) ['id' => 0, 'code' => 'canh', 'name' => 'Canh', 'element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
            (object) ['id' => 1, 'code' => 'tan', 'name' => 'Tân',  'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
            (object) ['id' => 2, 'code' => 'nham', 'name' => 'Nhâm', 'element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
            (object) ['id' => 3, 'code' => 'quy', 'name' => 'Quý',  'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
            (object) ['id' => 4, 'code' => 'giap', 'name' => 'Giáp', 'element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
            (object) ['id' => 5, 'code' => 'at', 'name' => 'Ất',   'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
            (object) ['id' => 6, 'code' => 'binh', 'name' => 'Bính', 'element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
            (object) ['id' => 7, 'code' => 'dinh', 'name' => 'Đinh', 'element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
            (object) ['id' => 8, 'code' => 'mau', 'name' => 'Mậu',  'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
            (object) ['id' => 9, 'code' => 'ky', 'name' => 'Kỷ',   'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82']
        ];

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
        $year = date('Y', strtotime($date));

        $earthly_branch_format = [
            (object) ['id' => 0,  'name' => 'Thân', 'element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
            (object) ['id' => 1,  'name' => 'Dậu',  'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
            (object) ['id' => 2,  'name' => 'Tuất', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
            (object) ['id' => 3,  'name' => 'Hợi',  'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
            (object) ['id' => 4,  'name' => 'Tý',   'element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
            (object) ['id' => 5,  'name' => 'Sửu',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
            (object) ['id' => 6,  'name' => 'Dần',  'element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
            (object) ['id' => 7,  'name' => 'Mão',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
            (object) ['id' => 8,  'name' => 'Thìn', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
            (object) ['id' => 9,  'name' => 'Tỵ',   'element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
            (object) ['id' => 10, 'name' => 'Ngọ',  'element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
            (object) ['id' => 11, 'name' => 'Mùi',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82']
        ];
        
        $year = $year % 12;
        $remaining = ($year - intval($year)) * 12;

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
    public static function calculateHeavenlyStemMonth($date) {
        $heavenly_stem_month = [
            'giap' => [
                (object) ['id' => 1,  'name' => 'Bính', 'element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 2,  'name' => 'Đinh', 'element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 3,  'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 4,  'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 5,  'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 6,  'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 7,  'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 8,  'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 9,  'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 10, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 11, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 12, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
            ],
            'ky' => [
                (object) ['id' => 1,  'name' => 'Bính', 'element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 2,  'name' => 'Đinh', 'element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 3,  'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 4,  'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 5,  'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 6,  'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 7,  'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 8,  'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 9,  'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 10, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 11, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 12, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
            ],
            'at' => [
                (object) ['id' => 1, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 2, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 3, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 4, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 5, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 6, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 7, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 8, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 9, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 10,'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 11,'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 12,'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
            ],
            'canh' => [
                (object) ['id' => 1, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 2, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 3, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 4, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 5, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 6, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 7, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 8, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 9, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 10,'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 11,'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 12,'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
            ],
            'binh' => [
                (object) ['id' => 1, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 2, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 3, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 4, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 5, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 6, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 7, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 8, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 9, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 10,'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 11,'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 12,'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
            ],
            'tan' => [
                (object) ['id' => 1, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 2, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 3, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 4, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 5, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 6, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 7, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 8, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 9, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 10,'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 11,'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 12,'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
            ],
            'dinh' => [
                (object) ['id' => 1, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 2, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 3, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 4, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 5, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 6, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 7, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 8, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 9, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 10,'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 11,'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 12,'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
            ],
            'nham' => [
                (object) ['id' => 1, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 2, 'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 3, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 4, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 5, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 6, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 7, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 8, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 9, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 10,'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 11,'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 12,'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
            ],
            'mau' => [
                (object) ['id' => 1, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 2, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 3, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 4, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 5, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 6, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 7, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 8, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 9, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 10,'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 11,'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 12,'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
            ],
            'quy' => [
                (object) ['id' => 1, 'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 2, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
                (object) ['id' => 3, 'name' => 'Bính','element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
                (object) ['id' => 4, 'name' => 'Đinh','element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
                (object) ['id' => 5, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
                (object) ['id' => 6, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
                (object) ['id' => 7, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
                (object) ['id' => 8, 'name' => 'Tân', 'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
                (object) ['id' => 9, 'name' => 'Nhâm','element' => 'Thủy', 'sub_elemet' => 'Dương Thủy', 'color' => '#1976d2'],
                (object) ['id' => 10,'name' => 'Quý', 'element' => 'Thủy', 'sub_elemet' => 'Âm Thủy',    'color' => '#0d47a1'],
                (object) ['id' => 11,'name' => 'Giáp','element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
                (object) ['id' => 12,'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
            ]
        ];
        
        $res = self::calculateHeavenlyStem($date);
        if (!$res->code) {
            return Helper::release("Invalid Heavenly Stem date");
        }

        $heavenly_stem = $res->data;
        if (!$heavenly_stem) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        
        $heavenly_stem_by_month = isset($heavenly_stem_month[$heavenly_stem->code]) ? $heavenly_stem_month[$heavenly_stem->code] : null;
        if (!$heavenly_stem_by_month) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        $current_month = date('m', strtotime($date));
        $current_heavenly_stem_by_month = null;
        foreach ($heavenly_stem_by_month as $heavenly_stem) {
            if ($heavenly_stem->id != $current_month) {
                continue;
            }
            $current_heavenly_stem_by_month = $heavenly_stem;
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
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));

        $earthly_branch_month = [
            (object) ["id" => 0, "name" => "Thân", "element" => "Kim",  "sub_elemet" => "Dương Kim",  "color" => "#fbb034", "from_day" => 7, "from_month" => 8,  "to_day" => 7, "to_month" => 9],
            (object) ["id" => 1,  "name" => "Dậu",  "element" => "Kim",  "sub_elemet" => "Âm Kim",     "color" => "#bfa300", "from_day" => 8, "from_month" => 9,  "to_day" => 7, "to_month" => 10],
            (object) ["id" => 2, "name" => "Tuất", "element" => "Thổ",  "sub_elemet" => "Dương Thổ",  "color" => "#999966", "from_day" => 8, "from_month" => 10, "to_day" => 6, "to_month" => 11],
            (object) ["id" => 3,  "name" => "Hợi",  "element" => "Thủy", "sub_elemet" => "Âm Thủy",    "color" => "#0d47a1", "from_day" => 7, "from_month" => 11, "to_day" => 6, "to_month" => 12],
            (object) ["id" => 4,  "name" => "Tý",   "element" => "Thủy", "sub_elemet" => "Dương Thủy", "color" => "#1976d2", "from_day" => 7, "from_month" => 12, "to_day" => 5, "to_month" => 1],
            (object) ["id" => 5,  "name" => "Sửu",  "element" => "Thổ",  "sub_elemet" => "Âm Thổ",     "color" => "#b39c82", "from_day" => 6, "from_month" => 1,  "to_day" => 3, "to_month" => 2],
            (object) ["id" => 6,  "name" => "Dần",  "element" => "Mộc",  "sub_elemet" => "Dương Mộc",  "color" => "#00aa55", "from_day" => 4, "from_month" => 2,  "to_day" => 4, "to_month" => 3],
            (object) ["id" => 7,  "name" => "Mão",  "element" => "Mộc",  "sub_elemet" => "Âm Mộc",     "color" => "#66cc99", "from_day" => 5, "from_month" => 3,  "to_day" => 4, "to_month" => 4],
            (object) ["id" => 8, "name" => "Thìn", "element" => "Thổ",  "sub_elemet" => "Dương Thổ",  "color" => "#999966", "from_day" => 5, "from_month" => 4,  "to_day" => 5, "to_month" => 5],
            (object) ["id" => 9,   "name" => "Tỵ",   "element" => "Hỏa",  "sub_elemet" => "Âm Hỏa",     "color" => "#cc0000", "from_day" => 6, "from_month" => 5,  "to_day" => 5, "to_month" => 6],
            (object) ["id" => 10,  "name" => "Ngọ",  "element" => "Hỏa",  "sub_elemet" => "Dương Hỏa",  "color" => "#ff3333", "from_day" => 6, "from_month" => 6,  "to_day" => 6, "to_month" => 7],
            (object) ["id" => 11,  "name" => "Mùi",  "element" => "Thổ",  "sub_elemet" => "Âm Thổ",     "color" => "#b39c82", "from_day" => 7, "from_month" => 7,  "to_day" => 6, "to_month" => 8],
        ];
        
        $selected_earthly_branch_month = null;

        foreach ($earthly_branch_month as $earthly_branch) {
            if (
                ($month == $earthly_branch->from_month && $day >= $earthly_branch->from_day) ||
                ($month <= $earthly_branch->to_month && $day <= $earthly_branch->to_day)
            ) {
                $selected_earthly_branch_month = $earthly_branch;
                break;
            }
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

    public static function gregorianToJDN($date) 
    {
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

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
    
    /**
     * 6. Calculaed heavenly stem of day
     * @param mixed $date
     * @return object
     */
    public static function calculateHeavenlyStemDay($date)
    {
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $heavenly_stem_day = [
            (object) ['id' => 1, 'name' => 'Giáp', 'element' => 'Mộc',  'sub_elemet' => 'Dương Mộc',  'color' => '#00aa55'],
            (object) ['id' => 2, 'name' => 'Ất',  'element' => 'Mộc',  'sub_elemet' => 'Âm Mộc',     'color' => '#66cc99'],
            (object) ['id' => 3, 'name' => 'Bính', 'element' => 'Hỏa',  'sub_elemet' => 'Dương Hỏa',  'color' => '#ff3333'],
            (object) ['id' => 4, 'name' => 'Đinh', 'element' => 'Hỏa',  'sub_elemet' => 'Âm Hỏa',     'color' => '#cc0000'],
            (object) ['id' => 5, 'name' => 'Mậu', 'element' => 'Thổ',  'sub_elemet' => 'Dương Thổ',  'color' => '#999966'],
            (object) ['id' => 6, 'name' => 'Kỷ',  'element' => 'Thổ',  'sub_elemet' => 'Âm Thổ',     'color' => '#b39c82'],
            (object) ['id' => 7, 'name' => 'Canh','element' => 'Kim',  'sub_elemet' => 'Dương Kim',  'color' => '#fbb034'],
            (object) ['id' => 8, 'name' => 'Tân',  'element' => 'Kim',  'sub_elemet' => 'Âm Kim',     'color' => '#bfa300'],
            (object) ['id' => 9,  "name"   =>'Nhâm','element'=>'Thủy','sub_elemet'=>'Dương Thủy','color'=>'#1976d2'],
            (object) ['id' => 10, 'name'=>'Quý', 'element'=>'Thủy','sub_elemet'=>'Âm Thủy','color'=>'#0d47a1']
        ];

        $day_converted_to_jdn = self::gregorianToJDN($date);
        \Log::channel('my_custom_log')->error("Heavenly stem day", [
            'day_converted_to_jdn' => $day_converted_to_jdn,
        ]);

        $heavenly_stem_of_day_calculated = intval(($day_converted_to_jdn + 9) % 10);
        if ($heavenly_stem_of_day_calculated == 0) {
            $heavenly_stem_of_day_calculated = 10;
        }
        \Log::channel('my_custom_log')->error("Heavenly stem day calculated", [
            'heavenly_stem_of_day_calculated' => $heavenly_stem_of_day_calculated,
        ]);
        $selected_heavenly_stem = null;
        foreach ($heavenly_stem_day as $heavenly_stem) {
            if ($heavenly_stem->id == $heavenly_stem_of_day_calculated) {
                $selected_heavenly_stem = $heavenly_stem;
                break;
            }
        }
        \Log::channel('my_custom_log')->error("Heavenly stem day selected", [
            'selected_heavenly_stem' => $selected_heavenly_stem,
        ]);
        if (!$selected_heavenly_stem) {
            return Helper::release("Invalid Heavenly Stem date");
        }
        return Helper::release(
            "Get data successfully",
            Helper::$SUCCESS_CODE,
            $selected_heavenly_stem
        );
    }

    public static function calculateEarthlyBranchDay($date)
    {
        $branches = ['Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất', 'Hợi'];
        
        $jdn = self::gregorianToJDN($date);
        $index = ($jdn + 10) % 12;

        return $branches[$index];
    }
}
