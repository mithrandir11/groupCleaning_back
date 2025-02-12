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

        // $menuB = Menu::create(['name' => 'Menu B', 'slug' => 'menu-b', 'parent_id' => $menuA->id, 'text' => 'menu b']);
        // $menuB2 = Menu::create(['name' => 'Menu B.2', 'slug' => 'menu-b-2', 'parent_id' => $menuA->id, 'text' => 'menu b2']);
        // $menuB3 = Menu::create(['name' => 'Menu B.3', 'slug' => 'menu-b-3', 'parent_id' => $menuA->id, 'text' => 'menu b3']);
        // $menuB4 = Menu::create(['name' => 'Menu B.4', 'slug' => 'menu-b-4', 'parent_id' => $menuA->id, 'text' => 'menu b4']);

        // Menu::create(['name' => 'Menu C', 'slug' => 'menu-c', 'parent_id' => $menuB->id, 'text' => 'menu c']);

        //faq
        Faq::create([
            'menu_id' => $menuA->id,
            'question' => 'سوال تست',
            'answer' => 'جواب تست',
        ]);

        //suggested Pages
        SuggestedPage::create([
            'menu_id' => $menuA->id,
            'title' => 'عنوان تست',
            'url' => '/',
        ]);
    }
}
