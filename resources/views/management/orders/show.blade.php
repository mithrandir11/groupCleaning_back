@extends('layouts.admin')

@section('content')
<div class="grow">
    
    <p class="mb-6 text-xl font-bold text-gray-600 border-b pb-3">{{$order->service_type}}</p>

    <div class="flex justify-between">
        <div>
            @foreach($order->service_options as $key => $value)
                <li class="mb-8 list-inside">
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
    
            <li class="mb-6 list-inside">
                <strong>توضیحات مشتری :</strong>
                {{ $order->extra_details }}
            </li>
    
            <li class="mb-6 list-inside">
                <strong>توضیحات مدیریت :</strong>
                {{ $order->operator_notes }}
            </li>
    
            <li class="mb-6 list-inside">
                <strong>تاریخ درخواستی :</strong>
                {{ $order->selected_date }}
            </li>
    
            <li class="mb-6 list-inside">
                <strong>ساعت درخواستی :</strong>
                {{ $order->selected_time }}
            </li>
    
            <li class="mb-6 list-inside">
                <strong>شماره تماس مشتری :</strong>
                {{ $order->contact_number }}
            </li>
    
            <li class="mb-6 list-inside">
                <strong>آدرس مشتری :</strong>
                {{ $order->address }}
            </li>
        </div>

        {{-- <div>
            <div class="border rounded-lg p-3 bg-green-300 text-center">
                <svg class="mx-auto mb-3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M160 0c17.7 0 32 14.3 32 32l0 35.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11l0 33.4c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-34.9c-.4-.1-.9-.1-1.3-.2l-.2 0s0 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7s0 0 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11L128 32c0-17.7 14.3-32 32-32z"/></svg>
                هزینه سفارش
                <span class="font-bold text-xl mx-4">{{number_format($order->total_amount)}}</span> تومان
            </div>

            <div class="mt-3 border rounded-lg p-3 bg-blue-300 text-center">
                @foreach ($order->workers as $worker)
                    <div>
                        <span>{{$worker}}</span>
                        <span>{{$worker->status}}</span>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    


    <form action="{{route('admin.orders.setPrice', $order)}}" method="POST" class="mt-16">
        @csrf
        <label for="amount" class="block text-sm font-medium text-gray-900  mb-2">تعیین قیمت</label>
        <div class="flex gap-x-3  max-w-sm ">
            <div class="w-full">
                
                <input value="{{ $order->total_amount  }}" name="amount" type="number" class="text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
                @error('amount')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="flex items-center  gap-x-2 text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-xs px-4 py-1 ">
                ذخیره
            </button>
        </div>
    </form>

    @if ($order->total_amount)
    <div class="mt-4 flex">
        <a href="{{route('admin.orders.assignOrderToWorker.show', $order)}}" class="flex items-center gap-x-2 text-white bg-yellow-500 hover:bg-yellow-600 duration-200 rounded-lg text-sm px-4 py-2 ">
            <svg class="fill-white" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3l0-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5l0 21.5c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112l32 0c24 0 46.2 7.5 64.4 20.3zM448 416l0-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176l32 0c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2l0 26.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3l0-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2l0 42.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112l32 0c61.9 0 112 50.1 112 112z"/></svg>
            ارجاع به متخصص
        </a>
    </div>   
    @endif
    

    {{-- <li class="mb-6 list-inside ">
        <strong>دستمزد :</strong>
        <span class="text-2xl">{{ number_format(feeCalculation($order->total_amount, $commission_amount)) }}</span> تومان
    </li> --}}
   
    
    <div class="flex justify-end items-center gap-x-3 mt-28 ">

       
        {{-- @switch($order->status)
            @case('pending')
                <form action="{{route('admin.orders.accept', $order)}}" method="POST">
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
                <form action="{{route('worker.orders.complete', $order)}}" method="POST">
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
                
        @endswitch --}}

        @if($order->status == 'processing') 
        <form action="{{route('admin.orders.complete', $order)}}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-x-2 text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                    <path d="M19.2803 6.76264C19.5732 7.05553 19.5732 7.53041 19.2803 7.8233L9.86348 17.2402C9.57058 17.533 9.09571 17.533 8.80282 17.2402L4.71967 13.157C4.42678 12.8641 4.42678 12.3892 4.71967 12.0963C5.01256 11.8035 5.48744 11.8035 5.78033 12.0963L9.33315 15.6492L18.2197 6.76264C18.5126 6.46975 18.9874 6.46975 19.2803 6.76264Z" fill="#ffffff"/>
                </svg>  
                اتمام سفارش
            </button>
        </form>
        @endif

        

        <a href="{{route('admin.orders')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
        

    </div>
        

</div>

                                            
@endsection



