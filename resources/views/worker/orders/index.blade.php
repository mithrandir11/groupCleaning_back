@extends('layouts.worker')

@section('content')
<div class=" overflow-x-auto  grow">
    <div class="max-w-sm ">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
        <form action="{{route('worker.orders')}}" method="GET" class="relative">
            
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="search" type="text" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none  focus:border-blue-500" placeholder="نام  یا نام‌خانوادگی  یا  شماره تماس ..."  />
            <button type="submit" class="text-white absolute end-2 bottom-1.5 bg-gray-500 hover:bg-gray-600 duration-200  outline-none  font-medium rounded-lg text-xs px-3 py-2">جستجو</button>
        </form>
    </div>

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    کد سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ واگذاری
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ تحویل
                </th>
                <th scope="col" class="px-6 py-3">
                    دستمزد
                </th>
                <th scope="col" class="px-6 py-3">
                    توضیحات اپراتور
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($worker_orders as $index => $worker_order)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $worker_order->order->order_code }}
                </td>
                <td class="px-6 py-4 {{ statusClass($worker_order->status) }}">
                    {{ __('fa.status.' . $worker_order->status) }}
                    {{-- {{ $order->status }} --}}
                </td>
                <td class="px-6 py-4">
                    {{ $worker_order->created_at }}
                </td>
                <td class="px-6 py-4">
                    
                </td>
                {{-- <td class="px-6 py-4">
                    {{ number_format($worker_order->order->commission_amount) }} <span class="text-xs">تومان</span>
                </td> --}}
                {{-- <td class="px-6 py-4">
                    {{ $order->operator_notes }}
                </td> --}}
                <td class="px-6 py-4 text-center">
                    <a href="{{route('worker.orders.show', $worker_order->order)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده
                    </a>
                </td>

            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $worker_orders->links() }}
    </div>      

</div>



                                            
@endsection


@php
function statusClass($status) {
    $statusMap = [
        'pending' => 'text-yellow-500',
        'canceled' => 'text-red-500',
        'processing' => 'text-blue-500',
        'completed' => 'text-green-500', 
    ];
    return $statusMap[$status] ?? 'text-gray-500'; // رنگ پیش‌فرض
}
@endphp