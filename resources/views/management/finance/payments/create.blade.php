@extends('layouts.admin')

@section('content')
<div class="grow">

    <div class="flex justify-end items-center gap-x-3 mb-10 ">
        <a href="{{route('admin.finance.payments.showWorkers')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>

    <form action="{{route('admin.finance.payments.store')}}" method="POST" class="space-y-8">
        @csrf
        <input type="hidden" name="worker_id" value="{{$worker->id}}">

        <div>
            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">مبلغ (تومان)</label>
            <input type="number" name="amount" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3" >
            @error('amount') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>


        <div>
            <label for="tracking_code" class="block mb-2 text-sm font-medium text-gray-900">کدپیگیری</label>
            <input type="text" name="tracking_code" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3" >
            @error('tracking_code') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="payment_date" class="block mb-2 text-sm font-medium text-gray-900">تاریخ پرداخت</label>
            <input data-jdp name="payment_date" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3" >
            @error('payment_date') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div >
             <label for="description" class="block mb-2 text-sm font-medium text-gray-900">توضیحات</label>
            <textarea name="description" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3"></textarea>
            @error('description') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>
        
        <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
           ثبت پرداخت
        </button>
    </form>
    
    
    

    

    
    
    
    

</div>

   

                                            
@endsection

@push('scripts')
<script>
    jalaliDatepicker.startWatch();
</script>
@endpush




