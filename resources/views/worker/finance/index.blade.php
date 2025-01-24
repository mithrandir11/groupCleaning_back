@extends('layouts.worker')

@section('content')
<div class=" overflow-x-auto  grow">


    {{-- <div class="space-y-3"> --}}
        {{-- <p>کل مبلغ پرداخت شده : <span class="font-bold text-lg">{{$totalPaid}}</span></p>
        <p>کل مبلغ پرداخت نشده : <span class="font-bold text-lg">{{$totalUnpaid}}</span></p> --}}
        <p>وضعیت تراز مالی : <span class="font-bold text-lg">{{$balance}}</span></p>
    {{-- </div> --}}

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
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
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($payments as $index => $payment)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $payment->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ number_format($payment->amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    سفارش <span class="mr-1">{{ $payment->order->order_code }}#</span>    
                </td>
                <td class="px-6 py-4 {{ statusClass($payment->status) }}">
                    {{ __('fa.status.' . $payment->status) }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment->description }}
                </td>        

            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $payments->links() }}
    </div>      

</div>



                                            
@endsection


@php
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
@endphp