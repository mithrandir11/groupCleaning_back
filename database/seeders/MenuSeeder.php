<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Menu;
use App\Models\SuggestedPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuA = Menu::create(['name' => 'خدمات', 'slug' => 'services', 'text' => 'خدمات']);
        Menu::create(['name' => 'هزینه خدمات', 'slug' => 'services-cost', 'text' => 'هزینه خدمات']);
        Menu::create(['name' => 'سوالات متداول', 'slug' => 'faq', 'text' => 'سوالات متداول']);
        Menu::create(['name' => 'ارتباط با ما', 'slug' => 'contact-us', 'text' => 'ارتباط با ما']);

        Faq::create([
            'menu_id' => $menuA->id,
            'question' => 'سوال تست',
            'answer' => 'جواب تست',
        ]);

        SuggestedPage::create([
            'menu_id' => $menuA->id,
            'title' => 'عنوان تست',
            'url' => '/',
        ]);
    }
}
