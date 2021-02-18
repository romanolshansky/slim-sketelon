<?php 
/*
    https://github.com/cakephp/cakephp/issues/12669
*/

if (!function_exists('slim_env')) {
    function slim_env($key, $default = null)
    {
        $value = getenv($key);

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        return $value;
    }
}