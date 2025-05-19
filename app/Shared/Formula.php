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
                'name' => 'Tí',
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
            (object) ["id" => 0, "name" => "Tí",   "yin_yang" => "Thủy", "polarity" => "Dương", "color" => "text-blue-600"],
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
                "name" => "Tí",
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
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Kim",
                "begin_polarity" => "Âm",
                "color" => "text-yellow-500",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Mộc",
                "begin_polarity" => "Âm",
                "color" => "text-green-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Mộc",
                "begin_polarity" => "Dương",
                "color" => "text-green-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thủy",
                "begin_polarity" => "Dương",
                "color" => "text-blue-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thủy",
                "begin_polarity" => "Âm",
                "color" => "text-blue-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Hỏa",
                "begin_polarity" => "Dương",
                "color" => "text-red-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Hỏa",
                "begin_polarity" => "Âm",
                "color" => "text-red-600",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thổ",
                "begin_polarity" => "Dương",
                "color" => "text-yellow-700",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                ]
            ],
            (object) [
                "begin_yin_yang" => "Thổ",
                "begin_polarity" => "Âm",
                "color" => "text-yellow-700",
                "hidden_stems" => [
                    (object) ["name" => "Chính Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Âm", "color" => "text-yellow-700"],
                    (object) ["name" => "Thiên Ấn", "end_yin_yang" => "Hỏa", "end_polarity" => "Dương", "color" => "text-yellow-700"],
                    (object) ["name" => "Thực Thần", "end_yin_yang" => "Kim", "end_polarity" => "Âm", "color" => "text-blue-600"],
                    (object) ["name" => "Thương Quan", "end_yin_yang" => "Kim", "end_polarity" => "Dương", "color" => "text-blue-600"],
                    (object) ["name" => "Chính Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Âm", "color" => "text-green-600"],
                    (object) ["name" => "Thiên Tài", "end_yin_yang" => "Thủy", "end_polarity" => "Dương", "color" => "text-green-600"],
                    (object) ["name" => "Chính Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Âm", "color" => "text-red-600"],
                    (object) ["name" => "Thiên Quan", "end_yin_yang" => "Mộc", "end_polarity" => "Dương", "color" => "text-red-600"],
                    (object) ["name" => "Tỷ Kiên", "end_yin_yang" => "Thổ", "end_polarity" => "Âm", "color" => "text-yellow-500"],
                    (object) ["name" => "Kiếp Tài", "end_yin_yang" => "Thổ", "end_polarity" => "Dương", "color" => "text-yellow-500"],
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
                "id" => "Giáp Tí",
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
                "id" => "Bính Tí",
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
                "id" => "Mậu Tí",
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
                "id" => "Canh Tí",
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
                "id" => "Nhâm Tí",
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
}
