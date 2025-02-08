@extends('layouts.admin')

@section('content')
<div class="grow">

    <div class="flex justify-end items-center gap-x-3 mb-10 ">
        <a href="{{route('admin.users')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    
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

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900" for="role_id">وضعیت کاربر</label>
            <div class="flex gap-x-12">
                <div class="flex items-center">
                    <input @checked($user->status == 'active') id="radio-active" type="radio" value="active" name="status" class="w-4 h-4">
                    <label for="radio-active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>
                </div>
        
                <div class="flex items-center">
                    <input @checked($user->status == 'inactive') id="radio-inactive" type="radio" value="inactive" name="status" class="w-4 h-4">
                    <label for="radio-inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر فعال</label>
                </div>
            </div>
        </div>
        

        <div class="bg-yellow-50 max-w-sm w-full p-3 rounded-lg">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="role_id">فعال کردن اپراتور</label>
            <div class="flex gap-x-12">
                <div class="flex items-center">
                    <input @checked($user->hasRole('operator')) id="radio-active-operator" type="radio" value="1" name="is_operator" class="w-4 h-4">
                    <label for="radio-active-operator" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>
                </div>
        
                <div class="flex items-center">
                    <input @checked(!$user->hasRole('operator')) id="radio-inactive-operator" type="radio" value="0" name="is_operator" class="w-4 h-4">
                    <label for="radio-inactive-operator" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر فعال</label>
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="role_id">نقش های فعلی</label>
                <ul>
                    @foreach ($user->roles as $role)
                    <li class="text-gray-500 text-sm">  {{ __('fa.role.'.$role->name) }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

      

        <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
            ذخیره تغییرات   
        </button>
    </form>
    
    
        

</div>

                                            
@endsection



