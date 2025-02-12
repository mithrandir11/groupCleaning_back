@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    
    <form action="{{ route('admin.fees.export') }}" method="GET" >
        <div class="flex items-end space-x-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">از تاریخ:</label>
                <input type="date" name="start_date" id="start_date"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                       value="{{ request('start_date') }}">
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">تا تاریخ:</label>
                <input type="date" name="end_date" id="end_date"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                       value="{{ request('end_date') }}">
            </div>

            <button type="submit"
                    class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                فیلتر و دانلود اکسل
            </button>
        </div>
    </form>
    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
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
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
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



