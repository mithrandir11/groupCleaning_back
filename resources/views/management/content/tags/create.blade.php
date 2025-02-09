@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4" >
    
    <div class="flex justify-between items-center gap-x-3 mb-10 ">
        <h1 class="text-2xl font-bold mb-4 text-right">ایجاد تگ جدید</h1>
        <a href="{{route('admin.tags')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    

    <form action="{{route('admin.tags.store')}}" method="POST" class="space-y-8">
        @csrf
        <div>
            <label class="block text-right mb-1" for="title">عنوان</label>
            <input type="text" name="title" id="name" 
                   class="border rounded-lg w-full p-3 max-w-sm"
                   value="{{ old('title') }}" >
            @error('title')
                <p class="text-red-600 text-sm ">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <label class="block text-right mb-1" for="slug">اسلاگ (slug)</label>
            <input type="text" name="slug" id="slug" 
                   class="border rounded-lg  w-full p-3 max-w-sm"
                   value="{{ old('slug') }}" >
            @error('slug')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>



        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            ذخیره
        </button>
    </form>
</div>
@endsection
