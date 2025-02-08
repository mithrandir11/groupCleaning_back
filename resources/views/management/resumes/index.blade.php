@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    <div class="max-w-sm ">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
        <form action="{{route('admin.resumes')}}" method="GET" class="relative">
            
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="search" type="text" id="default-search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none  focus:border-blue-500" placeholder="کد ملی ..."  />
            <button type="submit" class="text-white absolute end-2 bottom-1.5 bg-gray-500 hover:bg-gray-600 duration-200  outline-none  font-medium rounded-lg text-xs px-3 py-2">جستجو</button>
        </form>
    </div>
    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    نام
                </th>
                <th scope="col" class="px-6 py-3">
                    نام‌خانوادگی
                </th>
                <th scope="col" class="px-6 py-3">
                    کد ملی
                </th>
                <th scope="col" class="px-6 py-3">
                    شماره موبایل
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>
                <th scope="col" class="px-6 py-3">
                    درصد کمیسیون
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ ثبت روزمه
                </th>

                <th scope="col" class="px-6 py-3 text-center">
                    جزییات
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($resumes as $index => $resume)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $resume->user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->user->family }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->national_code }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->user->cellphone }}
                </td>
                <td class="px-6 py-4 {{ statusClass($resume->status) }}">
                    {{ $resume->status }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->commission_rate }}
                </td>
                <td class="px-6 py-4">
                    {{ $resume->created_at }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.resumes.show',$resume)}}"  type="button" class="bg-blue-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        مشاهده
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




