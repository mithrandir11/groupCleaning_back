<?php

namespace Database\Seeders;

use App\Models\ServiceTypeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['سرویس عادی', 'سرویس دوره ای', 'سرویس لوکس', 'پذیرایی'];
        foreach ($values as $value) {
            ServiceTypeValue::create([
                'type_id' => 1,
                'title' => $value,
            ]);
        }
    }
}
