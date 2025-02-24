<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'user_id' => 1,
            'state' => 'تهران',
            'city' => 'زعفرانیه',
            'full_address' => 'تهران زعفرانیه خیابان مقدس اردبیلی پلاک 160',
        ]);
    }
}
