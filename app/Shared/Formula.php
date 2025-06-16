<?php

namespace App\Shared;

class Formula
{

    /**
     * @index 1
     * @desc EN: Get the formula for agricultural
     * @desc VI: Lấy công thức nông lịch
     * @return object[]
     */
    public static function getFormulaAgricutural()
    {
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
    public static function getFormulaHeavenlyStem()
    {
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
    public static function getFormulaEarthlyBranch()
    {
        return [
            (object) ["id" => 0, "name" => "Tý",   "yin_yang" => "Thủy", "polarity" => "Dương", "color" => "text-blue-600"],
            (object) ["id" => 1, "name" => "Sửu",  "yin_yang" => "Thổ",  "polarity" => "Âm",    "color" => "text-yellow-800"],
            (object) ["id" => 2, "name" => "Dần",  "yin_yang" => "Mộc",  "polarity" => "Dương", "color" => "text-green-600"],
            (object) ["id" => 3, "name" => "Mão",  "yin_yang" => "Mộc",  "polarity" => "Âm",    "color" => "text-green-600"],
            (object) ["id" => 4, "name" => "Thìn", "yin_yang" => "Thổ",  "polarity" => "Dương", "color" => "text-yellow-800"],
            (object) ["id" => 5, "name" => "Tỵ",   "yin_yang" => "Hỏa",  "polarity" => "Âm",    "color" => "text-red-500"],
            (object) ["id" => 6, "name" => "Ngọ",  "yin_yang" => "Hỏa",  "polarity" => "Dương", "color" => "text-red-500"],
            (object) ["id" => 7, "name" => "Mùi",  "yin_yang" => "Thổ",  "polarity" => "Âm",    "color" => "text-yellow-800"],
            (object) ["id" => 8, "name" => "Thân", "yin_yang" => "Kim",  "polarity" => "Dương", "color" => "text-yellow-600"],
            (object) ["id" => 9, "name" => "Dậu",  "yin_yang" => "Kim",  "polarity" => "Âm",    "color" => "text-yellow-600"],
            (object) ["id" => 10, "name" => "Tuất", "yin_yang" => "Thổ", "polarity" => "Dương", "color" => "text-yellow-800"],
            (object) ["id" => 11, "name" => "Hợi",  "yin_yang" => "Thủy", "polarity" => "Âm",   "color" => "text-blue-600"],
        ];
    }

    /**
     * @index 4
     * @desc EN: Get the formula for Na Yin (Sixty Jiazi Stems and Branches)
     * @desc VI: Lấy công thức nạp âm (Lục thập hoa giáp)
     * @return object[]
     */
    public static function getFormulaNaYin()
    {
        return [];
    }

    /**
     * @index 5
     * @desc EN: Get the formula propotions of Hidden Heavenly Stem in Earthly Branch
     * @desc VI: Lấy công thức tỉ lệ của thiên can ẩn trong địa chi
     * @return object[]
     */
    public static function getFormulaHiddenHSinEB()
    {
        return [
            (object) [
                "id" => 0,
                "name" => "Tý",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Quý",
                        "yin_yang" => "Thủy",
                        "polarity" => "Âm",
                        "color" => "#3399ff",
                        "percent" => 100,
                        "text_color" => "text-blue-500",
                    ],
                ],
            ],
            (object) [
                "id" => 1,
                "name" => "Sửu",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Kỷ",
                        "yin_yang" => "Thổ",
                        "polarity" => "Âm",
                        "color" => "#996633",
                        "percent" => 60,
                        "text_color" => "text-yellow-800",
                    ],
                    (object) [
                        "heavenly_stem" => "Quý",
                        "yin_yang" => "Thủy",
                        "polarity" => "Âm",
                        "color" => "#3399ff",
                        "percent" => 30,
                        "text_color" => "text-blue-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Tân",
                        "yin_yang" => "Kim",
                        "polarity" => "Âm",
                        "color" => "#ffbb33",
                        "percent" => 10,
                        "text_color" => "text-yellow-400",
                    ],
                ],
            ],
            (object) [
                "id" => 2,
                "name" => "Dần",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Giáp",
                        "yin_yang" => "Mộc",
                        "polarity" => "Dương",
                        "color" => "#00cc00",
                        "percent" => 60,
                        "text_color" => "text-green-600",
                    ],
                    (object) [
                        "heavenly_stem" => "Bính",
                        "yin_yang" => "Hỏa",
                        "polarity" => "Dương",
                        "color" => "#ff4444",
                        "percent" => 30,
                        "text_color" => "text-red-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Mậu",
                        "yin_yang" => "Thổ",
                        "polarity" => "Dương",
                        "color" => "#996633",
                        "percent" => 10,
                        "text_color" => "text-yellow-800",
                    ],
                ],
            ],
            (object) [
                "id" => 3,
                "name" => "Mão",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Ất",
                        "yin_yang" => "Mộc",
                        "polarity" => "Âm",
                        "color" => "#00cc00",
                        "percent" => 100,
                        "text_color" => "text-green-600",
                    ],
                ],
            ],
            (object) [
                "id" => 4,
                "name" => "Thìn",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Mậu",
                        "yin_yang" => "Thổ",
                        "polarity" => "Dương",
                        "color" => "#996633",
                        "percent" => 60,
                        "text_color" => "text-yellow-800",
                    ],
                    (object) [
                        "heavenly_stem" => "Ất",
                        "yin_yang" => "Mộc",
                        "polarity" => "Âm",
                        "color" => "#00cc00",
                        "percent" => 30,
                        "text_color" => "text-green-600",
                    ],
                    (object) [
                        "heavenly_stem" => "Quý",
                        "yin_yang" => "Thủy",
                        "polarity" => "Âm",
                        "color" => "#3399ff",
                        "percent" => 10,
                        "text_color" => "text-blue-500",
                    ],
                ],
            ],
            (object) [
                "id" => 5,
                "name" => "Tỵ",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Bính",
                        "yin_yang" => "Hỏa",
                        "polarity" => "Dương",
                        "color" => "#ff4444",
                        "percent" => 60,
                        "text_color" => "text-red-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Mậu",
                        "yin_yang" => "Thổ",
                        "polarity" => "Dương",
                        "color" => "#996633",
                        "percent" => 30,
                        "text_color" => "text-yellow-800",
                    ],
                    (object) [
                        "heavenly_stem" => "Canh",
                        "yin_yang" => "Kim",
                        "polarity" => "Dương",
                        "color" => "#ffbb33",
                        "percent" => 10,
                        "text_color" => "text-yellow-400",
                    ],
                ],
            ],
            (object) [
                "id" => 6,
                "name" => "Ngọ",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Đinh",
                        "yin_yang" => "Hỏa",
                        "polarity" => "Âm",
                        "color" => "#ff4444",
                        "percent" => 70,
                        "text_color" => "text-red-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Kỷ",
                        "yin_yang" => "Thổ",
                        "polarity" => "Âm",
                        "color" => "#996633",
                        "percent" => 30,
                        "text_color" => "text-yellow-800",
                    ],
                ],
            ],
            (object) [
                "id" => 7,
                "name" => "Mùi",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Đinh",
                        "yin_yang" => "Hỏa",
                        "polarity" => "Âm",
                        "color" => "#ff4444",
                        "percent" => 30,
                        "text_color" => "text-red-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Kỷ",
                        "yin_yang" => "Thổ",
                        "polarity" => "Âm",
                        "color" => "#996633",
                        "percent" => 60,
                        "text_color" => "text-yellow-800",
                    ],
                    (object) [
                        "heavenly_stem" => "Ất",
                        "yin_yang" => "Mộc",
                        "polarity" => "Âm",
                        "color" => "#00cc00",
                        "percent" => 10,
                        "text_color" => "text-green-600",
                    ],
                ],
            ],
            (object) [
                "id" => 8,
                "name" => "Thân",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Canh",
                        "yin_yang" => "Kim",
                        "polarity" => "Dương",
                        "color" => "#ffbb33",
                        "percent" => 60,
                        "text_color" => "text-yellow-400",
                    ],
                    (object) [
                        "heavenly_stem" => "Nhâm",
                        "yin_yang" => "Thủy",
                        "polarity" => "Dương",
                        "color" => "#3399ff",
                        "percent" => 30,
                        "text_color" => "text-blue-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Mậu",
                        "yin_yang" => "Thổ",
                        "polarity" => "Dương",
                        "color" => "#996633",
                        "percent" => 10,
                        "text_color" => "text-yellow-800",
                    ],
                ],
            ],
            (object) [
                "id" => 9,
                "name" => "Dậu",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Tân",
                        "yin_yang" => "Kim",
                        "polarity" => "Âm",
                        "color" => "#ffbb33",
                        "percent" => 100,
                        "text_color" => "text-yellow-400",
                    ],
                ],
            ],
            (object) [
                "id" => 10,
                "name" => "Tuất",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Mậu",
                        "yin_yang" => "Thổ",
                        "polarity" => "Dương",
                        "color" => "#996633",
                        "percent" => 60,
                        "text_color" => "text-yellow-800",
                    ],
                    (object) [
                        "heavenly_stem" => "Tân",
                        "yin_yang" => "Kim",
                        "polarity" => "Âm",
                        "color" => "#ffbb33",
                        "percent" => 30,
                        "text_color" => "text-yellow-400",
                    ],
                    (object) [
                        "heavenly_stem" => "Đinh",
                        "yin_yang" => "Hỏa",
                        "polarity" => "Âm",
                        "color" => "#ff4444",
                        "percent" => 10,
                        "text_color" => "text-red-500",
                    ],
                ],
            ],
            (object) [
                "id" => 11,
                "name" => "Hợi",
                "hidden" => [
                    (object) [
                        "heavenly_stem" => "Nhâm",
                        "yin_yang" => "Thủy",
                        "polarity" => "Dương",
                        "color" => "#3399ff",
                        "percent" => 70,
                        "text_color" => "text-blue-500",
                    ],
                    (object) [
                        "heavenly_stem" => "Giáp",
                        "yin_yang" => "Mộc",
                        "polarity" => "Dương",
                        "color" => "#00cc00",
                        "percent" => 30,
                        "text_color" => "text-green-600",
                    ],
                ],
            ],
        ];
    }

    /**
     * @index 6
     * @desc EN: Get the formula for hidden stem
     * @desc VI: Lấy công thức thiên can ẩn
     * @return object[]
     */
    public static function getFormulaHiddenStem()
    {
        return [
            (object) [
                "begin_yin_yang" => "Kim",
                "begin_polarity" => "Dương",
                "color" => "text-yellow-500",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Kim",
                "begin_polarity" => "Âm",
                "color" => "text-yellow-500",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Mộc",
                "begin_polarity" => "Âm",
                "color" => "text-green-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Mộc",
                "begin_polarity" => "Dương",
                "color" => "text-green-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thủy",
                "begin_polarity" => "Dương",
                "color" => "text-blue-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thủy",
                "begin_polarity" => "Âm",
                "color" => "text-blue-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Hỏa",
                "begin_polarity" => "Dương",
                "color" => "text-red-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Hỏa",
                "begin_polarity" => "Âm",
                "color" => "text-red-600",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thổ",
                "begin_polarity" => "Dương",
                "color" => "text-yellow-700",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thổ",
                "begin_polarity" => "Âm",
                "color" => "text-yellow-700",
                "hidden_stems" => [
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
        ];
    }

    /**
     * @index 7
     * @desc EN: Get the formula for sound
     * @desc VI: Lấy công thức âm
     * @return object[]
     */
    public static function getFormulaElementSound()
    {
        return [
            (object) [
                "id" => "Giáp Tý",
                "name" => "Hải Trung",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong biển",
            ],
            (object) [
                "id" => "Ất Sửu",
                "name" => "Hải Trung",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong biển",
            ],

            (object) [
                "id" => "Bính Dần",
                "name" => "Lư Trung",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa trong lò",
            ],
            (object) [
                "id" => "Đinh Mão",
                "name" => "Lư Trung",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa trong lò",
            ],

            (object) [
                "id" => "Mậu Thìn",
                "name" => "Đại Lâm",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây trong rừng",
            ],
            (object) [
                "id" => "Kỷ Tỵ",
                "name" => "Đại Lâm",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây trong rừng",
            ],

            (object) [
                "id" => "Canh Ngọ",
                "name" => "Lộ Bàng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất ven đường",
            ],
            (object) [
                "id" => "Tân Mùi",
                "name" => "Lộ Bàng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất ven đường",
            ],

            (object) [
                "id" => "Nhâm Thân",
                "name" => "Kiếm Phong",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng đấu kiếm",
            ],
            (object) [
                "id" => "Quý Dậu",
                "name" => "Kiếm Phong",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng đấu kiếm",
            ],

            (object) [
                "id" => "Giáp Tuất",
                "name" => "Sơn Đầu",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa đầu núi",
            ],
            (object) [
                "id" => "Ất Hợi",
                "name" => "Sơn Đầu",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa đầu núi",
            ],

            (object) [
                "id" => "Bính Tý",
                "name" => "Giản Hạ",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước khe suối",
            ],
            (object) [
                "id" => "Đinh Sửu",
                "name" => "Giản Hạ",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước khe suối",
            ],

            (object) [
                "id" => "Mậu Dần",
                "name" => "Thành Đầu",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất tường thành",
            ],
            (object) [
                "id" => "Kỷ Mão",
                "name" => "Thành Đầu",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất tường thành",
            ],

            (object) [
                "id" => "Canh Thìn",
                "name" => "Bạch Lạp",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong biển",
            ],
            (object) [
                "id" => "Tân Tỵ",
                "name" => "Bạch Lạp",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong biển",
            ],

            (object) [
                "id" => "Nhâm Ngọ",
                "name" => "Dương Liễu",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây liễu rủ",
            ],
            (object) [
                "id" => "Quý Mùi",
                "name" => "Dương Liễu",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây liễu rủ",
            ],

            (object) [
                "id" => "Giáp Thân",
                "name" => "Tuyền Trung",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước trong suối",
            ],
            (object) [
                "id" => "Ất Dậu",
                "name" => "Tuyền Trung",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước trong suối",
            ],

            (object) [
                "id" => "Bính Tuất",
                "name" => "Ốc Thượng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất trên mái",
            ],
            (object) [
                "id" => "Đinh Hợi",
                "name" => "Ốc Thượng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất trên mái",
            ],

            (object) [
                "id" => "Mậu Tý",
                "name" => "Tích Lịch",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa sấm sét",
            ],
            (object) [
                "id" => "Kỷ Sửu",
                "name" => "Tích Lịch",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa sấm sét",
            ],

            (object) [
                "id" => "Canh Dần",
                "name" => "Tùng Bách",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây tùng bách",
            ],
            (object) [
                "id" => "Tân Mão",
                "name" => "Tùng Bách",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây tùng bách",
            ],

            (object) [
                "id" => "Nhâm Thìn",
                "name" => "Trường Lưu",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước sông dài",
            ],
            (object) [
                "id" => "Quý Tỵ",
                "name" => "Trường Lưu",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước sông dài",
            ],

            (object) [
                "id" => "Giáp Ngọ",
                "name" => "Sa Trung",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong cát",
            ],
            (object) [
                "id" => "Ất Mùi",
                "name" => "Sa Trung",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trong cát",
            ],

            (object) [
                "id" => "Bính Thân",
                "name" => "Sơn Hạ",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa dưới núi",
            ],
            (object) [
                "id" => "Đinh Dậu",
                "name" => "Sơn Hạ",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa dưới núi",
            ],

            (object) [
                "id" => "Mậu Tuấn",
                "name" => "Bình Địa",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây đất bằng",
            ],
            (object) [
                "id" => "Kỷ Hợi",
                "name" => "Bình Địa",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây đất bằng",
            ],

            (object) [
                "id" => "Canh Tý",
                "name" => "Bích Thượng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất vách tường",
            ],
            (object) [
                "id" => "Tân Sửu",
                "name" => "Bích Thượng",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất vách tường",
            ],

            (object) [
                "id" => "Nhâm Dần",
                "name" => "Kim Bạch",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng pha bạc",
            ],
            (object) [
                "id" => "Quý Mão",
                "name" => "Kim Bạch",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng pha bạc",
            ],

            (object) [
                "id" => "Giáp Thìn",
                "name" => "Phú Đăng",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa đèn dầu",
            ],
            (object) [
                "id" => "Ất Tỵ",
                "name" => "Phú Đăng",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa đèn dầu",
            ],

            (object) [
                "id" => "Bính Ngọ",
                "name" => "Thiên Hà",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước trên trời",
            ],
            (object) [
                "id" => "Đinh Mùi",
                "name" => "Thiên Hà",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước trên trời",
            ],

            (object) [
                "id" => "Mậu Thân",
                "name" => "Đại Trạch",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất đầm lầy",
            ],
            (object) [
                "id" => "Kỷ Dậu",
                "name" => "Đại Trạch",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất đầm lầy",
            ],

            (object) [
                "id" => "Canh Tuất",
                "name" => "Thoa Xuyến",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trang sức",
            ],
            (object) [
                "id" => "Tân Hợi",
                "name" => "Thoa Xuyến",
                "element" => "Kim",
                "color" => "text-yellow-500",
                "sub_desc" => "Vàng trang sức",
            ],

            (object) [
                "id" => "Nhâm Tý",
                "name" => "Tang Đố",
                "element" => "Kim",
                "color" => "text-green-500",
                "sub_desc" => "Cây dâu cang",
            ],
            (object) [
                "id" => "Quý Sửu",
                "name" => "Tang Đố",
                "element" => "Kim",
                "color" => "text-green-500",
                "sub_desc" => "Cây dâu cang",
            ],

            (object) [
                "id" => "Giáp Dần",
                "name" => "Đại Khuê",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước khe lớn",
            ],
            (object) [
                "id" => "Ất Mão",
                "name" => "Đại Khuê",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước khe lớn",
            ],

            (object) [
                "id" => "Bính Thìn",
                "name" => "Sa Trung",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất trong cát",
            ],
            (object) [
                "id" => "Đinh Tỵ",
                "name" => "Sa Trung",
                "element" => "Thổ",
                "color" => "text-purple-500",
                "sub_desc" => "Đất trong cát",
            ],

            (object) [
                "id" => "Mậu Ngọ",
                "name" => "Thiên Thượng",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa trên trời",
            ],
            (object) [
                "id" => "Kỷ Mùi",
                "name" => "Thiên Thượng",
                "element" => "Hỏa",
                "color" => "text-red-500",
                "sub_desc" => "Lửa trên trời",
            ],

            (object) [
                "id" => "Canh Thân",
                "name" => "Thạch Lựu",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây thạch lựu",
            ],
            (object) [
                "id" => "Tân Dậu",
                "name" => "Thạch Lựu",
                "element" => "Mộc",
                "color" => "text-green-500",
                "sub_desc" => "Cây thạch lựu",
            ],

            (object) [
                "id" => "Nhâm Tuất",
                "name" => "Đại Hải",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước biển lớn",
            ],
            (object) [
                "id" => "Quý Hợi",
                "name" => "Đại Hải",
                "element" => "Thủy",
                "color" => "text-blue-500",
                "sub_desc" => "Nước biển lớn",
            ],
        ];
    }

    /**
     * @index 8
     * @desc EN: Get the formula for growth stage
     * @desc VI: Lấy công thức trường sinh
     * @return object[]
     */
    public static function getFormulaGrowthStage()
    {
        return [
            (object) [
                "id" => "Canh",
                "start" => "Mùi",
                "direction" => 1
            ],
            (object) [
                "id" => "Tân",
                "start" => "Tý",
                "direction" => 0
            ],
            (object) [
                "id" => "Nhâm",
                "start" => "Thân",
                "direction" => 1
            ],
            (object) [
                "id" => "Quý",
                "start" => "Mão",
                "direction" => 0
            ],
            (object) [
                "id" => "Giáp",
                "start" => "Hợi",
                "direction" => 1
            ],
            (object) [
                "id" => "Ất",
                "start" => "Ngọ",
                "direction" => 0
            ],
            (object) [
                "id" => "Bính",
                "start" => "Dần",
                "direction" => 1
            ],
            (object) [
                "id" => "Đinh",
                "start" => "Dậu",
                "direction" => 0
            ],
            (object) [
                "id" => "Mậu",
                "start" => "Dần",
                "direction" => 1
            ],
            (object) [
                "id" => "Kỷ",
                "start" => "Dậu",
                "direction" => 0
            ],
        ];
    }

    /**
     * @index 9
     * @desc EN: Get the formula of growth stage result
     * @desc VI: Lấy kết quả công thức trường sinh
     * @return object[]
     */
    public static function getFormulaGrowthStageResult()
    {
        return [
            (object) ["id" => 0, "name" => "Sinh"],
            (object) ["id" => 1, "name" => "Dục"],
            (object) ["id" => 2, "name" => "Đới"],
            (object) ["id" => 3, "name" => "Quan"],
            (object) ["id" => 4, "name" => "Vượng"],
            (object) ["id" => 5, "name" => "Suy"],
            (object) ["id" => 6, "name" => "Bệnh"],
            (object) ["id" => 7, "name" => "Tử"],
            (object) ["id" => 8, "name" => "Mộ"],
            (object) ["id" => 9, "name" => "Tuyệt"],
            (object) ["id" => 10, "name" => "Thai"],
            (object) ["id" => 11, "name" => "Dưỡng"],
        ];
    }

    public static function getFormulaZodiac()
    {
        return [
            (object) ["id" => 0, "name" => "Tý"],
            (object) ["id" => 1, "name" => "Sửu"],
            (object) ["id" => 2, "name" => "Dần"],
            (object) ["id" => 3, "name" => "Mão"],
            (object) ["id" => 4, "name" => "Thìn"],
            (object) ["id" => 5, "name" => "Tỵ"],
            (object) ["id" => 6, "name" => "Ngọ"],
            (object) ["id" => 7, "name" => "Mùi"],
            (object) ["id" => 8, "name" => "Thân"],
            (object) ["id" => 9, "name" => "Dậu"],
            (object) ["id" => 10, "name" => "Tuất"],
            (object) ["id" => 11, "name" => "Hợi"],
        ];
    }

    /**
     * @index 10
     * @desc EN: Get the formula of shensha system (default formula) - Get by day master
     * @desc VI: Lấy công thức thần sát (công thức default) - Lấy theo nhật chủ
     * @return object[]
     */
    public static function getFormulaShenshaSystemByDayMaster()
    {
        return [
            (object) ["can" => "Tân", "chi" => "Mão", "data" => ["Âm Sai Dương Thác"]],
            (object) ["can" => "Tân", "chi" => "Dậu", "data" => ["Âm Sai Dương Thác", "Hồng Diễm"]],
            (object) ["can" => "Tân", "chi" => "Hợi", "data" => ["Cô Loan", "Thập Linh"]],
            (object) ["can" => "Tân", "chi" => "Mùi", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Tân", "chi" => "Tỵ", "data" => ["Thập Ác Đại Bại", "Đa Mưu", "Lục Tú"]],

            (object) ["can" => "Nhâm", "chi" => "Thìn", "data" => ["Âm Sai Dương Thác", "Khôi Cương", "Thoái Thần"]],
            (object) ["can" => "Nhâm", "chi" => "Tuất", "data" => ["Âm Sai Dương Thác", "Khôi Cương", "Thoái Thần"]],
            (object) ["can" => "Nhâm", "chi" => "Tý", "data" => ["Cô Loan", "Hồng Diễm"]],
            (object) ["can" => "Nhâm", "chi" => "Thân", "data" => ["Thập Ác Đại Bại"]],
            (object) ["can" => "Nhâm", "chi" => "Thủy", "data" => ["Nhật Đức"]],
            (object) ["can" => "Nhâm", "chi" => "Dần", "data" => ["Thập Linh"]],

            (object) ["can" => "Quý", "chi" => "Tỵ", "data" => ["Âm Sai Dương Thác", "Nhật Quý"]],
            (object) ["can" => "Quý", "chi" => "Hợi", "data" => ["Âm Sai Dương Thác", "Thập Ác Đại Bại"]],
            (object) ["can" => "Quý", "chi" => "Thân", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Quý", "chi" => "Mùi", "data" => ["Hồng Diễm", "Thập Linh"]],
            (object) ["can" => "Quý", "chi" => "Mão", "data" => ["Nhật Quý"]],

            (object) ["can" => "Bính", "chi" => "Ngọ", "data" => ["Âm Sai Dương Thác", "Cô Loan", "Lục Tú"]],
            (object) ["can" => "Bính", "chi" => "Tý", "data" => ["Âm Sai Dương Thác"]],
            (object) ["can" => "Bính", "chi" => "Dần", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Bính", "chi" => "Thân", "data" => ["Thập Ác Đại Bại"]],
            (object) ["can" => "Bính", "chi" => "Thìn", "data" => ["Nhật Đức", "Thập Linh"]],

            (object) ["can" => "Đinh", "chi" => "Mùi", "data" => ["Âm Sai Dương Thác", "Hồng Diễm", "Lục Tú", "Thoái Thần"]],
            (object) ["can" => "Đinh", "chi" => "Sửu", "data" => ["Âm Sai Dương Thác", "Thoái Thần"]],
            (object) ["can" => "Đinh", "chi" => "Tỵ", "data" => ["Cô Loan"]],
            (object) ["can" => "Đinh", "chi" => "Hợi", "data" => ["Thập Ác Đại Bại", "Nhật Quý"]],
            (object) ["can" => "Đinh", "chi" => "Dậu", "data" => ["Nhật Quý", "Thập Linh"]],

            (object) ["can" => "Mậu", "chi" => "Thân", "data" => ["Âm Sai Dương Thác", "Cô Loan"]],
            (object) ["can" => "Mậu", "chi" => "Dần", "data" => ["Âm Sai Dương Thác"]],
            (object) ["can" => "Mậu", "chi" => "Ngọ", "data" => ["Cô Loan", "Thập Linh"]],
            (object) ["can" => "Mậu", "chi" => "Thìn", "data" => ["Hồng Diễm", "Nhật Đức", "Khôi Cương"]],
            (object) ["can" => "Mậu", "chi" => "Tuất", "data" => ["Thập Ác Đại Bại", "Khôi Cương"]],
            (object) ["can" => "Mậu", "chi" => "Tý", "data" => ["Đa Mưu", "Lục Tú"]],

            (object) ["can" => "Giáp", "chi" => "Dần", "data" => ["Cô Loan", "Nhật Đức"]],
            (object) ["can" => "Giáp", "chi" => "Ngọ", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Giáp", "chi" => "Thân", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Giáp", "chi" => "Tuất", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Giáp", "chi" => "Thìn", "data" => ["Thập Ác Đại Bại", "Thập Linh"]],

            (object) ["can" => "Ất", "chi" => "Tỵ", "data" => ["Cô Loan", "Thập Ác Đại Bại"]],
            (object) ["can" => "Ất", "chi" => "Ngọ", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Ất", "chi" => "Thân", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Ất", "chi" => "Mùi", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Ất", "chi" => "Hợi", "data" => ["Thập Linh"]],

            (object) ["can" => "Kỷ", "chi" => "Thìn", "data" => ["Hồng Diễm"]],
            (object) ["can" => "Kỷ", "chi" => "Sửu", "data" => ["Thập Ác Đại Bại", "Lục Tú"]],
            (object) ["can" => "Kỷ", "chi" => "Mùi", "data" => ["Lục Tú"]],

            (object) ["can" => "Canh", "chi" => "Tuất", "data" => ["Hồng Diễm", "Thập Linh", "Khôi Cương"]],
            (object) ["can" => "Canh", "chi" => "Thìn", "data" => ["Thập Ác Đại Bại", "Nhật Đức", "Khôi Cương"]],
            (object) ["can" => "Canh", "chi" => "Dần", "data" => ["Thập Linh"]],

        ];
    }

    /**
     * @index 11
     * @desc EN: Get the formula of shensha by day master
     * @desc VI: Lấy công thức thần sát theo nhật chủ - Không vong
     * @return object[]
     */
    public static function getFormulaShenshaSpecialByDayMaster()
    {
        return [
            (object) ["earthly_data" => ["Tuất", "Hợi"], "data" => ["Giáp Tý", "Ất Sửu", "Bính Dần", "Đinh Mão", "Mậu Thìn", "Kỷ Tỵ", "Canh Ngọ", "Tân Mùi", "Nhâm Thân", "Quý Dậu"]],
            (object) ["earthly_data" => ["Thân", "Dậu"], "data" => ["Giáp Tuất", "Ất Hợi", "Bính Tý", "Đinh Sửu", "Mậu Dần", "Kỷ Mão", "Canh Thìn", "Tân Tỵ", "Nhâm Ngọ", "Quý Mùi"]],
            (object) ["earthly_data" => ["Ngọ", "Mùi"], "data" => ["Giáp Thân", "Ất Dậu", "Bính Tuất", "Đinh Hợi", "Mậu Tý", "Kỷ Sửu", "Canh Dần", "Tân Mão", "Nhâm Thìn", "Quý Tỵ"]],
            (object) ["earthly_data" => ["Thìn", "Tỵ"], "data" => ["Giáp Ngọ", "Ất Mùi", "Bính Thân", "Đinh Dậu", "Mậu Tuất", "Kỷ Hợi", "Canh Tý", "Tân Sửu", "Nhâm Dần", "Quý Mão"]],
            (object) ["earthly_data" => ["Dần", "Mão"], "data" => ["Giáp Thìn", "Ất Tỵ", "Bính Ngọ", "Đinh Mùi", "Mậu Thân", "Kỷ Dậu", "Canh Tuất", "Tân Hợi", "Nhâm Tý", "Quý Sửu"]],
            (object) ["earthly_data" => ["Tý", "Sửu"], "data" => ["Giáp Dần", "Ất Mão", "Bính Thìn", "Đinh Tỵ", "Mậu Ngọ", "Kỷ Mùi", "Canh Thân", "Tân Dậu", "Nhâm Tuất", "Quý Sửu"]],
        ];
    }

    // --------------------------------------------------------------------------------------//

    /**
     * @index 12
     * @desc EN: Get the formula of shensha by earthly year
     * @desc VI: Lấy công thức thần sát theo địa chi năm
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyYear()
    {
        return [
            (object) [
                "id" => "Tý",
                "data_shensha" => [
                    "Mùi" => ["Tử Vi", "Địa Giải", "Bạo Bại", "Thiên Ách", "Thiên Sát", "Long Đức Quý Nhân"],
                    "Tý" => ["Tướng Tinh", "Phục Ngâm", "Thiết Tảo", "Kim Quỹ", "Thái Tuế"],
                    "Tuất" => ["Bát Tọa", "Giải Thần", "Phù Trầm", "Quả Tú"],
                    "Thìn" => ["Tam Đài", "Ngũ Quỷ", "Hoa Cái", "Thiên Cương"],
                    "Thân" => ["Chỉ Bối"],
                    "Mão" => ["Hồng Loan", "Tuế Hình", "Quán Tố", "Thái Âm"],
                    "Dậu" => ["Hàm Trì", "Thiên Hỷ", "Đào Hoa", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Ngọ" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tai Sát"],
                    "Tỵ" => ["Tiểu Hao", "Kiếp Sát", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Dần" => ["Cô Thần", "Tang Môn", "Dịch Mã"],
                    "Sửu" => ["Hối Khí", "Thiên Không", "Bản An", "Thái Dương"],
                    "Hợi" => ["Vong Thần"],
                ]
            ],
            (object) [
                "id" => "Sửu",
                "data_shensha" => [
                    "Thân" => ["Tử Vi", "Thiên Hỷ", "Bạo Bại", "Vong Thần", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Dậu" => ["Tướng Tinh", "Giải Thần", "Phù Trầm", "Thiết Tảo", "Kim Quỹ"],
                    "Hợi" => ["Bát Tọa", "Dịch Mã"],
                    "Tỵ" => ["Tam Đài", "Chỉ Bối", "Ngũ Quỷ"],
                    "Mùi" => ["Địa Giải", "Nguyệt Phá", "Phá Toái", "Tuế Phá"],
                    "Sửu" => ["Phục Ngâm", "Hoa Cái", "Thái Tuế"],
                    "Dần" => ["Hồng Loan", "Cô Thần", "Kiếp Sát", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Ngọ" => ["Hàm Trì", "Tiểu Hao", "Đào Hoa", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Tuất" => ["Quả Tú", "Phúc Đức Quý Nhân", "Tuế Hình", "Bản An", "Phúc Tinh Quý Nhân"],
                    "Mão" => ["Thiên Cương", "Tai Sát", "Tang Môn"],
                    "Thìn" => ["Thiên Sát", "Quán Tố", "Thái Âm"],
                ]
            ],
            (object) [
                "id" => "Dần",
                "data_shensha" => [
                    "Dậu" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Ngọ" => ["Tướng Tinh", "Tam Đài", "Ngũ Quỷ", "Kim Quỹ"],
                    "Tý" => ["Bát Tọa", "Tai Sát"],
                    "Dần" => ["Chỉ Bối", "Phục Ngâm", "Thiên Cương", "Thái Tuế"],
                    "Thân" => ["Địa Giải", "Giải Thần", "Phù Trầm", "Nguyệt Phá", "Phá Toái", "Tuế Phá", "Dịch Mã"],
                    "Sửu" => ["Hồng Loan", "Quả Tú", "Thiên Sát"],
                    "Mão" => ["Hàm Trì", "Đào Hoa", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Mùi" => ["Thiên Hỷ", "Thiết Tảo", "Tiểu Hao", "Nguyệt Đức Quý Nhân", "Tử Phù", "Bản An"],
                    "Tuất" => ["Hoa Cái"],
                    "Tỵ" => ["Cô Thần", "Vong Thần", "Tuế Hình", "Quán Tố", "Thái Âm"],
                    "Hợi" => ["Kiếp Sát", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Thìn" => ["Tang Môn"],
                ]
            ],
            (object) [
                "id" => "Mão",
                "data_shensha" => [
                    "Tuất" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Thiên Sát", "Long Đức Quý Nhân"],
                    "Mão" => ["Tướng Tinh", "Phục Ngâm", "Kim Quỹ", "Thái Tuế"],
                    "Sửu" => ["Bát Tọa", "Quả Tú", "Thiên Cương"],
                    "Mùi" => ["Tam Đài", "Giải Thần", "Ngũ Quỷ", "Phù Trầm", "Hoa Cái"],
                    "Hợi" => ["Chỉ Bối"],
                    "Thân" => ["Địa Giải", "Thiết Tảo", "Tiểu Hao", "Kiếp Sát", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Tý" => ["Hồng Loan", "Hàm Trì", "Đào Hoa", "Phúc Đức Quý Nhân", "Tuế Hình", "Phúc Tinh Quý Nhân"],
                    "Ngọ" => ["Thiên Hỷ", "Quán Tố", "Thái Âm"],
                    "Dậu" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tai Sát"],
                    "Tỵ" => ["Cô Thần", "Tang Môn", "Dịch Mã"],
                    "Thìn" => ["Hối Khí", "Thiên Không", "Bản An", "Thái Dương"],
                    "Dần" => ["Vong Thần"],
                ]
            ],
            (object) [
                "id" => "Thìn",
                "data_shensha" => [
                    "Hợi" => ["Tử Vi", "Hồng Loan", "Bạo Bại", "Vong Thần", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Tý" => ["Tướng Tinh", "Thiết Tảo", "Kim Quỹ", "Thiên Cương"],
                    "Dần" => ["Bát Tọa", "Dịch Mã"],
                    "Thân" => ["Tam Đài", "Chỉ Bối", "Ngũ Quỷ"],
                    "Dậu" => ["Địa Giải", "Hàm Trì", "Tiểu Hao", "Đào Hoa", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Ngọ" => ["Giải Thần", "Phù Trầm", "Tai Sát", "Tang Môn"],
                    "Thìn" => ["Phục Ngâm", "Hoa Cái", "Thái Tuế", "Tuế Hình"],
                    "Tỵ" => ["Thiên Hỷ", "Cô Thần", "Kiếp Sát", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Tuất" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá"],
                    "Sửu" => ["Quả Tú", "Phúc Đức Quý Nhân", "Bản An", "Phúc Tinh Quý Nhân"],
                    "Mùi" => ["Thiên Sát", "Quán Tố", "Thái Âm"],
                ]
            ],
            (object) [
                "id" => "Tỵ",
                "data_shensha" => [
                    "Tý" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Dậu" => ["Tướng Tinh", "Tam Đài", "Địa Giải", "Ngũ Quỷ", "Thiết Tảo", "Kim Quỹ"],
                    "Mão" => ["Bát Tọa", "Tai Sát"],
                    "Tỵ" => ["Chỉ Bối", "Giải Thần", "Phù Trầm", "Phục Ngâm", "Thái Tuế"],
                    "Tuất" => ["Hồng Loan", "Tiểu Hao", "Nguyệt Đức Quý Nhân", "Tử Phù", "Bản An"],
                    "Ngọ" => ["Hàm Trì", "Đào Hoa", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Thìn" => ["Thiên Hỷ", "Quả Tú", "Thiên Sát"],
                    "Hợi" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Thiên Cương", "Dịch Mã"],
                    "Sửu" => ["Hoa Cái"],
                    "Thân" => ["Cô Thần", "Vong Thần", "Tuế Hình", "Quán Tố", "Thái Âm"],
                    "Dần" => ["Kiếp Sát", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Mùi" => ["Tang Môn"],
                ]
            ],
            (object) [
                "id" => "Ngọ",
                "data_shensha" => [
                    "Sửu" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Thiên Sát", "Long Đức Quý Nhân"],
                    "Ngọ" => ["Tướng Tinh", "Phục Ngâm", "Kim Quỹ", "Thái Tuế", "Tuế Hình"],
                    "Thìn" => ["Bát Tọa", "Giải Thần", "Phù Trầm", "Quả Tú"],
                    "Tuất" => ["Tam Đài", "Địa Giải", "Ngũ Quỷ", "Hoa Cái", "Thiên Cương"],
                    "Dần" => ["Chỉ Bối"],
                    "Dậu" => ["Hồng Loan", "Quán Tố", "Thái Âm"],
                    "Mão" => ["Hàm Trì", "Thiên Hỷ", "Đào Hoa", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Mùi" => ["Thiết Tảo", "Hối Khí", "Thiên Không", "Bản An", "Thái Dương"],
                    "Tý" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tai Sát"],
                    "Hợi" => ["Tiểu Hao", "Kiếp Sát", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Thân" => ["Cô Thần", "Tang Môn", "Dịch Mã"],
                    "Tỵ" => ["Vong Thần"],
                ]
            ],
            (object) [
                "id" => "Mùi",
                "data_shensha" => [
                    "Dần" => ["Tử Vi", "Thiên Hỷ", "Bạo Bại", "Vong Thần", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Mão" => ["Tướng Tinh", "Giải Thần", "Phù Trầm", "Kim Quỹ"],
                    "Tỵ" => ["Bát Tọa", "Dịch Mã"],
                    "Hợi" => ["Tam Đài", "Chỉ Bối", "Ngũ Quỷ"],
                    "Tuất" => ["Địa Giải", "Thiên Sát", "Quán Tố", "Thái Âm"],
                    "Mùi" => ["Phục Ngâm", "Hoa Cái", "Thái Tuế"],
                    "Thân" => ["Hồng Loan", "Thiết Tảo", "Cô Thần", "Kiếp Sát", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Tý" => ["Hàm Trì", "Tiểu Hao", "Đào Hoa", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Sửu" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tuế Hình"],
                    "Thìn" => ["Quả Tú", "Phúc Đức Quý Nhân", "Bản An", "Phúc Tinh Quý Nhân"],
                    "Dậu" => ["Thiên Cương", "Tai Sát", "Tang Môn"],
                ]
            ],
            (object) [
                "id" => "Thân",
                "data_shensha" => [
                    "Mão" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Tý" => ["Tướng Tinh", "Tam Đài", "Ngũ Quỷ", "Thiết Tảo", "Kim Quỹ"],
                    "Ngọ" => ["Bát Tọa", "Tai Sát"],
                    "Thân" => ["Chỉ Bối", "Phục Ngâm", "Thiên Cương", "Thái Tuế"],
                    "Hợi" => ["Địa Giải", "Cô Thần", "Vong Thần", "Quán Tố", "Thái Âm"],
                    "Dần" => ["Giải Thần", "Phù Trầm", "Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tuế Hình", "Dịch Mã"],
                    "Mùi" => ["Hồng Loan", "Quả Tú", "Thiên Sát"],
                    "Dậu" => ["Hàm Trì", "Đào Hoa", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Sửu" => ["Thiên Hỷ", "Tiểu Hao", "Nguyệt Đức Quý Nhân", "Tử Phù", "Bản An"],
                    "Thìn" => ["Hoa Cái"],
                    "Tỵ" => ["Kiếp Sát", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Tuất" => ["Tang Môn"],
                ]
            ],
            (object) [
                "id" => "Dậu",
                "data_shensha" => [
                    "Thìn" => ["Tử Vi", "Bạo Bại", "Thiên Ách", "Thiên Sát", "Long Đức Quý Nhân"],
                    "Dậu" => ["Tướng Tinh", "Phục Ngâm", "Thiết Tảo", "Kim Quỹ", "Thái Tuế", "Tuế Hình"],
                    "Mùi" => ["Bát Tọa", "Quả Tú", "Thiên Cương"],
                    "Sửu" => ["Tam Đài", "Giải Thần", "Ngũ Quỷ", "Phù Trầm", "Hoa Cái"],
                    "Tỵ" => ["Chỉ Bối"],
                    "Hợi" => ["Địa Giải", "Cô Thần", "Tang Môn", "Dịch Mã"],
                    "Ngọ" => ["Hồng Loan", "Hàm Trì", "Đào Hoa", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Tý" => ["Thiên Hỷ", "Quán Tố", "Thái Âm"],
                    "Mão" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Tai Sát"],
                    "Dần" => ["Tiểu Hao", "Kiếp Sát", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Tuất" => ["Hối Khí", "Thiên Không", "Bản An", "Thái Dương"],
                    "Thân" => ["Vong Thần"],
                ]
            ],
            (object) [
                "id" => "Tuất",
                "data_shensha" => [
                    "Tỵ" => ["Tử Vi", "Hồng Loan", "Bạo Bại", "Vong Thần", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Ngọ" => ["Tướng Tinh", "Địa Giải", "Kim Quỹ", "Thiên Cương"],
                    "Thân" => ["Bát Tọa", "Dịch Mã"],
                    "Dần" => ["Tam Đài", "Chỉ Bối", "Ngũ Quỷ"],
                    "Tý" => ["Giải Thần", "Phù Trầm", "Tai Sát", "Tang Môn"],
                    "Tuất" => ["Phục Ngâm", "Hoa Cái", "Thái Tuế"],
                    "Mão" => ["Hàm Trì", "Tiểu Hao", "Đào Hoa", "Nguyệt Đức Quý Nhân", "Tử Phù"],
                    "Hợi" => ["Thiên Hỷ", "Cô Thần", "Kiếp Sát", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Mùi" => ["Thiết Tảo", "Quả Tú", "Phúc Đức Quý Nhân", "Tuế Hình", "Bản An", "Phúc Tinh Quý Nhân"],
                    "Thìn" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá"],
                    "Sửu" => ["Thiên Sát", "Quán Tố", "Thái Âm"],
                ]
            ],
            (object) [
                "id" => "Hợi",
                "data_shensha" => [
                    "Ngọ" => ["Tử Vi", "Địa Giải", "Bạo Bại", "Thiên Ách", "Long Đức Quý Nhân"],
                    "Mão" => ["Tướng Tinh", "Tam Đài", "Ngũ Quỷ", "Kim Quỹ"],
                    "Dậu" => ["Bát Tọa", "Tai Sát"],
                    "Hợi" => ["Chỉ Bối", "Giải Thần", "Phù Trầm", "Phục Ngâm", "Thái Tuế", "Tuế Hình"],
                    "Thìn" => ["Hồng Loan", "Tiểu Hao", "Nguyệt Đức Quý Nhân", "Tử Phù", "Bản An"],
                    "Tý" => ["Hàm Trì", "Đào Hoa", "Hối Khí", "Thiên Không", "Thái Dương"],
                    "Tuất" => ["Thiên Hỷ", "Quả Tú", "Thiên Sát"],
                    "Thân" => ["Thiết Tảo", "Kiếp Sát", "Phúc Đức Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Tỵ" => ["Nguyệt Phá", "Phá Toái", "Tuế Phá", "Thiên Cương", "Dịch Mã"],
                    "Mùi" => ["Hoa Cái"],
                    "Dần" => ["Cô Thần", "Vong Thần", "Quán Tố", "Thái Âm"],
                    "Sửu" => ["Tang Môn"],
                ]
            ],
        ];
    }

    /**
     * @index 13
     * @desc EN: Get the formula of shensha by earthly year with heavenly stems
     * @desc VI: Lấy công thức thần sát theo năm với thiên can - Bổ trợ cho công thức 12
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyYearWithHeavenly()
    {
        return [
            (object) ["id" => "Tý", "data_shensha" => (object) ["Bính" => ["Nguyệt Không"]]],
            (object) ["id" => "Sửu", "data_shensha" => (object) ["Giáp" => ["Nguyệt Không"]]],
            (object) ["id" => "Dần", "data_shensha" => (object) ["Nhâm" => ["Nguyệt Không"]]],
            (object) ["id" => "Mão", "data_shensha" => (object) ["Canh" => ["Nguyệt Không"]]],
            (object) ["id" => "Thìn", "data_shensha" => (object) ["Bính" => ["Nguyệt Không"]]],
            (object) ["id" => "Tỵ", "data_shensha" => (object) ["Giáp" => ["Nguyệt Không"]]],
            (object) ["id" => "Ngọ", "data_shensha" => (object) ["Nhâm" => ["Nguyệt Không"]]],
            (object) ["id" => "Mùi", "data_shensha" => (object) ["Canh" => ["Nguyệt Không"]]],
            (object) ["id" => "Thân", "data_shensha" => (object) ["Bính" => ["Nguyệt Không"]]],
            (object) ["id" => "Dậu", "data_shensha" => (object) ["Giáp" => ["Nguyệt Không"]]],
            (object) ["id" => "Tuất", "data_shensha" => (object) ["Nhâm" => ["Nguyệt Không"]]],
            (object) ["id" => "Hợi", "data_shensha" => (object) ["Canh" => ["Nguyệt Không"]]],
        ];
    }

    /**
     * @index 14
     * @desc EN: Get the formula of shensha by earthly year with special conditions
     * @desc VI: Lấy công thức thần sát theo năm với điều kiện đặc biệt - Bổ trợ cho công thức 12
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyYearSpecial()
    {
        return [
            (object) ["id" => "Tý", "data_shensha" => (object) ["Giáp Tý" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Sửu", "data_shensha" => (object) ["Giáp Tý" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Dần", "data_shensha" => (object) ["Mậu Dần" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Mão", "data_shensha" => (object) ["Mậu Dần" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Thìn", "data_shensha" => (object) ["Mậu Dần" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Tỵ", "data_shensha" => (object) ["Giáp Ngọ" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Ngọ", "data_shensha" => (object) ["Giáp Ngọ" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Mùi", "data_shensha" => (object) ["Giáp Ngọ" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Thân", "data_shensha" => (object) ["Mậu Thân" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Dậu", "data_shensha" => (object) ["Mậu Thân" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Tuất", "data_shensha" => (object) ["Mậu Thân" => ["Thiên Thứ Quý Nhân"]]],
            (object) ["id" => "Hợi", "data_shensha" => (object) ["Giáp Tý" => ["Thiên Thứ Quý Nhân"]]],
        ];
    }

    // --------------------------------------------------------------------------------------//

    /**
     * @index 15
     * @desc EN: Get the formula of shensha by heavenly stems
     * @desc VI: Lấy công thức thần sát theo thiên can - Dựa trên các Chi tháng, ngày, giờ
     * @return object[]
     */
    public static function getFormulaShenshaByHeavenlyYear()
    {
        return [
            (object) [
                "id" => "Giáp",
                "data_shensha" => [
                    "Dần" => ["Can Lộc", "Đức Thần", "Phúc Tinh Quý Nhân"],
                    "Thìn" => ["Kim Dư"],
                    "Mão" => ["Lộc Thần", "Dương Nhẫn"],
                    "Sửu" => ["Ngọc Đường"],
                    "Mậu" => ["Thiên Tài"],
                    "Hợi" => ["Học Đường"],
                    "Tỵ" => ["Văn Xương Quý Nhân"],
                    "Tý" => ["Phúc Tinh Quý Nhân", "Thái Cực Quý Nhân"],
                    "Tuất" => ["Quốc Ấn Quý Nhân"],
                    "Ngọ" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Ất",
                "data_shensha" => [
                    "Mão" => ["Can Lộc", "Phúc Tinh Quý Nhân"],
                    "Tỵ" => ["Kim Dư"],
                    "Dần" => ["Lộc Thần", "Dương Nhẫn"],
                    "Tý" => ["Ngọc Đường", "Thái Cực Quý Nhân"],
                    "Kỷ" => ["Thiên Tài"],
                    "Thân" => ["Đức Thần"],
                    "Ngọ" => ["Học Đường", "Văn Xương Quý Nhân", "Thái Cực Quý Nhân"],
                    "Sửu" => ["Phúc Tinh Quý Nhân"],
                    "Hợi" => ["Quốc Ấn Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Bính",
                "data_shensha" => [
                    "Tỵ" => ["Can Lộc", "Lộc Thần", "Đức Thần"],
                    "Mùi" => ["Kim Dư"],
                    "Hợi" => ["Ngọc Đường"],
                    "Canh" => ["Thiên Tài"],
                    "Ngọ" => ["Dương Nhẫn"],
                    "Dần" => ["Học Đường", "Phúc Tinh Quý Nhân"],
                    "Thân" => ["Văn Xương Quý Nhân"],
                    "Tý" => ["Phúc Tinh Quý Nhân"],
                    "Sửu" => ["Quốc Ấn Quý Nhân"],
                    "Dậu" => ["Thái Cực Quý Nhân"],
                    "Mão" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Đinh",
                "data_shensha" => [
                    "Ngọ" => ["Can Lộc", "Lộc Thần"],
                    "Thân" => ["Kim Dư"],
                    "Dậu" => ["Ngọc Đường", "Học Đường", "Văn Xương Quý Nhân", "Thái Cực Quý Nhân"],
                    "Tân" => ["Thiên Tài"],
                    "Hợi" => ["Đức Thần", "Phúc Tinh Quý Nhân"],
                    "Tỵ" => ["Dương Nhẫn"],
                    "Dần" => ["Quốc Ấn Quý Nhân"],
                    "Mão" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Mậu",
                "data_shensha" => [
                    "Tỵ" => ["Can Lộc", "Lộc Thần", "Đức Thần"],
                    "Mùi" => ["Kim Dư", "Ngọc Đường", "Thái Cực Quý Nhân"],
                    "Nhâm" => ["Thiên Tài"],
                    "Ngọ" => ["Dương Nhẫn"],
                    "Dần" => ["Học Đường"],
                    "Thân" => ["Văn Xương Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Sửu" => ["Quốc Ấn Quý Nhân", "Thái Cực Quý Nhân"],
                    "Thìn" => ["Thái Cực Quý Nhân"],
                    "Tuất" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Kỷ",
                "data_shensha" => [
                    "Ngọ" => ["Can Lộc", "Lộc Thần"],
                    "Thân" => ["Kim Dư", "Ngọc Đường"],
                    "Quý" => ["Thiên Tài"],
                    "Dần" => ["Đức Thần", "Quốc Ấn Quý Nhân"],
                    "Tỵ" => ["Dương Nhẫn"],
                    "Dậu" => ["Học Đường", "Văn Xương Quý Nhân"],
                    "Mùi" => ["Phúc Tinh Quý Nhân", "Thái Cực Quý Nhân"],
                    "Thìn" => ["Thái Cực Quý Nhân"],
                    "Tuất" => ["Thái Cực Quý Nhân"],
                    "Sửu" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Canh",
                "data_shensha" => [
                    "Thân" => ["Can Lộc", "Lộc Thần", "Đức Thần"],
                    "Tuất" => ["Kim Dư"],
                    "Mùi" => ["Ngọc Đường"],
                    "Giáp" => ["Thiên Tài"],
                    "Dậu" => ["Dương Nhẫn"],
                    "Tỵ" => ["Học Đường"],
                    "Hợi" => ["Văn Xương Quý Nhân", "Thái Cực Quý Nhân"],
                    "Ngọ" => ["Phúc Tinh Quý Nhân"],
                    "Thìn" => ["Quốc Ấn Quý Nhân"],
                    "Dần" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Tân",
                "data_shensha" => [
                    "Dậu" => ["Can Lộc", "Lộc Thần"],
                    "Hợi" => ["Kim Dư", "Thái Cực Quý Nhân"],
                    "Ngọ" => ["Ngọc Đường"],
                    "Ất" => ["Thiên Tài"],
                    "Tỵ" => ["Đức Thần", "Phúc Tinh Quý Nhân", "Quốc Ấn Quý Nhân"],
                    "Thân" => ["Dương Nhẫn"],
                    "Tý" => ["Học Đường", "Văn Xương Quý Nhân"],
                    "Dần" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Nhâm",
                "data_shensha" => [
                    "Hợi" => ["Can Lộc", "Lộc Thần", "Đức Thần"],
                    "Sửu" => ["Kim Dư"],
                    "Tỵ" => ["Ngọc Đường", "Thái Cực Quý Nhân"],
                    "Bính" => ["Thiên Tài"],
                    "Tý" => ["Dương Nhẫn"],
                    "Thân" => ["Học Đường", "Thái Cực Quý Nhân"],
                    "Dần" => ["Văn Xương Quý Nhân"],
                    "Thìn" => ["Phúc Tinh Quý Nhân"],
                    "Mùi" => ["Quốc Ấn Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Quý",
                "data_shensha" => [
                    "Tý" => ["Can Lộc", "Lộc Thần"],
                    "Dần" => ["Kim Dư"],
                    "Mão" => ["Ngọc Đường", "Học Đường", "Văn Xương Quý Nhân", "Phúc Tinh Quý Nhân"],
                    "Đinh" => ["Thiên Tài"],
                    "Tỵ" => ["Đức Thần", "Thái Cực Quý Nhân"],
                    "Hợi" => ["Dương Nhẫn"],
                    "Sửu" => ["Phúc Tinh Quý Nhân"],
                    "Thân" => ["Quốc Ấn Quý Nhân", "Thái Cực Quý Nhân"],
                ]
            ],
        ];
    }

    // --------------------------------------------------------------------------------------//
    
    /**
     * @index 16
     * @desc EN: Get the formula of shensha by earthly month
     * @desc VI: Lấy công thức thần sát theo địa chi tháng
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyMonth()
    {
        return [
            (object) ["id" => "Tý", "data_shensha" => (object) ["Dần" => ["Dịch Mã"]]],
            (object) ["id" => "Sửu", "data_shensha" => (object) ["Hợi" => ["Dịch Mã"]]],
            (object) ["id" => "Dần", "data_shensha" => (object) ["Thân" => ["Dịch Mã"]]],
            (object) ["id" => "Mão", "data_shensha" => (object) ["Tỵ" => ["Dịch Mã"]]],
            (object) ["id" => "Thìn", "data_shensha" => (object) ["Dần" => ["Dịch Mã"]]],
            (object) ["id" => "Tỵ", "data_shensha" => (object) ["Hợi" => ["Dịch Mã"]]],
            (object) ["id" => "Ngọ", "data_shensha" => (object) ["Thân" => ["Dịch Mã"]]],
            (object) ["id" => "Mùi", "data_shensha" => (object) ["Tỵ" => ["Dịch Mã"]]],
            (object) ["id" => "Thân", "data_shensha" => (object) ["Dần" => ["Dịch Mã"]]],
            (object) ["id" => "Dậu", "data_shensha" => (object) ["Hợi" => ["Dịch Mã"]]],
            (object) ["id" => "Tuất", "data_shensha" => (object) ["Thân" => ["Dịch Mã"]]],
            (object) ["id" => "Hợi", "data_shensha" => (object) ["Tỵ" => ["Dịch Mã"]]],
        ];
    }

    /**
     * @index 17
     * @desc EN: Get the formula of shensha by earthly month with heavenly stems
     * @desc VI: Lấy công thức thần sát theo địa chi tháng ứng với thiên can - Bổ trợ cho công thức 16
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyMonthWithHeavenly()
    {
        return [
            (object) [
                "id" => "Tý",
                "data_shensha" => [
                    "Bính" => ["Nguyệt Không"],
                    "Nhâm" => ["Nguyệt Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Sửu",
                "data_shensha" => [
                    "Giáp" => ["Nguyệt Không"],
                    "Canh" => ["Nguyệt Đức Quý Nhân", "Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Dần",
                "data_shensha" => [
                    "Nhâm" => ["Nguyệt Không"],
                    "Bính" => ["Nguyệt Đức Quý Nhân"],
                    "Đinh" => ["Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Mão",
                "data_shensha" => [
                    "Canh" => ["Nguyệt Không"],
                    "Giáp" => ["Nguyệt Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Thìn",
                "data_shensha" => [
                    "Bính" => ["Nguyệt Không"],
                    "Nhâm" => ["Nguyệt Đức Quý Nhân", "Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Tỵ",
                "data_shensha" => [
                    "Giáp" => ["Nguyệt Không"],
                    "Canh" => ["Nguyệt Đức Quý Nhân"],
                    "Tân" => ["Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Ngọ",
                "data_shensha" => [
                    "Nhâm" => ["Nguyệt Không"],
                    "Bính" => ["Nguyệt Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Mùi",
                "data_shensha" => [
                    "Canh" => ["Nguyệt Không"],
                    "Giáp" => ["Nguyệt Đức Quý Nhân", "Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Thân",
                "data_shensha" => [
                    "Bính" => ["Nguyệt Không"],
                    "Nhâm" => ["Nguyệt Đức Quý Nhân"],
                    "Quý" => ["Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Dậu",
                "data_shensha" => [
                    "Giáp" => ["Nguyệt Không"],
                    "Canh" => ["Nguyệt Đức Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Tuất",
                "data_shensha" => [
                    "Nhâm" => ["Nguyệt Không"],
                    "Bính" => ["Nguyệt Đức Quý Nhân", "Thiên Đức Quý Nhân"]
                ]
            ],
            (object) [
                "id" => "Hợi",
                "data_shensha" => [
                    "Canh" => ["Nguyệt Không"],
                    "Giáp" => ["Nguyệt Đức Quý Nhân"],
                    "Ất" => ["Thiên Đức Quý Nhân"]
                ]
            ],
        ];
    }
    
    // --------------------------------------------------------------------------------------//
    
    /**
     * @index 18
     * @desc EN: Get the formula of shensha by earthly day
     * @desc VI: Lấy công thức thần sát theo địa chi ngày
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyDay()
    {
        return [
            (object) [
                "id" => "Tý",
                "data_shensha" => [
                    "Dần" => [
                        "Cô Thần",
                        "Tang Môn",
                        "Dịch Mã"
                    ],
                    "Tuất" => [
                        "Quả Tú"
                    ],
                    "Dậu" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tỵ" => [
                        "Kiếp Sát"
                    ],
                    "Thìn" => [
                        "Hoa Cái",
                        "Ngũ Quỷ"
                    ],
                    "Ngọ" => [
                        "Nguyệt Đức"
                    ],
                    "Hợi" => [
                        "Vong Thần"
                    ],
                    "Tý" => [
                        "Tướng Tinh"
                    ]
                ]
            ],
            (object) [
                "id" => "Sửu",
                "data_shensha" => [
                    "Dần" => [
                        "Cô Thần",
                        "Kiếp Sát"
                    ],
                    "Tuất" => [
                        "Quả Tú"
                    ],
                    "Ngọ" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Sửu" => [
                        "Hoa Cái"
                    ],
                    "Mùi" => [
                        "Nguyệt Phá"
                    ],
                    "Thân" => [
                        "Vong Thần"
                    ],
                    "Mão" => [
                        "Tang Môn"
                    ],
                    "Hợi" => [
                        "Dịch Mã"
                    ],
                    "Dậu" => [
                        "Tướng Tinh"
                    ],
                    "Tỵ" => [
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Dần",
                "data_shensha" => [
                    "Tỵ" => [
                        "Cô Thần",
                        "Vong Thần"
                    ],
                    "Sửu" => [
                        "Quả Tú"
                    ],
                    "Mão" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Hợi" => [
                        "Kiếp Sát"
                    ],
                    "Tuất" => [
                        "Hoa Cái"
                    ],
                    "Thân" => [
                        "Nguyệt Phá",
                        "Dịch Mã"
                    ],
                    "Thìn" => [
                        "Tang Môn"
                    ],
                    "Ngọ" => [
                        "Tướng Tinh",
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Mão",
                "data_shensha" => [
                    "Tỵ" => [
                        "Cô Thần",
                        "Tang Môn",
                        "Dịch Mã"
                    ],
                    "Sửu" => [
                        "Quả Tú"
                    ],
                    "Tý" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Thân" => [
                        "Kiếp Sát"
                    ],
                    "Mùi" => [
                        "Hoa Cái",
                        "Ngũ Quỷ"
                    ],
                    "Dậu" => [
                        "Nguyệt Phá"
                    ],
                    "Dần" => [
                        "Vong Thần"
                    ],
                    "Mão" => [
                        "Tướng Tinh"
                    ]
                ]
            ],
            (object) [
                "id" => "Thìn",
                "data_shensha" => [
                    "Tỵ" => [
                        "Cô Thần",
                        "Kiếp Sát"
                    ],
                    "Sửu" => [
                        "Quả Tú"
                    ],
                    "Dậu" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Thìn" => [
                        "Hoa Cái"
                    ],
                    "Tuất" => [
                        "Nguyệt Phá"
                    ],
                    "Hợi" => [
                        "Vong Thần"
                    ],
                    "Ngọ" => [
                        "Tang Môn"
                    ],
                    "Dần" => [
                        "Dịch Mã"
                    ],
                    "Tý" => [
                        "Tướng Tinh"
                    ],
                    "Thân" => [
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Tỵ",
                "data_shensha" => [
                    "Thân" => [
                        "Cô Thần",
                        "Vong Thần"
                    ],
                    "Thìn" => [
                        "Quả Tú"
                    ],
                    "Ngọ" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Dần" => [
                        "Kiếp Sát"
                    ],
                    "Sửu" => [
                        "Hoa Cái"
                    ],
                    "Hợi" => [
                        "Nguyệt Phá",
                        "Dịch Mã"
                    ],
                    "Mùi" => [
                        "Tang Môn"
                    ],
                    "Dậu" => [
                        "Tướng Tinh",
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Ngọ",
                "data_shensha" => [
                    "Thân" => [
                        "Cô Thần",
                        "Tang Môn",
                        "Dịch Mã"
                    ],
                    "Thìn" => [
                        "Quả Tú"
                    ],
                    "Mão" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Hợi" => [
                        "Kiếp Sát"
                    ],
                    "Tuất" => [
                        "Hoa Cái",
                        "Ngũ Quỷ"
                    ],
                    "Tý" => [
                        "Nguyệt Phá"
                    ],
                    "Tỵ" => [
                        "Vong Thần"
                    ],
                    "Ngọ" => [
                        "Tướng Tinh"
                    ]
                ]
            ],
            (object) [
                "id" => "Mùi",
                "data_shensha" => [
                    "Thân" => [
                        "Cô Thần",
                        "Kiếp Sát"
                    ],
                    "Thìn" => [
                        "Quả Tú"
                    ],
                    "Tý" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Mùi" => [
                        "Hoa Cái"
                    ],
                    "Sửu" => [
                        "Nguyệt Phá"
                    ],
                    "Dần" => [
                        "Vong Thần"
                    ],
                    "Dậu" => [
                        "Tang Môn"
                    ],
                    "Tỵ" => [
                        "Dịch Mã"
                    ],
                    "Mão" => [
                        "Tướng Tinh"
                    ],
                    "Hợi" => [
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Thân",
                "data_shensha" => [
                    "Hợi" => [
                        "Cô Thần",
                        "Vong Thần"
                    ],
                    "Mùi" => [
                        "Quả Tú"
                    ],
                    "Dậu" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tỵ" => [
                        "Kiếp Sát"
                    ],
                    "Thìn" => [
                        "Hoa Cái"
                    ],
                    "Dần" => [
                        "Nguyệt Phá",
                        "Dịch Mã"
                    ],
                    "Tuất" => [
                        "Tang Môn"
                    ],
                    "Tý" => [
                        "Tướng Tinh",
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Dậu",
                "data_shensha" => [
                    "Hợi" => [
                        "Cô Thần",
                        "Tang Môn",
                        "Dịch Mã"
                    ],
                    "Mùi" => [
                        "Quả Tú"
                    ],
                    "Ngọ" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Dần" => [
                        "Kiếp Sát"
                    ],
                    "Sửu" => [
                        "Hoa Cái",
                        "Ngũ Quỷ"
                    ],
                    "Mão" => [
                        "Nguyệt Phá"
                    ],
                    "Thân" => [
                        "Vong Thần"
                    ],
                    "Dậu" => [
                        "Tướng Tinh"
                    ]
                ]
            ],
            (object) [
                "id" => "Tuất",
                "data_shensha" => [
                    "Hợi" => [
                        "Cô Thần",
                        "Kiếp Sát"
                    ],
                    "Mùi" => [
                        "Quả Tú"
                    ],
                    "Mão" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tuất" => [
                        "Hoa Cái"
                    ],
                    "Thìn" => [
                        "Nguyệt Phá"
                    ],
                    "Tỵ" => [
                        "Vong Thần"
                    ],
                    "Tý" => [
                        "Tang Môn"
                    ],
                    "Thân" => [
                        "Dịch Mã"
                    ],
                    "Ngọ" => [
                        "Tướng Tinh"
                    ],
                    "Dần" => [
                        "Ngũ Quỷ"
                    ]
                ]
            ],
            (object) [
                "id" => "Hợi",
                "data_shensha" => [
                    "Dần" => [
                        "Cô Thần",
                        "Vong Thần"
                    ],
                    "Tuất" => [
                        "Quả Tú"
                    ],
                    "Tý" => [
                        "Đào Hoa",
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Thân" => [
                        "Kiếp Sát"
                    ],
                    "Mùi" => [
                        "Hoa Cái"
                    ],
                    "Tỵ" => [
                        "Nguyệt Phá",
                        "Dịch Mã"
                    ],
                    "Sửu" => [
                        "Tang Môn"
                    ],
                    "Mão" => [
                        "Tướng Tinh",
                        "Ngũ Quỷ"
                    ],
                ]
            ],
        ];
    }
    
    // --------------------------------------------------------------------------------------//
    
    /**
     * @index 19
     * @desc EN: Get the formula of shensha by heavenly day
     * @desc VI: Lấy công thức thần sát theo thiên ngày
     * @return object[]
     */
    public static function getFormulaShenshaByHeavenlyDay()
    {
        return [
            (object) [
                "id" => "Giáp",
                "data_shensha" => [
                    "Thìn" => ["Kim Dư", "Quý Thực"],
                    "Mão" => ["Lộc Thần"],
                    "Bính" => ["Quý Thực", "nan"],
                    "Dần" => ["nan"],
                    "Mậu" => ["Thiên Tài"],
                    "Tỵ" => ["Văn Xương Quý Nhân"],
                    "Giáp" => ["Lục Hợp Quý Nhân", "nan"],
                    "Tí" => ["Lục Hợp Quý Nhân", "Thái Cực Quý Nhân"],
                    "Ngọ" => ["nan", "nan"],
                    "Tuất" => ["Quốc Ấn Quý Nhân"],
                    "Kỷ" => ["Quý Hợp Quý Nhân", "nan"],
                    "Sửu" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Mùi" => ["nan", "Thiên Ất Quý Nhân (Âm)"],
                ]
            ],
            (object) [
                "id" => "Ất",
                "data_shensha" => [
                    "Tỵ" => ["Kim Dư", "Lục Hợp Quý Nhân"],
                    "Dần" => ["Lộc Thần"],
                    "Đinh" => ["Quý Thực", "nan"],
                    "Hợi" => ["Quý Thực", "Quốc Ấn Quý Nhân"],
                    "Dậu" => ["nan"],
                    "Kỷ" => ["Thiên Tài"],
                    "Ngọ" => ["Văn Xương Quý Nhân", "nan"],
                    "Tân" => ["Lục Hợp Quý Nhân", "nan"],
                    "Sửu" => ["nan"],
                    "Canh" => ["Quý Hợp Quý Nhân", "nan"],
                    "Tí" => ["Quý Hợp Quý Nhân", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                    "Thân" => ["nan", "Thiên Ất Quý Nhân (Dương)"],
                ]
            ],
            (object) [
                "id" => "Bính",
                "data_shensha" => [
                    "Mùi" => ["Kim Dư"],
                    "Tỵ" => ["Lộc Thần"],
                    "Mậu" => ["Quý Thực", "nan"],
                    "Tí" => ["Quý Thực"],
                    "Ngọ" => ["nan"],
                    "Canh" => ["Thiên Tài"],
                    "Thân" => ["Văn Xương Quý Nhân"],
                    "Bính" => ["Lục Hợp Quý Nhân", "nan"],
                    "Dần" => ["Lục Hợp Quý Nhân"],
                    "Thìn" => ["nan"],
                    "Sửu" => ["Quốc Ấn Quý Nhân"],
                    "Tân" => ["Quý Hợp Quý Nhân", "nan"],
                    "Hợi" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                    "Dậu" => ["nan", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Mão" => ["nan"],
                ]
            ],
            (object) [
                "id" => "Đinh",
                "data_shensha" => [
                    "Thân" => ["Kim Dư"],
                    "Ngọ" => ["Lộc Thần"],
                    "Kỷ" => ["Quý Thực", "nan"],
                    "Tỵ" => ["Quý Thực"],
                    "Sửu" => ["nan"],
                    "Tân" => ["Thiên Tài"],
                    "Dậu" => ["Văn Xương Quý Nhân", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                    "Dần" => ["Quốc Ấn Quý Nhân"],
                    "Mão" => ["nan"],
                    "Hợi" => ["Thiên Ất Quý Nhân (Dương)"],
                ]
            ],
            (object) [
                "id" => "Mậu",
                "data_shensha" => [
                    "Mùi" => ["Kim Dư", "nan", "Thiên Ất Quý Nhân (Âm)"],
                    "Tỵ" => ["Lộc Thần"],
                    "Canh" => ["Quý Thực", "nan"],
                    "Tí" => ["Quý Thực", "Lục Hợp Quý Nhân"],
                    "Ngọ" => ["nan", "nan"],
                    "Nhâm" => ["Thiên Tài"],
                    "Thân" => ["Văn Xương Quý Nhân"],
                    "Mậu" => ["Lục Hợp Quý Nhân", "nan"],
                    "Sửu" => ["Quốc Ấn Quý Nhân", "Quý Hợp Quý Nhân", "nan"],
                    "Quý" => ["Quý Hợp Quý Nhân", "nan"],
                    "Thìn" => ["Thái Cực Quý Nhân"],
                    "Tuất" => ["nan"],
                    "Sử" => ["Thiên Ất Quý Nhân (Dương)"],
                ]
            ],
            (object) [
                "id" => "Kỷ",
                "data_shensha" => [
                    "Thân" => ["Kim Dư", "nan", "Thiên Ất Quý Nhân (Âm)"],
                    "Ngọ" => ["Lộc Thần"],
                    "Tân" => ["Quý Thực", "nan"],
                    "Hợi" => ["Quý Thực"],
                    "Mùi" => ["nan"],
                    "Quý" => ["Thiên Tài"],
                    "Dậu" => ["Văn Xương Quý Nhân"],
                    "Kỷ" => ["Lục Hợp Quý Nhân", "nan"],
                    "Sửu" => ["Lục Hợp Quý Nhân", "nan"],
                    "Tỵ" => ["nan"],
                    "Dần" => ["Quốc Ấn Quý Nhân"],
                    "Giáp" => ["Quý Hợp Quý Nhân", "nan"],
                    "Tí" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Thìn" => ["Thái Cực Quý Nhân"],
                    "Tuất" => ["nan"],
                ]
            ],
            (object) [
                "id" => "Canh",
                "data_shensha" => [
                    "Tuất" => ["Kim Dư", "Quý Thực"],
                    "Thân" => ["Lộc Thần", "nan"],
                    "Nhâm" => ["Quý Thực", "nan"],
                    "Giáp" => ["Thiên Tài"],
                    "Hợi" => ["Văn Xương Quý Nhân", "nan"],
                    "Canh" => ["Lục Hợp Quý Nhân", "nan"],
                    "Tí" => ["Lục Hợp Quý Nhân"],
                    "Ngọ" => ["nan"],
                    "Thìn" => ["Quốc Ấn Quý Nhân"],
                    "Ất" => ["Quý Hợp Quý Nhân", "nan"],
                    "Sửu" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Mùi" => ["nan", "Thiên Ất Quý Nhân (Âm)"],
                    "Dần" => ["Thái Cực Quý Nhân"],
                ]
            ],
            (object) [
                "id" => "Tân",
                "data_shensha" => [
                    "Hợi" => ["Kim Dư", "Lục Hợp Quý Nhân", "nan"],
                    "Dậu" => ["Lộc Thần"],
                    "Quý" => ["Quý Thực", "nan"],
                    "Tỵ" => ["Quý Thực", "Quốc Ấn Quý Nhân"],
                    "Mão" => ["nan"],
                    "Ất" => ["Thiên Tài"],
                    "Tí" => ["Văn Xương Quý Nhân"],
                    "Tân" => ["Lục Hợp Quý Nhân", "nan"],
                    "Mùi" => ["nan"],
                    "Bính" => ["Quý Hợp Quý Nhân", "nan"],
                    "Ngọ" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                    "Dần" => ["nan", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                ]
            ],
            (object) [
                "id" => "Nhâm",
                "data_shensha" => [
                    "Sửu" => ["Kim Dư"],
                    "Hợi" => ["Lộc Thần"],
                    "Giáp" => ["Quý Thực", "nan"],
                    "Tí" => ["Quý Thực"],
                    "Ngọ" => ["nan"],
                    "Bính" => ["Thiên Tài"],
                    "Dần" => ["Văn Xương Quý Nhân"],
                    "Nhâm" => ["Lục Hợp Quý Nhân", "nan"],
                    "Thân" => ["Lục Hợp Quý Nhân", "nan"],
                    "Tuất" => ["nan"],
                    "Mùi" => ["Quốc Ấn Quý Nhân"],
                    "Đinh" => ["Quý Hợp Quý Nhân", "nan"],
                    "Mão" => ["Quý Hợp Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Tỵ" => ["nan", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                ]
            ],
            (object) [
                "id" => "Quý",
                "data_shensha" => [
                    "Dần" => ["Kim Dư"],
                    "Tí" => ["Lộc Thần"],
                    "Ất" => ["Quý Thực", "nan"],
                    "Sửu" => ["Quý Thực"],
                    "Tỵ" => ["nan", "Thái Cực Quý Nhân", "Thiên Ất Quý Nhân (Dương)"],
                    "Đinh" => ["Thiên Tài"],
                    "Mão" => ["Văn Xương Quý Nhân", "Thiên Ất Quý Nhân (Âm)"],
                    "Thân" => ["Quốc Ấn Quý Nhân", "nan"],
                ]
            ],
        ];
    }

    /**
     * @index 20
     * @desc EN: Get the formula of shensha by heavenly day by combo
     * @desc VI: Lấy công thức thần sát theo thiên can ngày theo tổ hợp can chi - Bổ trợ cho công thức 19
     * @return object[]
     */
    public static function getFormulaShenshaByHeavenlyDayByCombo()
    {
        return [
            (object) [
                "id" => "Giáp",
                "data_shensha" => [
                    "Kỷ Sửu" => ["Quý Hợp Quý Nhân"],
                    "Kỷ Mùi" => ["Quý Hợp Quý Nhân"],
                    "Giáp Tý" => ["Lục Hợp Quý Nhân"],
                    "Giáp Ngọ" => ["Lục Hợp Quý Nhân"],
                    "Bính Thìn" => ["Quý Thực"],
                    "Bính Dần" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Ất",
                "data_shensha" => [
                    "Canh Tý" => ["Quý Hợp Quý Nhân"],
                    "Canh Thân" => ["Quý Hợp Quý Nhân"],
                    "Tân Tỵ" => ["Lục Hợp Quý Nhân"],
                    "Tân Sửu" => ["Lục Hợp Quý Nhân"],
                    "Đinh Hợi" => ["Quý Thực"],
                    "Đinh Dậu" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Bính",
                "data_shensha" => [
                    "Tân Hợi" => ["Quý Hợp Quý Nhân"],
                    "Tân Dậu" => ["Quý Hợp Quý Nhân"],
                    "Bính Dần" => ["Lục Hợp Quý Nhân"],
                    "Bính Thìn" => ["Lục Hợp Quý Nhân"],
                    "Mậu Tý" => ["Quý Thực"],
                    "Mậu Ngọ" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Đinh",
                "data_shensha" => [
                    "Kỷ Tỵ" => ["Quý Thực"],
                    "Kỷ Sửu" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Mậu",
                "data_shensha" => [
                    "Quý Sửu" => ["Quý Hợp Quý Nhân"],
                    "Quý Mùi" => ["Quý Hợp Quý Nhân"],
                    "Mậu Tý" => ["Lục Hợp Quý Nhân"],
                    "Mậu Ngọ" => ["Lục Hợp Quý Nhân"],
                    "Canh Tý" => ["Quý Thực"],
                    "Canh Ngọ" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Kỷ",
                "data_shensha" => [
                    "Giáp Tý" => ["Quý Hợp Quý Nhân"],
                    "Giáp Thân" => ["Quý Hợp Quý Nhân"],
                    "Kỷ Sửu" => ["Lục Hợp Quý Nhân"],
                    "Kỷ Tỵ" => ["Lục Hợp Quý Nhân"],
                    "Tân Hợi" => ["Quý Thực"],
                    "Tân Mùi" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Canh",
                "data_shensha" => [
                    "Ất Sửu" => ["Quý Hợp Quý Nhân"],
                    "Ất Mùi" => ["Quý Hợp Quý Nhân"],
                    "Canh Tý" => ["Lục Hợp Quý Nhân"],
                    "Canh Ngọ" => ["Lục Hợp Quý Nhân"],
                    "Nhâm Tuất" => ["Quý Thực"],
                    "Nhâm Thân" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Tân",
                "data_shensha" => [
                    "Bính Ngọ" => ["Quý Hợp Quý Nhân"],
                    "Bính Dần" => ["Quý Hợp Quý Nhân"],
                    "Tân Hợi" => ["Lục Hợp Quý Nhân"],
                    "Tân Mùi" => ["Lục Hợp Quý Nhân"],
                    "Quý Tỵ" => ["Quý Thực"],
                    "Quý Mão" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Nhâm",
                "data_shensha" => [
                    "Đinh Mão" => ["Quý Hợp Quý Nhân"],
                    "Đinh Tỵ" => ["Quý Hợp Quý Nhân"],
                    "Nhâm Thân" => ["Lục Hợp Quý Nhân"],
                    "Nhâm Tuất" => ["Lục Hợp Quý Nhân"],
                    "Giáp Tý" => ["Quý Thực"],
                    "Giáp Ngọ" => ["Quý Thực"],
                ]
            ],
            (object) [
                "id" => "Quý",
                "data_shensha" => [
                    "Ất Sửu" => ["Quý Thực"],
                    "Ất Tỵ" => ["Quý Thực"],
                ]
            ],
        ];
    }
    
    // --------------------------------------------------------------------------------------//
    
    /**
     * @index 21
     * @desc EN: Get the formula of shensha by earthly hour
     * @desc VI: Lấy công thức thần sát theo địa chi giờ
     * @return object[]
     */
    public static function getFormulaShenshaByEarthlyHour()
    {
        return [
            (object) [
                "id" => "Tý",
                "data_shensha" => [
                    "Dậu" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Ngọ" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Sửu",
                "data_shensha" => [
                    "Ngọ" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Mùi" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Dần",
                "data_shensha" => [
                    "Mão" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Thân" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Mão",
                "data_shensha" => [
                    "Tý" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Dậu" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Thìn",
                "data_shensha" => [
                    "Dậu" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tuất" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Tỵ",
                "data_shensha" => [
                    "Ngọ" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Hợi" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Ngọ",
                "data_shensha" => [
                    "Mão" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tý" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Mùi",
                "data_shensha" => [
                    "Tý" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Sửu" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Thân",
                "data_shensha" => [
                    "Dậu" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Dần" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Dậu",
                "data_shensha" => [
                    "Ngọ" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Mão" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Tuất",
                "data_shensha" => [
                    "Mão" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Thìn" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
            (object) [
                "id" => "Hợi",
                "data_shensha" => [
                    "Tý" => [
                        "Ngọc Môn",
                        "Ngũ Phú"
                    ],
                    "Tỵ" => [
                        "Nguyệt Phá"
                    ]
                ]
            ],
        ];
    }

    // --------------------------------------------------------------------------------------//

    /**
     * @index 22
     * @desc EN: Get the formula of calculate data point heavenly stems (Special formula 12)
     * @desc VI: Lấy công thức điểm dữ liệu thiên can tính toán (Công thức đặc biệt 12)
     * @return object[]
     */
    public static function getFormulaCalculateDataPointHeavenlyStems()
    {
        return [
            (object) ["id" => 1, "name" => "Giáp", "element" => "Mộc", "yin_yang" => "Dương", "point" => 1],
            (object) ["id" => 2, "name" => "Ất", "element" => "Mộc", "yin_yang" => "Âm", "point" => 1],
            (object) ["id" => 3, "name" => "Bính", "element" => "Hỏa", "yin_yang" => "Dương", "point" => 2],
            (object) ["id" => 4, "name" => "Đinh", "element" => "Hỏa", "yin_yang" => "Âm", "point" => 2],
            (object) ["id" => 5, "name" => "Mậu", "element" => "Thổ", "yin_yang" => "Dương", "point" => 3],
            (object) ["id" => 6, "name" => "Kỷ", "element" => "Thổ", "yin_yang" => "Âm", "point" => 3],
            (object) ["id" => 7, "name" => "Canh", "element" => "Kim", "yin_yang" => "Dương", "point" => 4],
            (object) ["id" => 8, "name" => "Tân", "element" => "Kim", "yin_yang" => "Âm", "point" => 4],
            (object) ["id" => 9, "name" => "Nhâm", "element" => "Thủy", "yin_yang" => "Dương", "point" => 5],
            (object) ["id" => 10, "name" => "Quý", "element" => "Thủy", "yin_yang" => "Âm", "point" => 5]
        ];
    }

    /**
     * @index 23
     * @desc EN: Get the formula of calculate data point earthly branches (Special formula 13)
     * @desc VI: Lấy công thức điểm dữ liệu địa chi tính toán (Công thức đặc biệt 13)
     * @return object[]
     */
    public static function getFormulaCalculateDataPointEarthlyBranches()
    {
        return [
            (object) ["id" => 1, "name" => "Thân", "element" => "Kim", "yin_yang" => "Dương", "point" => 4],
            (object) ["id" => 2, "name" => "Dậu", "element" => "Kim", "yin_yang" => "Âm", "point" => 4],
            (object) ["id" => 3, "name" => "Tuất", "element" => "Thổ", "yin_yang" => "Dương", "point" => 5],
            (object) ["id" => 4, "name" => "Hợi", "element" => "Thủy", "yin_yang" => "Âm", "point" => 5],
            (object) ["id" => 5, "name" => "Tý", "element" => "Thủy", "yin_yang" => "Dương", "point" => 0],
            (object) ["id" => 6, "name" => "Sửu", "element" => "Thổ", "yin_yang" => "Âm", "point" => 0],
            (object) ["id" => 7, "name" => "Dần", "element" => "Mộc", "yin_yang" => "Dương", "point" => 1],
            (object) ["id" => 8, "name" => "Mão", "element" => "Mộc", "yin_yang" => "Âm", "point" => 1],
            (object) ["id" => 9, "name" => "Thìn", "element" => "Thổ", "yin_yang" => "Dương", "point" => 2],
            (object) ["id" => 10, "name" => "Tỵ", "element" => "Hỏa", "yin_yang" => "Âm", "point" => 2],
            (object) ["id" => 10, "name" => "Ngọ", "element" => "Hỏa", "yin_yang" => "Dương", "point" => 3],
            (object) ["id" => 10, "name" => "Mùi", "element" => "Thổ", "yin_yang" => "Âm", "point" => 3]
        ];
    }

    public static function getFormulaAgricuturalDate()
    {
        return [
            (object) ["start" => "04-02", "end" => "04-03", "month" => 1],
            (object) ["start" => "05-03", "end" => "04-04", "month" => 2],
            (object) ["start" => "05-04", "end" => "05-05", "month" => 3],
            (object) ["start" => "06-05", "end" => "05-06", "month" => 4],
            (object) ["start" => "06-06", "end" => "06-07", "month" => 5],
            (object) ["start" => "07-07", "end" => "06-08", "month" => 6],
            (object) ["start" => "07-08", "end" => "07-09", "month" => 7],
            (object) ["start" => "08-09", "end" => "07-10", "month" => 8],
            (object) ["start" => "08-10", "end" => "06-11", "month" => 9],
            (object) ["start" => "07-11", "end" => "06-12", "month" => 10],
            (object) ["start" => "07-12", "end" => "05-01", "month" => 11],
            (object) ["start" => "06-01", "end" => "03-02", "month" => 12],
        ];
    }
}
