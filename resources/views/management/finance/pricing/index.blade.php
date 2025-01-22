@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">
    

    
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    کد سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    نوع سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    نام شخص
                </th>
                <th scope="col" class="px-6 py-3">
                    کد شخص
                </th>
                <th scope="col" class="px-6 py-3">
                    قیمت
                </th>
                <th scope="col" class="px-6 py-3 ">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3 ">
                    توضیحات
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    مشاهده
                </th>
            </tr>
        </thead>
        
        {{-- <tbody>
            @foreach ($users as $index => $user)
            <tr x-data="{ open: false }" v-for="(order, index) in data.data" class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->family }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->cellphone }}
                </td>
                <td class="px-6 py-4">
                    @foreach($user->roles as $role)
                        {{ $role->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td class="px-6 py-4 {{ statusClass($user->status) }}">
                    {{ $user->status }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->created_at }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{route('admin.users.edit', $user)}}"  type="button" class="bg-yellow-100 py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
                        ویرایش
                    </a>
                </td>
            </tr>
            @endforeach        
           
        </tbody> --}}
    </table>  

    {{-- <div class="mt-4">
        {{ $users->links() }}
    </div>       --}}

</div>

                                            
@endsection



