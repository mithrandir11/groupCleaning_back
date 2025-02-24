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
        
        return User::with('roles')->get()->map(function ($user) {
            return [
                'name' => $user->name,
                'family' => $user->family,
                'cellphone' => $user->cellphone,
                'roles' => $user->roles->pluck('name')->join(', '), 
                'status' => __('fa.status.' . $user->status), 
                'created_at' => $user->created_at, 
            ];
        });
    }

    public function headings(): array
    {
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
