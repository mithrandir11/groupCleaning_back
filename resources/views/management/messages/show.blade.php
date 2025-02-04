@extends('layouts.admin')

@section('content')
<div class="grow">

    <div class="flex justify-end items-center gap-x-3 mb-4 ">
        <a href="{{route('admin.messages')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
            بارگشت
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
            </svg>
        </a>
    </div>


    <div style="height: 40rem" class="ltr overflow-y-auto w-full flex flex-col-reverse  border p-4 lg:p-8 rounded-lg">

        

        @foreach ($messages as $message)
        @if (!$message->sender_id)
        <div class="flex gap-2.5 justify-end ">
            <div class="">
                <div class="grid mb-2">
                    <h5 class="text-right text-gray-900 text-sm font-semibold leading-snug pb-1">شما</h5>
                    <div class="px-3 py-2 bg-blue-600 rounded">
                    <h2 class="text-white text-sm font-normal leading-snug max-w-lg text-right">{{$message->message}}</h2>
                    </div>
                    <div class="justify-start items-center inline-flex">
                    <h3 class="text-gray-500 text-xs font-normal leading-4 py-1">{{ $message->created_at }}</h3>
                    </div>
                </div>
            </div>
            <img src="https://pagedone.io/asset/uploads/1704091591.png" alt="Hailey image" class="w-10 h-11">
        </div> 
        @else
        <div class="grid ">
            <div class="flex gap-2.5 mb-4">
                <img src="https://pagedone.io/asset/uploads/1710412177.png" alt="Shanay image" class="w-10 h-11">
                <div class="grid">
                    <h5 class="text-gray-900 text-sm font-semibold leading-snug pb-1">{{$message->user->name ?? ''}}</h5>
                    <div class="w-max grid">
                    <div class="px-3.5 py-2 bg-gray-100 rounded justify-start  items-center gap-3 inline-flex">
                        <h5 class="text-gray-900 text-sm font-normal leading-snug text-right">{{$message->message}}</h5>
                    </div>
                    <div class="justify-end items-center inline-flex mb-2.5">
                        <h6 class="text-gray-500 text-xs font-normal leading-4 py-1">{{ $message->created_at }}</h6>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @endforeach
    </div>  

    <form action="{{route('admin.messages.store', $message->conversation)}}" method="POST" class=" w-full pr-3 pl-2 py-2 mt-3 rounded-lg border border-gray-200 items-center gap-2 inline-flex justify-between">
        @csrf
        {{-- <div class="flex items-center gap-2"> --}}
            <input name="message" class="grow shrink basis-0 text-black text-sm font-medium leading-4 focus:outline-none" placeholder="متن شما...">
            
        {{-- </div> --}}
        
        <div class="flex items-center gap-2">
            <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <g id="Attach 01">
                <g id="Vector">
                    <path d="M14.9332 7.79175L8.77551 14.323C8.23854 14.8925 7.36794 14.8926 6.83097 14.323C6.294 13.7535 6.294 12.83 6.83097 12.2605L12.9887 5.72925M12.3423 6.41676L13.6387 5.04176C14.7126 3.90267 16.4538 3.90267 17.5277 5.04176C18.6017 6.18085 18.6017 8.02767 17.5277 9.16676L16.2314 10.5418M16.8778 9.85425L10.72 16.3855C9.10912 18.0941 6.49732 18.0941 4.88641 16.3855C3.27549 14.6769 3.27549 11.9066 4.88641 10.198L11.0441 3.66675" stroke="#9CA3AF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.9332 7.79175L8.77551 14.323C8.23854 14.8925 7.36794 14.8926 6.83097 14.323C6.294 13.7535 6.294 12.83 6.83097 12.2605L12.9887 5.72925M12.3423 6.41676L13.6387 5.04176C14.7126 3.90267 16.4538 3.90267 17.5277 5.04176C18.6017 6.18085 18.6017 8.02767 17.5277 9.16676L16.2314 10.5418M16.8778 9.85425L10.72 16.3855C9.10912 18.0941 6.49732 18.0941 4.88641 16.3855C3.27549 14.6769 3.27549 11.9066 4.88641 10.198L11.0441 3.66675" stroke="black" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M14.9332 7.79175L8.77551 14.323C8.23854 14.8925 7.36794 14.8926 6.83097 14.323C6.294 13.7535 6.294 12.83 6.83097 12.2605L12.9887 5.72925M12.3423 6.41676L13.6387 5.04176C14.7126 3.90267 16.4538 3.90267 17.5277 5.04176C18.6017 6.18085 18.6017 8.02767 17.5277 9.16676L16.2314 10.5418M16.8778 9.85425L10.72 16.3855C9.10912 18.0941 6.49732 18.0941 4.88641 16.3855C3.27549 14.6769 3.27549 11.9066 4.88641 10.198L11.0441 3.66675" stroke="black" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                </g>
            </svg>
            <button type="submit" class="items-center flex px-3 py-3 bg-blue-600 rounded-lg shadow ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g id="Send 01">
                        <path id="icon" d="M9.04071 6.959L6.54227 9.45744M6.89902 10.0724L7.03391 10.3054C8.31034 12.5102 8.94855 13.6125 9.80584 13.5252C10.6631 13.4379 11.0659 12.2295 11.8715 9.81261L13.0272 6.34566C13.7631 4.13794 14.1311 3.03408 13.5484 2.45139C12.9657 1.8687 11.8618 2.23666 9.65409 2.97257L6.18714 4.12822C3.77029 4.93383 2.56187 5.33664 2.47454 6.19392C2.38721 7.0512 3.48957 7.68941 5.69431 8.96584L5.92731 9.10074C6.23326 9.27786 6.38623 9.36643 6.50978 9.48998C6.63333 9.61352 6.72189 9.7665 6.89902 10.0724Z" stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </g>
                </svg>
                <h3 class="text-white text-xs font-semibold leading-4 px-2">ارسال</h3>
            </button>
        </div>

        
        
    </form>  


    <div class="w-full">
        @error('message') 
            <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
    </div>
</div>



                                            
@endsection

