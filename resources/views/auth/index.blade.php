@extends('layouts.admin', ['showSidebar' => false])

@section('content')


  <div class=" w-full  mx-auto  pt-12">
    <section class="flex justify-center gap-8  ">
      {{-- @if (session()->has('error'))
      <div class="bg-red-200 text-red-600 rounded p-3 mt-3">
          {{ session('error') }}
      </div>
      @endif --}}
        <div class="max-w-md rounded-2xl w-full  self-start">
          <div class="lg:p-11 p-7 mx-auto">

            <img src="{{asset('images/logo_full.png')}}" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            
            <a href="{{route('admin.login.form')}}" class="block w-full py-4 text-white text-center text-base font-semibold leading-6 rounded-2xl hover:bg-green-500 transition-all duration-700 bg-green-400 shadow-sm mb-4">ورود مدیریت</a>
            <a href="{{route('worker.login.form')}}" class="block w-full py-4 text-white text-center text-base font-semibold leading-6 rounded-2xl hover:bg-yellow-700 transition-all duration-700 bg-yellow-600 shadow-sm ">ورود متخصص</a>
            
          </div>
        </div>

        <img class="rounded-2xl h-96" src="{{asset('images/bg.png')}}" alt="">
    </section>
  </div>



                                            
@endsection