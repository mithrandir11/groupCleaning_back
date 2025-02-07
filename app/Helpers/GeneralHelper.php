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

    function feeCalculation($total_amount, $commission_rate){
        return $total_amount * ($commission_rate / 100);
    }


    
    function statusClass($status) {
        $statusMap = [
            'pending' => 'text-yellow-500',
            'canceled' => 'text-red-500',
            'processing' => 'text-blue-500',
            'accepted' => 'text-blue-500',
            'completed' => 'text-green-500', 

            'paid' => 'text-green-500', 
            'fee' => 'text-yellow-500',

            'active' => 'text-green-500', 
            'inactive' => 'text-red-500', 
        ];
        return $statusMap[$status] ?? null; 
    }

}
