@extends('layouts.worker')

@section('content')
<div class=" overflow-x-auto  grow">


    {{-- <div class="space-y-3"> --}}
        {{-- <p>کل مبلغ پرداخت شده : <span class="font-bold text-lg">{{$totalPaid}}</span></p>
        <p>کل مبلغ پرداخت نشده : <span class="font-bold text-lg">{{$totalUnpaid}}</span></p> --}}
        {{-- <p>وضعیت تراز مالی : <span class="font-bold text-lg">{{$balance}}</span></p> --}}
    {{-- </div> --}}

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3">
                    کد متخصص
                </th>
                <th scope="col" class="px-6 py-3">
                   کل تسویه شده
                </th>
                <th scope="col" class="px-6 py-3">
                    کل درآمد
                </th>
                <th scope="col" class="px-6 py-3">
                    کل بستانکاری
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت متخصص
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    عملیات
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3">
                    مبلغ
                </th>
                <th scope="col" class="px-6 py-3">
                    بابت
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>
                <th scope="col" class="px-6 py-3">
                    شرح
                </th> --}}
            </tr>
        </thead>
        
        <tbody>
            @if ($report)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $report->updated_at }} 
                </td>
                <td class="px-6 py-4">
                    {{ $report->worker_id }} 
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_paid_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_income_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_credit_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ __('fa.status.'.$report->status) }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('worker.finance.details')}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده جزئیات
                    </a>
                </td>
            </tr> 
            @endif
                 
           
        </tbody>
    </table>  

    {{-- <div class="mt-4">
        {{ $payments->links() }}
    </div>       --}}

</div>



                                            
@endsection


{{-- @php
function statusClass($status) {
    return $status == 'paid' ? 'text-green-500' : 'text-red-500';
    // $statusMap = [
    //     'در انتظار بررسی' => 'text-yellow-600',
    //     'انصراف' => 'text-red-500',
    //     'در حال انجام کار' => 'text-blue-500',
    //     'اتمام' => 'text-green-500',
    // ];
    // return $statusMap[$status] ?? 'text-gray-500'; // رنگ پیش‌فرض
}
@endphp --}}