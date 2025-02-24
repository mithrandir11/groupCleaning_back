<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'cleaning',
            'title_fa' => 'نظافت منزل',
            'slug' => 'cleaning'
        ]);

        $this->call([
            RoleUserSeeder::class,
            MenuSeeder::class,
            ArticleSeeder::class,
            ServiceTypeSeeder::class,
            ServiceTypeValueSeeder::class,
            ServiceOptionSeeder::class,
            ServiceOptionValueSeeder::class,
            AddressSeeder::class,
            ResumeSeeder::class,
            SettingSeeder::class,
            
        ]);
    }
}
