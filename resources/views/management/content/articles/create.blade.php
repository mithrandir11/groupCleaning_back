@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4" >
    <h1 class="text-2xl font-bold mb-4 text-right">ایجاد مقاله جدید</h1>
    

    <form action="{{route('admin.articles.store')}}" method="POST" class="space-y-12" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block text-right mb-1" for="title">عنوان</label>
            <input type="text" name="title" id="title" 
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

        
        <div class="form-group">
            <label for="featured_image">تصویر شاخص:</label>
            <input type="file" id="featured_image" name="image" accept="image/*" class="form-control-file">
            <div class="mt-3">
                <img id="preview_image" src="#" alt="پیش‌نمایش تصویر" style="max-width: 200px; display:none;">
            </div>
            @error('image')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="input-group flex flex-wrap justify-between">
            <div>
                <label for="imag-2" class="block mb-2   ">انتخاب تصویر شاخص</label>
                <div class="flex items-center justify-center w-full">
                    <a class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer  hover:bg-gray-100  duration-200">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">برای آپلود کلیک کنید</span> </p>
                           
                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 1MB)</p>
                        </div>
                    </a>
                </div>   
                <input  id="image-2" class="form-control" type="file" name="image">

                <input name="alt" type="text" class="mt-3 border rounded-lg outline-none focus:border-blue-500 block w-full p-4" placeholder="متن جایگزین (alt)">
            </div>
           
            
            <img class="my-3 rounded-md" id="image-preview" src="" alt="تصویر انتخاب شده" style="display: none; max-width: 100%; max-height: 15rem;height: auto;">
            
        </div> --}}


        <div class="flex gap-x-12">
            <div class="flex items-center">
                <input checked  id="radio-active" type="radio" value="1" name="is_visible" class="w-4 h-4">
                <label for="radio-active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>
            </div>
    
            <div class="flex items-center">
                <input id="radio-inactive" type="radio" value="0" name="is_visible" class="w-4 h-4">
                <label for="radio-inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر فعال</label>
            </div>
        </div>
        @error('is_visible')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror



        <div >
            <textarea id="myeditorinstance" name="text"></textarea>
            @error('text')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            ثبت مقاله
        </button>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        document.getElementById('featured_image').addEventListener('change', function (event) {
            const file = event.target.files[0]; // فایل انتخاب شده

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const previewImage = document.getElementById('preview_image');
                    previewImage.src = e.target.result; // تنظیم منبع تصویر
                    previewImage.style.display = 'block'; // نمایش تصویر
                };

                reader.readAsDataURL(file); // خواندن فایل به عنوان Data URL
            } else {
                const previewImage = document.getElementById('preview_image');
                previewImage.src = '#'; // حذف منبع تصویر
                previewImage.style.display = 'none'; // مخفی کردن تصویر
            }
        });
    </script>
@endpush
