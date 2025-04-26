<?php
    namespace App\Shared;

    use APP\Models\Company;

    class Translator {
        private static $LANG_ENG = 'en';
        private static $LANG_VI = 'vi';
        protected static $dictionary_message = [
            
        ];

        protected static $dictionary = [

        ];

        public static function trans($key) {
            // $company = Company::initNewCompany();
            // $lang = $company->lang;
            $lang = "vi";
            if ($lang == self::$LANG_ENG) {
                return $key;
            }

            if (isset(self::$dictionary[$key])) {
                return self::$dictionary[$key];
            }

            if (isset(self::$dictionary_message[$key])) {
                return self::$dictionary_message[$key];
            }
            
            return $key;
        }
    }

?>