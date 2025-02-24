<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $service_types = ['سرویس عادی', 'سرویس دوره ای', 'سرویس لوکس', 'پذیرایی'];
        // foreach ($service_types as $service_type) {
        //     ServiceType::create([
        //         'service_id' => 1,
        //         'title' => $service_type,
        //     ]);
        // }

        ServiceType::create([
            'service_id' => 1,
            'title' => 'نوع نظافت',
        ]);
    }
}
