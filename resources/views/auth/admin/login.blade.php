@extends('layouts.admin', ['showSidebar' => false])

@section('content')


  <div class="w-full  mx-auto  p-3">
    <section class="flex justify-center   ">
      <div class="mx-auto max-w-lg w-full px-6 lg:px-8  py-16 ">
        
        <div class="rounded-2xl bg-white border">
          <form method="POST" action="{{ route('admin.send.otp') }}" class="lg:p-11 p-7 mx-auto">
            @csrf
            <img src="{{asset('images/logo_full.png')}}" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <h5 class="text-xl font-bold leading-tight tracking-tight text-gray-900 mb-8">
              ورود مدیریت <span class="text-sm text-gray-400">( ادمین و اپراتور )</span>
            </h5>
            <label for="cellphone" class="block mb-2 text-sm font-medium text-gray-900">شماره موبایل</label>
            <input type="cellphone" name="cellphone" type="number" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-lg border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" >
            @error('cellphone') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
            <button type="submit" class="flex  items-center justify-center text-white bg-blue-600 hover:bg-blue-700 duration-200 rounded-lg text-sm px-5 py-2.5 text-center ">ورود</button>
          </form>
        </div>
  
      </div>
    </section>
  </div>



                                            
@endsection



{{-- <div class="h-screen w-full  mx-auto  p-3">
  <section class="flex justify-center   ">
    <div class="mx-auto max-w-lg w-full px-6 lg:px-8  py-16 ">
      
      <div class="rounded-2xl bg-white border">
        <form method="POST" action="{{ route('login.admin') }}" class="lg:p-11 p-7 mx-auto">
          @csrf
        
          <img src="{{asset('images/logo_full.png')}}" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
          <label for="cellphone" class="block mb-2 text-sm font-medium text-gray-900">شماره موبایل</label>
          <input type="cellphone" name="cellphone" type="number" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-lg border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" >
          
          <input type="email" name="email" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-lg border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" placeholder="ایمیل">
          <input type="text" name="password" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-lg border-gray-300 border shadow-sm focus:outline-none px-4 mb-1" placeholder="رمز عبور">
          <a  class="flex justify-start mb-6">
            <span class="text-blue-600  text-base font-normal leading-6">رمز عبور را فراموش کرده اید؟</span>
          </a>
          <button type="submit" class="flex  items-center justify-center text-white bg-blue-600 hover:bg-blue-700 duration-200 rounded-lg text-sm px-5 py-2.5 text-center ">ورود به حساب</button>
        </form>
      </div>

    </div>
  </section>
</div> --}}