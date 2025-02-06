@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4" >
    <h1 class="text-2xl font-bold mb-4 text-right">ویرایش صفحه پیشنهادی جدید</h1>
    

    <form action="{{route('admin.suggestedPages.store')}}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-right mb-1" for="title">عنوان</label>
            <input type="text" name="title" id="name" 
                   class="border rounded-lg w-full p-3 max-w-sm"
                   value="{{ old('title', $) }}" >
            @error('title')
                <p class="text-red-600 text-sm ">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <label class="block text-right mb-1" for="url">لینک (url)</label>
            <input type="text" name="url" id="url" 
                   class="border rounded-lg  w-full p-3 max-w-sm"
                   value="{{ old('url') }}" >
            @error('url')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div >
            <label class="block text-right mb-1" for="menu_id">منو</label>
            <select name="menu_id" id="menu_id" class="border rounded-lg  w-full p-3 max-w-sm">
                <option value=""></option>
                @foreach($allMenus as $m)
                    <option value="{{ $m->id }}" {{ old('menu_id') == $m->id ? 'selected' : '' }}>
                        {{ $m->name }}
                    </option>
                @endforeach
            </select>
            @error('menu_id')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

       


        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            ثبت صفحه پیشنهادی
        </button>
    </form>
</div>
@endsection
