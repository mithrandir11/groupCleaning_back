@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    <div class="max-w-sm ">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
        <form action="/" method="GET" class="relative">
            
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="search" type="text" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none  focus:border-blue-500" placeholder="نام  یا نام‌خانوادگی  یا  شماره تماس ..."  />
            <button type="submit" class="text-white absolute end-2 bottom-1.5 bg-gray-500 hover:bg-gray-600 duration-200  outline-none  font-medium rounded-lg text-xs px-3 py-2">جستجو</button>
        </form>
    </div>

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    کد کاربر
                </th>
                <th scope="col" class="px-6 py-3">
                    نام
                </th>
                <th scope="col" class="px-6 py-3">
                    نام خانوادگی
                </th>
                <th scope="col" class="flex gap-x-1 items-center">

                    
                    <form class="max-w-lg flex">
                        <input name="search" type="text" id="default-search" class="block  p-2 text-xs text-gray-900 border border-gray-300 rounded-r-lg outline-none  focus:border-blue-500"  placeholder="مهارت ها ..." />
                        <button class="border border-r-0 border-gray-300 rounded-l-lg px-2 bg-gray-100 duration-200  hover:bg-gray-200" >
                            <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path d="M11.2498 5.75037C10.8356 5.75037 10.4998 6.08615 10.4998 6.50037C10.4998 6.91458 10.8356 7.25037 11.2498 7.25037C13.874 7.25037 16.0011 9.37718 16.0011 12.0004C16.0011 12.4146 16.3369 12.7504 16.7511 12.7504C17.1653 12.7504 17.5011 12.4146 17.5011 12.0004C17.5011 8.54842 14.7021 5.75037 11.2498 5.75037Z" fill="#343C54"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11.9989C2 6.89126 6.14154 2.75098 11.25 2.75098C16.3585 2.75098 20.5 6.89126 20.5 11.9989C20.5 14.2836 19.6714 16.3747 18.2983 17.9883L21.7791 21.4695C22.072 21.7624 22.072 22.2372 21.7791 22.5301C21.4862 22.823 21.0113 22.823 20.7184 22.5301L17.2372 19.0486C15.6237 20.4197 13.5334 21.2469 11.25 21.2469C6.14154 21.2469 2 17.1066 2 11.9989ZM11.25 4.25098C6.96962 4.25098 3.5 7.72003 3.5 11.9989C3.5 16.2779 6.96962 19.7469 11.25 19.7469C15.5304 19.7469 19 16.2779 19 11.9989C19 7.72003 15.5304 4.25098 11.25 4.25098Z" fill="#343C54"/>
                                </svg>
                                
                        </button>
                    </form>

                </th>

                <th scope="col" class="px-6 py-3">
                    امتیاز
                </th>
                <th scope="col" class="px-6 py-3 ">
                    در حال انجام؟
                </th>
                <th scope="col" class="px-6 py-3 ">
                    کل سفارش
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    عملیات
                </th>
               
            </tr>
        </thead>
        
        <tbody>
            @foreach ($workers as $index => $worker)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $worker->id }}
                </td>
                <td class="px-6 py-4">
                    {{ $worker->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $worker->family }}
                </td>
                <td class="px-6 py-4">
                    @if (!empty($worker->resume))
                        @foreach($worker->resume?->skills as $skill)
                            {{ $skill->name }} ،
                        @endforeach    
                    @endif
                    
                </td>
                <td class="px-6 py-4">
                    9/10
                </td>

                <td class="px-6 py-4">
                    2
                </td>

                <td class="px-6 py-4">
                    5
                </td>

                <td class="px-6 py-4 text-center">
                    @if ($order->workers->contains($worker->id))
                    <button type="submit" disabled class="bg-green-100 py-1 px-4 text-green-600 text-xs rounded-full font-semibold transition-all duration-200">
                        ارجاع شده
                    </button>
                    @else
                    <form action="{{route('admin.orders.assignToWorkers', $order)}}" method="POST">
                        @csrf
                        <input type="hidden" name="worker_id" value="{{$worker->id}}">
                        <button type="submit" class="inline-flex gap-x-2  bg-blue-200 hover:bg-blue-300 duration-200 border border-blue-300  py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                            ارجاع
                            <svg class="" width="15" height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                        </button>
                    </form>
                    @endif
                   
                    
                </td>
                
            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $workers->links() }}
    </div> 

    <div class="flex justify-end items-center gap-x-3 mt-28 ">
        <a href="{{route('admin.orders.show', $order)}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    
    
    

</div>

                                            
@endsection


@php
function statusClass($status) {
    return $status == 'فعال' ? 'text-green-500' : 'text-red-500';
}
@endphp


