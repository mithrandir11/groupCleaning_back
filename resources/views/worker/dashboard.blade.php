@extends('layouts.worker')

@section('content')
<div class=" overflow-x-auto  grow">

 

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                {{-- <th scope="col" class="px-6 py-3">
                    ردیف
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    عنوان
                </th>
                <th scope="col" class="px-6 py-3">
                    پیام
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ
                </th>
                {{-- <th scope="col" class="px-6 py-3 text-center">
                    جزئیات
                </th> --}}
            </tr>
        </thead>
        
        <tbody>
            @foreach ($notifications as $index => $notification)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                {{-- <th scope="row" class="px-6 py-4  text-gray-900 whitespace-nowrap ">
                    {{ $notifications->total() - ($notifications->perPage() * ($notifications->currentPage() - 1) + $index) }}
                </th> --}}
                <td class="px-6 py-4">
                    {{ $notification->title }}
                </td>
                <td class="px-6 py-4">
                    {{  $notification->message }}
                </td>
                <td class="px-6 py-4">
                    {{ $notification->created_at }}
                </td>
 
                {{-- <td class="px-6 py-4 text-center">
                    <x-utils.modal title="جزییات پیام" btnTitle="نمایش" btnColor="bg-blue-200">
                        <div>
                            {{$notification->message}}
                        </div>
                    </x-modal>
                </td> --}}

            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $notifications->links() }}
    </div>      

</div>                                       
@endsection