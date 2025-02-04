@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4" >
    <h1 class="text-2xl font-bold mb-4 text-right">ویرایش منو</h1>

    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" class=" p-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-right mb-1" for="name">نام منو</label>
            <input type="text" name="name" id="name" 
                   class="border rounded w-full p-2"
                   value="{{ old('name', $menu->name) }}" required>
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-right mb-1" for="slug">اسلاگ (slug)</label>
            <input type="text" name="slug" id="slug" 
                   class="border rounded w-full p-2"
                   value="{{ old('slug', $menu->slug) }}" required>
            @error('slug')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-right mb-1" for="parent_id">منوی والد (اختیاری)</label>
            <select name="parent_id" id="parent_id" class="border rounded w-full p-2">
                <option value="">بدون والد</option>
                @foreach($allMenus->except($menu->id) as $m)
                    <option value="{{ $m->id }}" {{ (old('parent_id', $menu->parent_id) == $m->id) ? 'selected' : '' }}>
                        {{ $m->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-right mb-1" for="text">توضیحات (اختیاری)</label>
            <textarea name="text" id="text" rows="3" class="border rounded w-full p-2">{{ old('text', $menu->text) }}</textarea>
            @error('text')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            بروزرسانی منو
        </button>
    </form>
</div>
@endsection
