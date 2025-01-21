<?php

if (!function_exists('convertPersianToEnglishNumbers')) {
    /**
     * تبدیل اعداد فارسی به انگلیسی
     *
     * @param string $number
     * @return string
     */
    function convertPersianToEnglishNumbers($number)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persian, $english, $number);
    }

    function isActiveRoute($routes): bool
    {
        $routes = is_array($routes) ? $routes : explode('|', $routes);
        return in_array(request()->route()->getName(), $routes);
    }
}
