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
         $values = [
            'مسکونی',
            'اداری/تجاری',
            'نوساز/تخلیه'
         ];

         foreach ($values as $value) {
            ServiceOptionValue::create([
                'option_id' => 1,
                'title' => $value,
            ]);
        }
    }
}
