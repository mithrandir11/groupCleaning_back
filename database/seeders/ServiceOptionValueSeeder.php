<?php

namespace Database\Seeders;

use App\Models\ServiceOptionValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values_1 = [
            'مسکونی',
            'اداری/تجاری',
            'نوساز/تخلیه'
        ];
        foreach ($values_1 as $value) {
            ServiceOptionValue::create([
                'option_id' => 1,
                'title' => $value,
            ]);
        }



        $values_2 = [
            'دیوار شویی',
            'آشپزخانه',
            'مرتب کردن داخل کمد و کابینت',
            'شستن ظروف',
            'شستن کف و جارو گردگیری',
            'سرویس بهداشتی',
            'کمک در چیدمان منزل',
            'شستن بالکن',
            'پاک کردن شیشه ها',
        ];
        foreach ($values_2 as $value) {
            ServiceOptionValue::create([
                'option_id' => 2,
                'title' => $value,
            ]);
        }


        $values_3 = [
            '4 ساعت',
            '5 ساعت',
            '6 ساعت',
            '7 ساعت',
            '8 ساعت',
            '9 ساعت',
            '10 ساعت',
        ];
        foreach ($values_3 as $value) {
            ServiceOptionValue::create([
                'option_id' => 3,
                'title' => $value,
            ]);
        }


        $values_4 = [
            'کمتر از 50 متر',
            '50 تا 70 متر',
            '70 تا 90 متر',
            '90 تا 130 متر',
            'بیشتر از 130 متر',
        ];
        foreach ($values_4 as $value) {
            ServiceOptionValue::create([
                'option_id' => 4,
                'title' => $value,
            ]);
        }


        $values_5 = [
            'باز و نصب کردن پرده',
            'اتوکشی پرده',
            'شامپو فرش و مبل',
            'لوستر',
            'شستن فرش',
        ];
        foreach ($values_5 as $value) {
            ServiceOptionValue::create([
                'option_id' => 5,
                'title' => $value,
            ]);
        }



        $values_6 = [
            '1 نفر',
            '2 نفر',
            '3 نفر',
            '4 نفر',
            '5 نفر',
        ];
        foreach ($values_6 as $value) {
            ServiceOptionValue::create([
                'option_id' => 6,
                'title' => $value,
            ]);
        }


        $values_7 = [
            'بله',
            'خیر',
        ];
        foreach ($values_7 as $value) {
            ServiceOptionValue::create([
                'option_id' => 7,
                'title' => $value,
            ]);
        }


    }
}
