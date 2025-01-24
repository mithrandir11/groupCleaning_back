@extends('layouts.admin')

@section('content')
<div class="grow">

    {{-- {{$resume}} --}}
    
    <div class="grid grid-cols-2 gap-8">

        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">نام</label>
            <input value="{{$resume->user->name}}" name="name" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('name') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">نام‌خانوادگی</label>
            <input value="{{$resume->user->family}}" name="family" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('family') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">شماره موبایل</label>
            <input value="{{$resume->user->cellphone}}" name="cellphone" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300  rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('cellphone') 
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

          <!-- نام پدر -->
        <div class="mb-4">
            <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900">نام پدر</label>
            <input value="{{ $resume->father_name }}" name="father_name" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('father_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- کد ملی -->
        <div class="mb-4">
            <label for="national_code" class="block mb-2 text-sm font-medium text-gray-900">کد ملی</label>
            <input value="{{ $resume->national_code }}" name="national_code" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('national_code')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">شماره تلفن ثابت</label>
            <input value="{{ $resume->phone }}" name="phone" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- ایمیل -->
        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">ایمیل</label>
            <input value="{{ $resume->user->email }}" name="email" type="email" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        

        <!-- نام بانک -->
        <div class="mb-4">
            <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">نام بانک</label>
            <input value="{{ $resume->bank_name }}" name="bank_name" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('bank_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- شماره شبا -->
        <div class="mb-4">
            <label for="sheba_number" class="block mb-2 text-sm font-medium text-gray-900">شماره شبا</label>
            <input value="{{ $resume->sheba_number }}" name="sheba_number" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('sheba_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- آدرس محل سکونت -->
        <div class="mb-4">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">آدرس محل سکونت</label>
            <textarea name="address" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">{{ $resume->address }}</textarea>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

         <!-- همکاری با دیگر شرکت ها-->
        <div class="mb-4">
            <label for="cooperation_with_other_company" class="block mb-2 text-sm font-medium text-gray-900">همکاری با دیگر شرکت ها</label>
            <input value="{{ $resume->cooperation_with_other_company }}" name="cooperation_with_other_company" type="text" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
            @error('cooperation_with_other_company')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- سابقه کاری -->
        <div class="mb-4">
            <label for="work_experience" class="block mb-2 text-sm font-medium text-gray-900">سابقه کاری</label>
            <textarea name="work_experience" disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">{{ $resume->work_experience }}</textarea>
            @error('work_experience')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- توانایی‌ها -->
        <div class="mb-4">
            <label for="skills" class="block mb-2 text-sm font-medium text-gray-900">توانایی‌ها</label>
            <div class="flex flex-wrap gap-x-3">
                @foreach ($resume->skills as $skill)
                <div  class="bg-blue-100  rounded-full px-5 py-1 text-sm">{{ $skill->name }}</div>
                @endforeach
                   
                
            </div>
    
            {{-- <select name="skills[]" multiple disabled class="disabled max-w-sm text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
                @foreach($resume->skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $resume->skills->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $skill->name }}</option>
                @endforeach
            </select> --}}
            @error('skills')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

    </div>

    {{-- {{$resume->status}} --}}

    @if ($resume->status == 'تایید شده')
    <form action="{{route('admin.resumes.updateCommission', $resume)}}" method="POST" class="mt-16">
        @csrf
        @method('PUT')
        <label for="commission_rate " class="block text-sm font-medium text-gray-900  mb-2">درصد کمیسیون</label>
        <div class="flex gap-x-3  max-w-sm ">
            <div class="w-full">
                
                <input value="{{ $resume->commission_rate  }}" name="commission_rate" type="number" max="100"  class="  text-gray-700 text-sm border border-gray-300 rounded-lg outline-none focus:border-blue-500 block w-full p-3">
                @error('commission_rate')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="flex items-center  gap-x-2 text-white bg-blue-500 hover:bg-blue-600 duration-200 rounded-lg text-xs px-4 py-1 ">
                ذخیره
            </button>
        </div>
    </form>
    @endif


    <div class="flex justify-end items-center gap-x-3 mt-16 ">
        @if ($resume->status == 'تایید شده') 
        <span class="text-sm px-4 py-2 rounded-lg bg-green-100 text-gray-600">این رزومه تایید شده است</span>
        @else
        <form action="{{route('admin.resumes.approve', $resume)}}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-x-2 text-white bg-green-500 hover:bg-green-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                    <path d="M19.2803 6.76264C19.5732 7.05553 19.5732 7.53041 19.2803 7.8233L9.86348 17.2402C9.57058 17.533 9.09571 17.533 8.80282 17.2402L4.71967 13.157C4.42678 12.8641 4.42678 12.3892 4.71967 12.0963C5.01256 11.8035 5.48744 11.8035 5.78033 12.0963L9.33315 15.6492L18.2197 6.76264C18.5126 6.46975 18.9874 6.46975 19.2803 6.76264Z" fill="#ffffff"/>
                </svg>  
                تایید رزومه و افزودن به کاربران
            </button>
        </form>
        @endif
       
        
        <form action="{{route('admin.resumes.reject', $resume)}}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-x-2 text-white bg-yellow-500 hover:bg-yellow-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                    <path d="M6.21967 7.28033C5.92678 6.98744 5.92678 6.51256 6.21967 6.21967C6.51256 5.92678 6.98744 5.92678 7.28033 6.21967L11.999 10.9384L16.7176 6.2198C17.0105 5.92691 17.4854 5.92691 17.7782 6.2198C18.0711 6.51269 18.0711 6.98757 17.7782 7.28046L13.0597 11.999L17.7782 16.7176C18.0711 17.0105 18.0711 17.4854 17.7782 17.7782C17.4854 18.0711 17.0105 18.0711 16.7176 17.7782L11.999 13.0597L7.28033 17.7784C6.98744 18.0713 6.51256 18.0713 6.21967 17.7784C5.92678 17.4855 5.92678 17.0106 6.21967 16.7177L10.9384 11.999L6.21967 7.28033Z" fill="#ffffff"/>
                </svg>
                رد رزومه
            </button>
        </form>
       

        <form action="{{route('admin.resumes.destroy', $resume)}}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center gap-x-2 text-white bg-red-500 hover:bg-red-600 duration-200 rounded-lg text-sm px-4 py-2 ">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                    <path d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#ffffff"/>
                    <path d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#ffffff"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#ffffff"/>
                </svg>
                حذف رزومه
            </button>
        </form>

        <a href="{{route('admin.resumes')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
        

    </div>
    
    
        

</div>

                                            
@endsection



