@extends('layouts.admin', ['showSidebar' => false])

@section('content')


  <div class="h-screen w-full  mx-auto  p-3">
    <section class="flex justify-center   ">
      <div class="mx-auto max-w-lg px-6 lg:px-8  py-16 ">
        
        <div class="rounded-2xl bg-white border shadow-xl">
          <form method="POST" action="{{ route('login.worker') }}" class="lg:p-11 p-7 mx-auto">
            @csrf
            <img src="{{asset('images/logo_full.png')}}" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <input type="email" name="email" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" placeholder="ایمیل">
            <input type="text" name="password" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-1" placeholder="رمز عبور">
            <a  class="flex justify-start mb-6">
              <span class="text-blue-600  text-base font-normal leading-6">رمز عبور را فراموش کرده اید؟</span>
            </a>
            <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-blue-800 transition-all duration-700 bg-blue-600 shadow-sm ">ورود به حساب</button>
          </form>
        </div>
  
      </div>
    </section>
  </div>



                                            
@endsection