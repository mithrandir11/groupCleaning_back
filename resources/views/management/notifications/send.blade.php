@extends('layouts.admin')

@section('content')
<div class="grow">
    
    <form action="{{route('admin.notifications.send')}}" method="POST" class="space-y-8">
        @csrf

        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">عنوان</label>
            <input name="title" type="text" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('title') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">پیام</label>
            <textarea name="message" rows="6" class="max-w-sm text-gray-500 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3"></textarea>
            @error('message') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">برای نقش</label>
            <select name="role_id" class="max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:border-blue-500 block w-full p-2.5 ">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{ __('fa.role.'.$role->name) }}</option>   
                @endforeach
              </select>
            @error('role') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        

        <button type="submit" class="flex items-center justify-center text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-sm px-4 py-2 ">
            ارسال پیام   
        </button>
    </form>
    
    
        

</div>

                                            
@endsection



