<?php

namespace Database\Seeders;

use App\Models\ServiceOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service_options = [
            'نوع فضای مورد نظر',
            'موارد مشمول نظافت',
            'برآورد از زمان مورد نیاز',
            'متراژ فضا',
            'خدمات تکمیلی',
            'تعداد نیروی موردنیاز',
            'حیوان خانگی دارید؟',
        ];
        
        foreach ($service_options as $service_option) {
            ServiceOption::create([
                'service_id' => 1,
                'title' => $service_option,
            ]);
        }
    }
}
