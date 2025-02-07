@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    {{-- <div class="flex">
        <a href="{{route('admin.finance.payments.showWorkers')}}" type="submit" class="flex items-center gap-x-2 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg text-sm px-4 py-2 ">

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2502 6C11.2502 5.58579 11.586 5.25 12.0002 5.25C12.4145 5.25 12.7502 5.58579 12.7502 6V11.2502H18.0007C18.4149 11.2502 18.7507 11.586 18.7507 12.0002C18.7507 12.4145 18.4149 12.7502 18.0007 12.7502H12.7502V18.0007C12.7502 18.4149 12.4145 18.7507 12.0002 18.7507C11.586 18.7507 11.2502 18.4149 11.2502 18.0007V12.7502H6C5.58579 12.7502 5.25 12.4145 5.25 12.0002C5.25 11.586 5.58579 11.2502 6 11.2502H11.2502V6Z" fill="#ffffff"/>
            </svg>
                  
           ثبت رسید پرداخت
        </a>
    </div> --}}
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3">
                    کد متخصص
                </th>
                <th scope="col" class="px-6 py-3">
                   کل تسویه شده
                </th>
                <th scope="col" class="px-6 py-3">
                    کل درآمد
                </th>
                <th scope="col" class="px-6 py-3">
                    کل بستانکاری
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت متخصص
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    عملیات
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($reports as $index => $report)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $report->updated_at }} 
                </td>
                <td class="px-6 py-4">
                    {{ $report->worker_id }} 
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_paid_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_income_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ number_format($report->total_credit_amount) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ __('fa.status.'.$report->status) }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.finance.reports.details', $report->worker)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده جزئیات
                    </a>
                </td>
            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    {{-- <div class="mt-4">
        {{ $users->links() }}
    </div>       --}}

</div>

                                            
@endsection



