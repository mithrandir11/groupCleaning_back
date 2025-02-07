@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    
    
    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    کد سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    نوع سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    نام شخص
                </th>
                <th scope="col" class="px-6 py-3">
                    کد شخص
                </th>
                <th scope="col" class="px-6 py-3">
                    قیمت
                </th>
                <th scope="col" class="px-6 py-3">
                    مبلغ جریمه
                </th>
                <th scope="col" class="px-6 py-3 ">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3 ">
                    توضیحات
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    مشاهده
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($fees as $index => $fee)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $fee->order->order_code }} 
                </td>
                <td class="px-6 py-4">
                    {{ $fee->order->service->title_fa }} - {{ $fee->order->service_type }} 
                </td>
                <td class="px-6 py-4">
                    {{ $fee->worker->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $fee->worker->id }}
                </td>
                <td class="px-6 py-4">
                    {{ number_format($fee->amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4 ">
                    <span @class(['text-red-500' => $fee->penalty_amount > 0])>{{ number_format($fee->penalty_amount) }}</span> <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ $fee->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ $fee->description }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.finance.pricing.show', $fee)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده
                    </a>
                </td>
            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $fees->links() }}
    </div>      

</div>

                                            
@endsection



