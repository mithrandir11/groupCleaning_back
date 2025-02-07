@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4" >
    <div class="flex justify-between items-center gap-x-3 mb-10 ">
        <h1 class="text-2xl font-bold mb-4 text-right">ویرایش مقاله</h1>
        <a href="{{route('admin.articles')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>
    

    <form action="{{route('admin.articles.update', $article)}}" method="POST" class="space-y-12" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            <label class="block text-right mb-1" for="title">عنوان</label>
            <input type="text" name="title" id="title" 
                   class="border rounded-lg w-full p-3 max-w-sm"
                   value="{{ old('title', $article->title) }}" >
            @error('title')
                <p class="text-red-600 text-sm ">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <label class="block text-right mb-1" for="slug">اسلاگ (slug)</label>
            <input type="text" name="slug" id="slug" 
                   class="border rounded-lg  w-full p-3 max-w-sm"
                   value="{{ old('slug', $article->slug) }}" >
            @error('slug')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        {{-- <div class="form-group">
            <label for="featured_image">تصویر شاخص:</label>
            <input type="file" id="featured_image" name="image" accept="image/*" class="form-control-file">
            <div class="mt-3">
                <img id="preview_image" src="{{$article->image}}" alt="پیش‌نمایش تصویر" style="max-width: 200px; display:none;">
            </div>
            @error('image')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div> --}}
        {{-- {{$article->image}} --}}
        {{-- <input type="file" name="image" > --}}

        <div class="form-group">
            <label for="featured_image">تصویر شاخص:</label>
            <input type="file" id="featured_image" name="image" value="aasdfsadf" accept="image/*" class="form-control-file">
            <div class="mt-3">
                <img id="preview_image" src="{{ $article->image ?? '' }}" alt="پیش‌نمایش تصویر" style="max-width: 200px; display:{{ $article->image ? 'block' : 'none' }};">
            </div>
            @error('image')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-x-12">
            <div class="flex items-center">
                <input @checked($article->is_visible)  id="radio-active" type="radio" value="1" name="is_visible" class="w-4 h-4">
                <label for="radio-active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>
            </div>
    
            <div class="flex items-center">
                <input @checked(!$article->is_visible) id="radio-inactive" type="radio" value="0" name="is_visible" class="w-4 h-4">
                <label for="radio-inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">غیر فعال</label>
            </div>
        </div>
        @error('is_visible')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror



        <div >
            <textarea id="myeditorinstance" name="text">{{$article->text}}</textarea>
            @error('text')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            بروزرسانی مقاله
        </button>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        // document.getElementById('featured_image').addEventListener('change', function (event) {
        //     const file = event.target.files[0]; // فایل انتخاب شده

        //     if (file) {
        //         const reader = new FileReader();

        //         reader.onload = function (e) {
        //             const previewImage = document.getElementById('preview_image');
        //             previewImage.src = e.target.result; // تنظیم منبع تصویر
        //             previewImage.style.display = 'block'; // نمایش تصویر
        //         };

        //         reader.readAsDataURL(file); // خواندن فایل به عنوان Data URL
        //     } else {
        //         const previewImage = document.getElementById('preview_image');
        //         previewImage.src = '#'; // حذف منبع تصویر
        //         previewImage.style.display = 'none'; // مخفی کردن تصویر
        //     }
        // });

        document.addEventListener('DOMContentLoaded', function () {
        const featuredImageInput = document.getElementById('featured_image');
        const previewImage = document.getElementById('preview_image');

        // نمایش تصویر موجود (اگر وجود دارد)
        if (previewImage.src !== '') {
            previewImage.style.display = 'block';
        }

        // نمایش پیش‌نمایش تصویر جدید
        featuredImageInput.addEventListener('change', function (event) {
            const file = event.target.files[0]; // فایل انتخاب شده

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result; // تنظیم منبع تصویر
                    previewImage.style.display = 'block'; // نمایش تصویر
                };

                reader.readAsDataURL(file); // خواندن فایل به عنوان Data URL
            } else {
                previewImage.src = ''; // حذف منبع تصویر
                previewImage.style.display = 'none'; // مخفی کردن تصویر
            }
        });
    });
    </script>
@endpush
