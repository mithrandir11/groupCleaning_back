@extends('layouts.admin')

@section('content')
<div class=" overflow-x-auto  grow">

 

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
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
            @foreach ($activities as $index => $activity)
            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                <td class="px-6 py-4">
                    {{ $activity->subject }}
                </td>
                <td class="px-6 py-4">
                    {{  $activity->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $activity->created_at }}
                </td>
 
                {{-- <td class="px-6 py-4 text-center">
                    <x-utils.modal title="جزییات پیام" btnTitle="نمایش" btnColor="bg-blue-200">
                        <div>
                            {{$activity->description}}
                        </div>
                    </x-modal>
                </td> --}}

            </tr>
            @endforeach        
           
        </tbody>
    </table>  

    <div class="mt-4">
        {{ $activities->links() }}
    </div>      

</div>                                       
@endsection