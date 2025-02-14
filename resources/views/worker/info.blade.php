@extends('layouts.worker')

@section('content')
<div class="grow">
    
    <form action="{{route('worker.info.update')}}" method="POST" class="grid grid-cols-2 space-y-8 space-y-reverse">
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
            <input value="{{$user->cellphone}}" disabled name="cellphone" type="text" class="disabled max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('cellphone') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

       
        @if ($user->resume)
            <!-- نام پدر -->
        <div >
            <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900">نام پدر</label>
            <input value="{{ $user->resume->father_name }}" name="father_name" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('father_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- کد ملی -->
        <div >
            <label for="national_code" class="block mb-2 text-sm font-medium text-gray-900">کد ملی</label>
            <input value="{{ $user->resume->national_code }}" name="national_code" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('national_code')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div >
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">شماره تلفن ثابت</label>
            <input value="{{ $user->resume->phone }}" name="phone" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- ایمیل -->
        <div >
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">ایمیل</label>
            <input value="{{ $user->resume->user->email }}" name="email" type="email" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        

        <!-- نام بانک -->
        <div >
            <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">نام بانک</label>
            <input value="{{ $user->resume->bank_name }}" name="bank_name" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('bank_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- شماره شبا -->
        <div >
            <label for="sheba_number" class="block mb-2 text-sm font-medium text-gray-900">شماره شبا</label>
            <input value="{{ $user->resume->sheba_number }}" name="sheba_number" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('sheba_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- آدرس محل سکونت -->
        <div >
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">آدرس محل سکونت</label>
            <textarea name="address" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">{{ $user->resume->address }}</textarea>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

         <!-- همکاری با دیگر شرکت ها-->
        <div >
            <label for="cooperation_with_other_company" class="block mb-2 text-sm font-medium text-gray-900">همکاری با دیگر شرکت ها</label>
            <input value="{{ $user->resume->cooperation_with_other_company }}" name="cooperation_with_other_company" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('cooperation_with_other_company')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- سابقه کاری -->
        <div >
            <label for="work_experience" class="block mb-2 text-sm font-medium text-gray-900">سابقه کاری</label>
            <textarea name="work_experience" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">{{ $user->resume->work_experience }}</textarea>
            @error('work_experience')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- توانایی‌ها -->
        <div >
            <label for="skills" class="block mb-2 text-sm font-medium text-gray-900">توانایی‌ها</label>
            <div class="flex flex-wrap gap-x-3">
                @foreach ($user->resume->skills as $skill)
                <div  class="bg-blue-100  rounded-full px-5 py-1 text-sm">{{ $skill->name }}</div>
                @endforeach
            </div>
            @error('skills')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        
        @endif
        

        <div class="self-end">
            <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                ذخیره تغییرات   
            </button>
        </div>
    </form>
    
    
        

</div>

                                            
@endsection



