@extends('layouts.admin')

@section('content')
<div class="  grow">
    
    <div class="flex">
        <a href="{{route('admin.menu.create')}}" type="submit" class="flex items-center gap-x-2 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg text-sm px-4 py-2 ">

            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.2502 6C11.2502 5.58579 11.586 5.25 12.0002 5.25C12.4145 5.25 12.7502 5.58579 12.7502 6V11.2502H18.0007C18.4149 11.2502 18.7507 11.586 18.7507 12.0002C18.7507 12.4145 18.4149 12.7502 18.0007 12.7502H12.7502V18.0007C12.7502 18.4149 12.4145 18.7507 12.0002 18.7507C11.586 18.7507 11.2502 18.4149 11.2502 18.0007V12.7502H6C5.58579 12.7502 5.25 12.4145 5.25 12.0002C5.25 11.586 5.58579 11.2502 6 11.2502H11.2502V6Z" fill="#ffffff"/>
            </svg>
                  
           ایجاد منو جدید
        </a>
    </div>

    

    {{-- <div class="container mx-auto p-4 mt-10" dir="rtl"> --}}
        <h1 class="text-2xl font-bold mb-4 text-right mt-10">منوهای سایت</h1>
        <div class=" p-4">
            {{-- فرض کنید متغیر $menus شامل منوهای سطح بالا (بدون والد) است --}}
            <x-menu.partials :menus="$menus"/>
        </div>
    {{-- </div> --}}



</div>

                                            
@endsection



