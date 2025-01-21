@extends('layouts.admin')

@section('content')
<div class="grow">
    
    <form action="{{route('admin.users.update', $user)}}" method="POST" class="space-y-8">
        @csrf

        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">نام</label>
            <input value="{{$user->name}}" name="name" type="text" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('name') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">نام‌خانوادگی</label>
            <input value="{{$user->family}}" name="family" type="text" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('family') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">شماره موبایل</label>
            <input value="{{$user->cellphone}}" name="cellphone" type="text" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('cellphone') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        
        <div class="flex gap-x-12">
            <div class="flex items-center">
                <input @checked($user->status == 'فعال') id="radio-active" type="radio" value="active" name="status" class="w-4 h-4">
                <label for="radio-active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>
            </div>
    
            <div class="flex items-center">
                <input @checked($user->status == 'غیرفعال') id="radio-inactive" type="radio" value="inactive" name="status" class="w-4 h-4">
                <label for="radio-inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر فعال</label>
            </div>
        </div>

        <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
            ذخیره تغییرات   
        </button>
    </form>
    
    
        

</div>

                                            
@endsection



