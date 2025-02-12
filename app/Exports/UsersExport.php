<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return User::with('roles')->get()->map(function ($user) {
            return [
                'name' => $user->name,
                'family' => $user->family,
                'cellphone' => $user->cellphone,
                'roles' => $user->roles->pluck('name')->join(', '), // ترکیب نقش‌ها با کاما
                'status' => __('fa.status.' . $user->status), // وضعیت کاربر
                'created_at' => $user->created_at, // تاریخ ثبت
            ];
        });
    }

    public function headings(): array
    {
        // تعریف سربرگ‌های جدول اکسل
        return [
            'نام',
            'فامیل',
            'شماره تلفن',
            'نقش‌ها',
            'وضعیت',
            'تاریخ ثبت نام',
        ];
    }
}
