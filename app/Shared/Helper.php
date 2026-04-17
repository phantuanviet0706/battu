<?php

    namespace App\Shared;

    use Illuminate\Validation\ValidationException;
    use Str;
    use DateTime;

    class Helper {
        public static $FAILED_CODE = 0;
        public static $SUCCESS_CODE = 1;

        /**
         * Check if a string is empty
         * @param mixed $str
         * @return bool
         */
        public static function isEmpty($str) {
            return empty(trim($str));
        }

        /**
         * Check if a string is a valid email address
         * @param mixed $str
         */
        public static function isEmail($str) {
            return filter_var($str, FILTER_VALIDATE_EMAIL);
        }

        /**
         * Check if a string is a valid phone number
         * @param mixed $str
         * @return bool|int
         */
        public static function isPhone($str) {
            return preg_match('/^\+?[0-9]{10,15}$/', $str);
        }

        /**
         * Check if a string is a valid integer
         * @param mixed $str
         */
        public static function isInteger($str) {
            return filter_var($str, FILTER_VALIDATE_INT);
        }

        /**
         * Check if a string is a valid number
         * @param mixed $str
         */
        public static function isNumber($str) {
            return filter_var($str, FILTER_VALIDATE_FLOAT);
        }

        /**
         * Release an object response
         * @param string $msg
         * @param bool $code
         * @param mixed $data
         * @return object (code, message, data)
         */
        public static function release(string $msg, bool $code = false, $data = null) {
            if ($code) {
                return (object) [
                    'code' => $code,
                    'message' => $msg,
                    "data" => $data
                ];
            }

            return (object) [
                'code' => 0,
                'message' => $msg ?? Translator::trans("The system occurs an error, please try again"),
                "data" => $data
            ];
        }

        public static function thrownExceptionValidator($field, $msg) {
            throw ValidationException::withMessages([
                $field => $msg
            ]);
        }

        public static function isLimitContent($str, $limit_from = 0, $limit_to = 255) {
            $str_len = Str::length($str);
            if ($limit_to == 0) {
                if ($str_len < $limit_from) return false;
                return true;
            }
            if ($str_len < $limit_from || $str_len > $limit_to) {
                return false;
            }
            return true;
        }

        public static function inset($var, ...$values) {
            return in_array($var, $values);
        }

        /**
         * Công thức tính thế kỷ dựa trên năm
         */
        public static function calculateCentury($year) {            
            // Công thức tính thế kỷ: (năm - 1) / 100 + 1
            $century = ceil($year / 100);
            
            return $century;
        }

        public static function formatAgriculturalDate($date)
        {
            $timestamp = is_numeric($date) ? $date : strtotime($date);
            $d = (int)date('d', $timestamp);
            $m = (int)date('m', $timestamp);
            $y = (int)date('Y', $timestamp);
        
            // 1. Tính Năm Nông lịch (pp và oo)
            // Giả sử mốc Lập Xuân là 04/02
            $agriYear = (strtotime("$y-$m-$d") < strtotime("$y-02-04")) ? $y - 1 : $y;
            
            $oo = substr($agriYear, 0, 2); // Thế kỷ (2 số đầu)
            $pp = substr($agriYear, 2, 2); // Năm (2 số cuối)
        
            // 2. Lấy danh sách định dạng từ Formula
            $agricultural_format = Formula::getFormulaAgricutural();
            $input_date = new DateTime(date('Y-m-d', $timestamp));
            
            $rr = "01"; // Mặc định ngày 01
            $qq = "01"; // Mặc định tháng 01
        
            foreach ($agricultural_format as $index => $agr) {
                foreach ($agr->range as $range) {
                    $start_date = DateTime::createFromFormat('d-m-Y', $range->start . "-$y");
                    $end_date = DateTime::createFromFormat('d-m-Y', $range->end . "-$y");
        
                    // Xử lý khoảng ngày vắt qua năm
                    if ($start_date > $end_date) {
                        if ($input_date >= $start_date) {
                            $end_date->modify('+1 year');
                        } else {
                            $start_date->modify('-1 year');
                        }
                    }
        
                    // Nếu ngày nằm trong khoảng này
                    if ($input_date >= $start_date && $input_date <= $end_date) {
                        // qq: Thứ tự của tiết khí (nên lấy từ data hoặc index)
                        // Nếu trong $agr có field 'month_index' thì dùng, không thì dùng ($index + 1)
                        $qq = str_pad($agr->month_index ?? ($index + 1), 2, '0', STR_PAD_LEFT);
        
                        // rr: Số ngày tính từ ngày bắt đầu tiết khí
                        $diff = $input_date->diff($start_date);
                        $rr = str_pad($diff->days + 1, 2, '0', STR_PAD_LEFT);
        
                        break 2;
                    }
                }
            }
        
            // Trả về theo format rr/qq/oopp
            return (object) [
                "century" => $oo,
                "suffix_year" => $pp,
                "month" => $qq,
                "day" => $rr
            ];
        }
    }

?>