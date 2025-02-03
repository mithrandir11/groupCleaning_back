@extends('layouts.worker')

@section('content')
<div class="grow">

    <div class="grid grid-cols-3 border border-gray-300 divide-x divide-x-reverse rounded-t-lg text-center">
        <div class=" p-3">
          <p class="mb-2 font-semibold">وضعیت سفارش</p>
          <p class="{{ statusClass($order->status) }}">{{ __('fa.status.'.$order->status) }}</p>
        </div>
    
        <div class=" p-3">
          <p class="mb-2 font-semibold">کد سفارش</p>
          <p>{{ $order->order_code }}</p>
        </div>
    
        <div class=" p-3">
          <p class="mb-2 font-semibold">کد متخصص</p>
          <p> {{  $order->workers->pluck('id')->implode(' - ') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-3 border-x border-gray-300 divide-x divide-x-reverse  text-center">
        <div class=" p-3">
          <p class="mb-2 font-semibold">قیمت خدمات</p>
          <span class="">{{ number_format(feeCalculation($order->total_amount, $commission_amount)) }}</span> تومان
        </div>
    
        <div class=" p-3">
          <p class="mb-2 font-semibold">تاریخ ثبت سفارش مشتری</p>
          <p>{{ $order->created_at }}</p>
        </div>
    
        <div class=" p-3">
          <p class="mb-2 font-semibold">زمان و تاریخ درخواستی</p>
          <p>{{ $order->selected_date }} - {{ $order->selected_time }}</p>
        </div>
    </div>

    <div class="border border-gray-300 px-6 py-8">
        <strong>توضیحات مشتری : </strong> {{ $order->extra_details }}
    </div>

    <div class="border border-y-0 border-gray-300 px-6 py-4">
        @foreach($order->service_options as $key => $value)
        <li class="mb-8 list-none">
            <strong>{{ $key }}:</strong>
            @if(is_array($value))
                <ul class="pr-5 space-y-2 pt-2">
                    @foreach($value as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @else
                {{ $value }}
            @endif
        </li>
        @endforeach
        <li class="mb-6 list-none">
            <strong>شماره تماس مشتری :</strong>
            {{ $order->contact_number }}
        </li>
    
        <li class="mb-6 list-none">
            <strong>آدرس مشتری :</strong>
            {{ $order->address }}
        </li>
    </div>

    <div class="border  border-gray-300 px-6 py-8 rounded-b-lg">
        <strong>توضیحات اپراتور :</strong> {{ $worker_order->operator_notes }}
    </div>
   
    
    <div class="flex justify-end items-center gap-x-3 mt-16 ">

       
        @switch($worker_order->status)
            @case('pending')
                <form action="{{route('worker.orders.accept', $worker_order)}}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-x-2 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                            <path d="M19.2803 6.76264C19.5732 7.05553 19.5732 7.53041 19.2803 7.8233L9.86348 17.2402C9.57058 17.533 9.09571 17.533 8.80282 17.2402L4.71967 13.157C4.42678 12.8641 4.42678 12.3892 4.71967 12.0963C5.01256 11.8035 5.48744 11.8035 5.78033 12.0963L9.33315 15.6492L18.2197 6.76264C18.5126 6.46975 18.9874 6.46975 19.2803 6.76264Z" fill="#ffffff"/>
                        </svg>  
                        پذیرش سفارش
                    </button>
                </form>
                @break

            @case('accepted')
                <form action="{{route('worker.orders.complete', $worker_order)}}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-x-2 text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                            <path d="M19.2803 6.76264C19.5732 7.05553 19.5732 7.53041 19.2803 7.8233L9.86348 17.2402C9.57058 17.533 9.09571 17.533 8.80282 17.2402L4.71967 13.157C4.42678 12.8641 4.42678 12.3892 4.71967 12.0963C5.01256 11.8035 5.48744 11.8035 5.78033 12.0963L9.33315 15.6492L18.2197 6.76264C18.5126 6.46975 18.9874 6.46975 19.2803 6.76264Z" fill="#ffffff"/>
                        </svg>  
                        اتمام سفارش
                    </button>
                </form>
                @break
        
            @default
                
        @endswitch

        <a href="{{route('worker.orders')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
        

    </div>
        

</div>

                                            
@endsection



