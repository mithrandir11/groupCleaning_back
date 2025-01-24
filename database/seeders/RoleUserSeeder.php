<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $operatorRole = Role::create(['name' => 'operator']);
        Role::create(['name' => 'customer']);
        $workerRole = Role::create(['name' => 'worker']);

        // ایجاد مشتری
        $customer = User::create([
            'name' => 'کیارش',
            'family' => 'آهنگی',
            'cellphone' => '09390880651',
            'email' => 'user1@example.com',
            'password' => Hash::make('1111'),
        ]);
        $customer->roles()->attach($workerRole);



        // ایجاد کاربر ادمین
        // $admin = User::create([
        //     'name' => 'ادمین',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $admin->roles()->attach($adminRole);

        $admin = new User([
            'name' => 'ادمین',
            'email' => 'admin@example.com',
            'password' => Hash::make('1111'),
        ]);
        $admin->assignCustomerRole = false; 
        $admin->save();
        $admin->roles()->attach($adminRole);



        // ایجاد کاربر اپراتور
        // $operator = User::create([
        //     'name' => 'اپراتور',
        //     'email' => 'operator@example.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $operator->roles()->attach($operatorRole);

        $operator = new User([
            'name' => 'اپراتور',
            'email' => 'operator@example.com',
            'password' => Hash::make('1111'),
        ]);
        $operator->assignCustomerRole = false; 
        $operator->save();
        $operator->roles()->attach($operatorRole);
    }
}
