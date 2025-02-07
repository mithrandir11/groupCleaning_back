@extends('layouts.admin')

@section('content')
<div class="grow">
    <div class="flex justify-end items-center gap-x-3 mb-10">
        <a href="{{route('admin.finance.pricing')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    
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



