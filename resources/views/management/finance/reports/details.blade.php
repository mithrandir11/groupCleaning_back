@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    <div class="flex justify-end items-center gap-x-3 mb-10 ">
        <a href="{{route('admin.finance.reports')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                   تاریخ
                </th>
                <th scope="col" class="px-6 py-3">
                   مبلغ
                </th>
                <th scope="col" class="px-6 py-3">
                    توضیحات
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    نوع
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($details as $index => $detail)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $detail['date'] }} 
                </td>
                <td class="px-6 py-4">
                    {{ number_format($detail['amount']) }} <span class="text-xs">تومان</span>
                </td>
                <td class="px-6 py-4">
                    {{ $detail['description'] }} 
                </td>
                <td class="px-6 py-4 text-center {{statusClass($detail['type'])}}">
                    {{ __('fa.status.'.$detail['type']) }} 
                </td>
            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $details->links() }}
    </div>      

</div>

                                            
@endsection



