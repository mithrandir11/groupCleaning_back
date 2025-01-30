@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    نام
                </th>
                <th scope="col" class="px-6 py-3">
                    نام‌خانوادگی
                </th>
                <th scope="col" class="px-6 py-3">
                    کد ملی
                </th>
                <th scope="col" class="px-6 py-3">
                    شماره موبایل
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>
                <th scope="col" class="px-6 py-3">
                    درصد کمیسیون
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ ثبت روزمه
                </th>

                <th scope="col" class="px-6 py-3 text-center">
                    جزییات
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($resumes as $index => $resume)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $resume->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->user->family }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->national_code }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->user->cellphone }}
                </td>
                <td class="px-6 py-4 {{ statusClass($resume->status) }}">
                    {{ $resume->status }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->commission_rate }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->created_at }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.resumes.show',$resume)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده
                    </a>
                </td>
            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    {{-- <div class="mt-4">
        {{ $users->links() }}
    </div>       --}}

</div>

                                            
@endsection

{{-- @php
function statusClass($status) {
    // return $status == 'فعال' ? 'text-green-500' : 'text-red-500';
    $statusMap = [
        'در انتظار بررسی' => 'text-yellow-500',
        'رد شده' => 'text-red-500',
        'تایید شده' => 'text-green-500',
    ];
    return $statusMap[$status] ?? ''; 
}
@endphp --}}



