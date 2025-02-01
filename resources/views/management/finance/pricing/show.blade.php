@extends('layouts.admin')

@section('content')
<div class="grow">
    
    <div class="space-y-8 ">

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">کد سفارش</label>
            <input value="{{$fee->order->order_code}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">نوع سفارش</label>
            <input value="{{$fee->order->service_type}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">نام شخص</label>
            <input value="{{$fee->worker->name}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">کد شخص</label>
            <input value="{{$fee->worker->id}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">تاریخ</label>
            <input value="{{$fee->created_at}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>


        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">توضیحات</label>
            <input value="{{$fee->description}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>

        <div>
            <label for="order_code" class="block mb-2 text-sm font-medium text-gray-900">دستمزد</label>
            <input value="{{$fee->amount}}" name="order_code" type="text" disabled class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
        </div>
        
        <form action="{{route('admin.finance.pricing.applyPenalty', $fee)}}" method="POST">
            @csrf
            <div>
                <label for="penalty_amount" class="block mb-2 text-sm font-medium text-gray-900">مبلغ جریمه</label>
                <input value="{{$fee->penalty_amount}}" name="penalty_amount" type="text"  class=" max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            </div>
    
            <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 mt-8">
                ذخیره تغییرات   
            </button>
        </form>

        
    </div>
    
    
        

</div>

                                            
@endsection



