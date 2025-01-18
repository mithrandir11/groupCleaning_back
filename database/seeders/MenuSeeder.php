<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuA = Menu::create(['name' => 'Menu A', 'slug' => 'menu-a', 'text' => 'menu a']);

        $menuB = Menu::create(['name' => 'Menu B', 'slug' => 'menu-b', 'parent_id' => $menuA->id, 'text' => 'menu b']);

        Menu::create(['name' => 'Menu C', 'slug' => 'menu-c', 'parent_id' => $menuB->id, 'text' => 'menu c']);
    }
}
