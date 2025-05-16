<?php

namespace App\Shared;

class Formula {

    /**
     * @index 1
     * @desc EN: Get the formula for agricultural
     * @desc VI: Lấy công thức nông lịch
     * @return object[]
     */
    public static function getFormulaAgricutural() {
        return [
            (object) [
                'id' => 0,
                'name' => 'Dần',
                'range' => [
                    (object) ["start" => "04-02", "end" => "18-02", "name" => "Lập Xuân"],
                    (object) ["start" => "19-02", "end" => "04-03", "name" => "Vũ Thủy"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "tot" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "trung" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "yeu" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 1,
                'name' => 'Mão',
                'range' => [
                    (object) ["start" => "05-03", "end" => "20-03", "name" => "Kinh Trập"],
                    (object) ["start" => "21-03", "end" => "04-04", "name" => "Xuân Phân"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "tot" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "trung" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "yeu" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 2,
                'name' => 'Thìn',
                'range' => [
                    (object) ["start" => "05-04", "end" => "19-04", "name" => "Thanh Minh"],
                    (object) ["start" => "20-04", "end" => "05-05", "name" => "Cốc Vũ"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "tot" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "trung" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "yeu" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 3,
                'name' => 'Tỵ',
                'range' => [
                    (object) ["start" => "06-05", "end" => "20-05", "name" => "Lập Hạ"],
                    (object) ["start" => "21-05", "end" => "05-06", "name" => "Tiểu Mãn"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "tot" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "trung" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "yeu" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 4,
                'name' => 'Ngọ',
                'range' => [
                    (object) ["start" => "06-06", "end" => "20-06", "name" => "Mang Chủng"],
                    (object) ["start" => "21-06", "end" => "06-07", "name" => "Hạ Chí"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "tot" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "trung" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "yeu" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 5,
                'name' => 'Mùi',
                'range' => [
                    (object) ["start" => "07-07", "end" => "22-07", "name" => "Tiểu Thử"],
                    (object) ["start" => "23-07", "end" => "06-08", "name" => "Đại Thử"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "tot" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "trung" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "yeu" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 6,
                'name' => 'Thân',
                'range' => [
                    (object) ["start" => "07-08", "end" => "22-08", "name" => "Lập Thu"],
                    (object) ["start" => "23-08", "end" => "07-09", "name" => "Xử Thử"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "tot" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "trung" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "yeu" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 7,
                'name' => 'Dậu',
                'range' => [
                    (object) ["start" => "08-09", "end" => "22-09", "name" => "Bạch Lộ"],
                    (object) ["start" => "23-09", "end" => "07-10", "name" => "Thu Phân"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "tot" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "trung" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "yeu" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 8,
                'name' => 'Tuất',
                'range' => [
                    (object) ["start" => "08-10", "end" => "22-10", "name" => "Hàn Lộ"],
                    (object) ["start" => "23-10", "end" => "06-11", "name" => "Sương Giáng"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "tot" => (object) ["name" => "Kim", "yin_yang" => "Dương", "color" => "#ffbb33"],
                    "trung" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "yeu" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 9,
                'name' => 'Hợi',
                'range' => [
                    (object) ["start" => "07-11", "end" => "21-11", "name" => "Lập Đông"],
                    (object) ["start" => "22-11", "end" => "06-12", "name" => "Tiểu Tuyết"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "tot" => (object) ["name" => "Mộc", "yin_yang" => "Dương", "color" => "#00aa55"],
                    "trung" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "yeu" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 10,
                'name' => 'Tý',
                'range' => [
                    (object) ["start" => "07-12", "end" => "21-12", "name" => "Đại Tuyết"],
                    (object) ["start" => "22-12", "end" => "05-01", "name" => "Đông Chí"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "tot" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "trung" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "yeu" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
            (object) [
                'id' => 11,
                'name' => 'Sửu',
                'range' => [
                    (object) ["start" => "06-01", "end" => "20-01", "name" => "Tiểu Hàn"],
                    (object) ["start" => "21-01", "end" => "03-02", "name" => "Đại Hàn"]
                ],
                'element' => (object) [
                    "vuong" => (object) ["name" => "Thổ", "yin_yang" => "Âm", "color" => "#9933cc"],
                    "tot" => (object) ["name" => "Thủy", "yin_yang" => "Âm", "color" => "#3399ff"],
                    "trung" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                    "yeu" => (object) ["name" => "Hỏa", "yin_yang" => "Dương", "color" => "#ff4444"],
                    "khuyet" => (object) ["name" => "", "yin_yang" => "", "color" => ""],
                ]
            ],
        ];
    }

    /**
     * @index 2
     * @desc EN: Get the formula for heavenly stem
     * @desc VI: Lấy công thức thiên can
     * @return object[]
     */
    public static function getFormulaHeavenlyStem() {
        return [
            (object) ["id" => 0, "name" => "Canh", "yin_yang" => "Kim",  "polarity" => "Dương", "color" => "text-yellow-500"],
            (object) ["id" => 1, "name" => "Tân",  "yin_yang" => "Kim",  "polarity" => "Âm",    "color" => "text-yellow-500"],
            (object) ["id" => 2, "name" => "Nhâm", "yin_yang" => "Thủy", "polarity" => "Dương", "color" => "text-blue-600"],
            (object) ["id" => 3, "name" => "Quý",  "yin_yang" => "Thủy", "polarity" => "Âm",    "color" => "text-blue-600"],
            (object) ["id" => 4, "name" => "Giáp", "yin_yang" => "Mộc",  "polarity" => "Dương", "color" => "text-green-700"],
            (object) ["id" => 5, "name" => "Ất",   "yin_yang" => "Mộc",  "polarity" => "Âm",    "color" => "text-green-700"],
            (object) ["id" => 6, "name" => "Bính", "yin_yang" => "Hỏa",  "polarity" => "Dương", "color" => "text-red-600"],
            (object) ["id" => 7, "name" => "Đinh", "yin_yang" => "Hỏa",  "polarity" => "Âm",    "color" => "text-red-600"],
            (object) ["id" => 8, "name" => "Mậu",  "yin_yang" => "Thổ",  "polarity" => "Dương", "color" => "text-yellow-800"],
            (object) ["id" => 9, "name" => "Kỷ",   "yin_yang" => "Thổ",  "polarity" => "Âm",    "color" => "text-yellow-800"],
        ];        
    }

    /**
     * @index 3
     * @desc EN: Get the formula for earthly branch
     * @desc VI: Lấy công thức địa chi
     * @return object[]
     */
    public static function getFormulaEarthlyBranch() {
        return [
            (object) ["id" => 0, "name" => "Tý",   "yin_yang" => "Thủy", "polarity" => "Dương", "color" => "text-blue-600"],
            (object) ["id" => 1, "name" => "Sửu",  "yin_yang" => "Thổ",  "polarity" => "Âm",    "color" => "text-yellow-800"],
            (object) ["id" => 2, "name" => "Dần",  "yin_yang" => "Mộc",  "polarity" => "Dương", "color" => "text-green-700"],
            (object) ["id" => 3, "name" => "Mão",  "yin_yang" => "Mộc",  "polarity" => "Âm",    "color" => "text-green-700"],
            (object) ["id" => 4, "name" => "Thìn", "yin_yang" => "Thổ",  "polarity" => "Dương", "color" => "text-yellow-800"],
            (object) ["id" => 5, "name" => "Tỵ",   "yin_yang" => "Hỏa",  "polarity" => "Âm",    "color" => "text-red-600"],
            (object) ["id" => 6, "name" => "Ngọ",  "yin_yang" => "Hỏa",  "polarity" => "Dương", "color" => "text-red-600"],
            (object) ["id" => 7, "name" => "Mùi",  "yin_yang" => "Thổ",  "polarity" => "Âm",    "color" => "text-yellow-800"],
            (object) ["id" => 8, "name" => "Thân", "yin_yang" => "Kim",  "polarity" => "Dương", "color" => "text-yellow-500"],
            (object) ["id" => 9, "name" => "Dậu",  "yin_yang" => "Kim",  "polarity" => "Âm",    "color" => "text-yellow-500"],
        ];               
    }

    /**
     * @index 4
     * @desc EN: Get the formula for Na Yin (Sixty Jiazi Stems and Branches)
     * @desc VI: Lấy công thức nạp âm (Lục thập hoa giáp)
     * @return object[]
     */
    public static function getFormulaNaYin() {
        return [];
    }

    /**
     * @index 5
     * @desc EN: Get the formula propotions of Hidden Heavenly Stem in Earthly Branch
     * @desc VI: Lấy công thức tỉ lệ của thiên can ẩn trong địa chi
     * @return object[]
     */
    public static function getFormulaHiddenHSinEB() {
        return [
            (object) [
                "id" => 0,
                "name" => "Tý",
                "hidden" => [
                    (object) ["heavenly_stem" => "Quý", "yin_yang" => "Âm Thủy", "color" => "#3399ff", "percent" => 100],
                ]
            ],
            (object) [
                "id" => 1,
                "name" => "Sửu",
                "hidden" => [
                    (object) ["heavenly_stem" => "Kỷ", "yin_yang" => "Âm Thổ", "color" => "#996633", "percent" => 60],
                    (object) ["heavenly_stem" => "Quý", "yin_yang" => "Âm Thủy", "color" => "#3399ff", "percent" => 30],
                    (object) ["heavenly_stem" => "Tân", "yin_yang" => "Âm Kim", "color" => "#ffbb33", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 2,
                "name" => "Dần",
                "hidden" => [
                    (object) ["heavenly_stem" => "Giáp", "yin_yang" => "Dương Mộc", "color" => "#00cc00", "percent" => 60],
                    (object) ["heavenly_stem" => "Bính", "yin_yang" => "Dương Hỏa", "color" => "#ff4444", "percent" => 30],
                    (object) ["heavenly_stem" => "Mậu", "yin_yang" => "Dương Thổ", "color" => "#996633", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 3,
                "name" => "Mão",
                "hidden" => [
                    (object) ["heavenly_stem" => "Ất", "yin_yang" => "Âm Mộc", "color" => "#00cc00", "percent" => 100],
                ]
            ],
            (object) [
                "id" => 4,
                "name" => "Thìn",
                "hidden" => [
                    (object) ["heavenly_stem" => "Mậu", "yin_yang" => "Dương Thổ", "color" => "#996633", "percent" => 60],
                    (object) ["heavenly_stem" => "Ất", "yin_yang" => "Âm Mộc", "color" => "#00cc00", "percent" => 30],
                    (object) ["heavenly_stem" => "Quý", "yin_yang" => "Âm Thủy", "color" => "#3399ff", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 5,
                "name" => "Tỵ",
                "hidden" => [
                    (object) ["heavenly_stem" => "Bính", "yin_yang" => "Dương Hỏa", "color" => "#ff4444", "percent" => 60],
                    (object) ["heavenly_stem" => "Mậu", "yin_yang" => "Dương Thổ", "color" => "#996633", "percent" => 30],
                    (object) ["heavenly_stem" => "Canh", "yin_yang" => "Dương Kim", "color" => "#ffbb33", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 6,
                "name" => "Ngọ",
                "hidden" => [
                    (object) ["heavenly_stem" => "Đinh", "yin_yang" => "Âm Hỏa", "color" => "#ff4444", "percent" => 70],
                    (object) ["heavenly_stem" => "Kỷ", "yin_yang" => "Âm Thổ", "color" => "#996633", "percent" => 30],
                ]
            ],
            (object) [
                "id" => 7,
                "name" => "Mùi",
                "hidden" => [
                    (object) ["heavenly_stem" => "Đinh", "yin_yang" => "Âm Hỏa", "color" => "#ff4444", "percent" => 30],
                    (object) ["heavenly_stem" => "Kỷ", "yin_yang" => "Âm Thổ", "color" => "#996633", "percent" => 60],
                    (object) ["heavenly_stem" => "Ất", "yin_yang" => "Âm Mộc", "color" => "#00cc00", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 8,
                "name" => "Thân",
                "hidden" => [
                    (object) ["heavenly_stem" => "Canh", "yin_yang" => "Dương Kim", "color" => "#ffbb33", "percent" => 60],
                    (object) ["heavenly_stem" => "Nhâm", "yin_yang" => "Dương Thủy", "color" => "#3399ff", "percent" => 30],
                    (object) ["heavenly_stem" => "Mậu", "yin_yang" => "Dương Thổ", "color" => "#996633", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 9,
                "name" => "Dậu",
                "hidden" => [
                    (object) ["heavenly_stem" => "Tân", "yin_yang" => "Âm Kim", "color" => "#ffbb33", "percent" => 100],
                ]
            ],
            (object) [
                "id" => 10,
                "name" => "Tuất",
                "hidden" => [
                    (object) ["heavenly_stem" => "Mậu", "yin_yang" => "Dương Thổ", "color" => "#996633", "percent" => 60],
                    (object) ["heavenly_stem" => "Tân", "yin_yang" => "Âm Kim", "color" => "#ffbb33", "percent" => 30],
                    (object) ["heavenly_stem" => "Đinh", "yin_yang" => "Âm Hỏa", "color" => "#ff4444", "percent" => 10],
                ]
            ],
            (object) [
                "id" => 11,
                "name" => "Hợi",
                "hidden" => [
                    (object) ["heavenly_stem" => "Nhâm", "yin_yang" => "Dương Thủy", "color" => "#3399ff", "percent" => 70],
                    (object) ["heavenly_stem" => "Giáp", "yin_yang" => "Dương Mộc", "color" => "#00cc00", "percent" => 30],
                ]
            ],
        ];        
    }
}