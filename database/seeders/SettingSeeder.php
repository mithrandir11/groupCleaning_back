<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'admin_phone_number',
            'value' => '09399999999', // شماره پیش‌فرض
            'description' => 'وقتی سفارشی ثبت شود به این شماره پیامک ارسال میشود'
        ]);
    }
}
