@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    <div class="flex">
        <a href="{{route('admin.finance.payments.showWorkers')}}" type="submit" class="flex items-center gap-x-2 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg text-sm px-4 py-2 ">

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2502 6C11.2502 5.58579 11.586 5.25 12.0002 5.25C12.4145 5.25 12.7502 5.58579 12.7502 6V11.2502H18.0007C18.4149 11.2502 18.7507 11.586 18.7507 12.0002C18.7507 12.4145 18.4149 12.7502 18.0007 12.7502H12.7502V18.0007C12.7502 18.4149 12.4145 18.7507 12.0002 18.7507C11.586 18.7507 11.2502 18.4149 11.2502 18.0007V12.7502H6C5.58579 12.7502 5.25 12.4145 5.25 12.0002C5.25 11.586 5.58579 11.2502 6 11.2502H11.2502V6Z" fill="#ffffff"/>
            </svg>
                  
           ثبت رسید پرداخت
        </a>
    </div>
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شماره رسید
                </th>
                <th scope="col" class="px-6 py-3">
                    نام شخص
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ پرداخت رسید
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ ثبت رسید
                </th>
                <th scope="col" class="px-6 py-3">
                    قیمت
                </th>
                <th scope="col" class="px-6 py-3">
                    شماره پیگیری
                </th>
                <th scope="col" class="px-6 py-3 ">
                    توضیحات
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($payments as $index => $payment)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $payment->id }} 
                </td>
                <td class="px-6 py-4">
                    {{ $payment->worker->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment->payment_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ number_format($payment->amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4 ">
                    {{ $payment->tracking_code }}
                </td>
                <td class="px-6 py-4">
                    {{ $payment->description }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.finance.payments.edit', $payment)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده
                    </a>
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



