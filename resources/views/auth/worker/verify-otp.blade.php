@extends('layouts.worker', ['showSidebar' => false])

@section('content')


  <div class="h-screen w-full  mx-auto  p-3">
    <section class="flex justify-center   ">
      <div class="mx-auto max-w-lg w-full px-6 lg:px-8  py-16 ">
        
        <div class="rounded-2xl bg-white border lg:p-11 p-7">
          @if (session()->has('otp'))
          <div class="bg-green-200 text-green-800 rounded p-3 my-3">
            کد ورود  : <strong>{{ session('otp') }}</strong>
          </div>
          @endif
          <form method="POST" action="{{ route('worker.verify.otp') }}" class=" mx-auto">
            @csrf
            <img src="{{asset('images/logo_full.png')}}" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <label for="otp" class="block mb-2 text-sm font-medium text-gray-900">کد تایید</label>
            <input name="otp" type="number" class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-lg border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" >
            @error('otp') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
            <button type="submit" class="flex  items-center justify-center text-white bg-blue-600 hover:bg-blue-700 duration-200 rounded-lg text-sm px-5 py-2.5 text-center ">ورود به حساب</button>
          </form>

         
          <form action="{{ route('worker.resend.otp') }}" method="POST" class="mt-4 text-end ">
            @csrf
            <button type="submit" class="text-gray-500 text-sm underline">
                ارسال مجدد کد تایید
            </button>
        </form>
        </div>
  
      </div>
    </section>
  </div>



                                            
@endsection

