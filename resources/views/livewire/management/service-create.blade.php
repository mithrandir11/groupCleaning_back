<div class="grow">
    
        <h1 class="text-2xl font-bold mb-10 ">ایجاد خدمت جدید</h1>
    
        <!-- عنوان خدمت -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">عنوان انگلیسی:</label>
            <input type="text" wire:model.defer="title"
                   class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror"
                   placeholder="عنوان انگلیسی" required>
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- عنوان فارسی -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">عنوان فارسی:</label>
            <input type="text" wire:model.defer="title_fa"
                   class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('title_fa') border-red-500 @enderror"
                   placeholder="عنوان فارسی" required>
            @error('title_fa')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <!-- Slug -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug:</label>
            <input type="text" wire:model.defer="slug"
                   class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="Slug" required>
            @error('slug')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            {{-- <button wire:click.prevent="generateSlug"
                    class="mt-2 px-4 py-3 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 focus:outline-none">
                تولید Slug
            </button> --}}
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">تصویر:</label>
            <input type="file" wire:model="image">
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if ($image) 
            <img src="{{ $image->temporaryUrl() }}" class="border rounded-lg h-24">
        @endif
        <div wire:loading wire:target="image" class="text-xs">در حال آپلود تصویر ...</div>
    
        <!-- نوع خدمت -->
        <div class="my-12 border-y border-dashed py-8 border-gray-300">
            <h4 class="font-semibold mb-4 text-right">نوع خدمت:</h4>
    
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">عنوان نوع خدمت:</label>
                <input type="text" wire:model.defer="type.title"
                       class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('type.title') border-red-500 @enderror"
                       placeholder="عنوان نوع خدمت">
                @error('type.title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- مقادیر نوع خدمت -->
            <div>
                <h5 class="font-medium mb-2 text-right">مقادیر نوع خدمت:</h5>
                @foreach ($type['values'] as $index => $value)
                    <div class="flex items-center mb-4">
                        <input type="text" wire:model.defer="type.values.{{ $index }}"
                               class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('type.values.' . $index) border-red-500 @enderror"
                               placeholder="مقدار">
                        <button wire:click.prevent="removeTypeValue({{ $index }})"
                                class="mr-2 px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#ffffff"/>
                                    <path d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#ffffff"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#ffffff"/>
                                </svg>
                                    
                                    
                            {{-- حذف مقدار --}}
                        </button>
                        @error('type.values.' . $index)
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
    
                <button wire:click.prevent="addTypeValue"
                        class=" px-4 py-2 text-sm bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                    افزودن مقدار جدید
                </button>
            </div>
        </div>
    
        <!-- گزینه‌های خدمت -->
        <div>
            <div class="flex gap-x-3 items-center mb-4">
                <h4 class="font-semibold  text-right">گزینه‌های خدمت:</h4>
                <button wire:click.prevent="addOption"
                        class=" px-4 py-2 text-sm bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none">
                    افزودن گزینه جدید
                </button>
            </div>
    
            @foreach ($options as $index => $option)
                <div class="border bg-gray-50  rounded-lg p-4 mb-6">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">عنوان گزینه:</label>
                        <input type="text" wire:model.defer="options.{{ $index }}.title"
                               class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('options.' . $index . '.title') border-red-500 @enderror"
                               placeholder="عنوان گزینه" required>
                        @error('options.' . $index . '.title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="flex items-center mb-4">
                        <label class="mr-2">
                            <input type="checkbox" wire:model.defer="options.{{ $index }}.is_multiple" >
                            چندگزینه‌ای؟
                        </label>
                        <label>
                            <input type="checkbox" wire:model.defer="options.{{ $index }}.is_required" class="mr-4" checked>
                            الزامی؟
                        </label>
                    </div>
    
                    <!-- مقادیر گزینه -->
                    <div>
                        <h5 class="font-medium mb-2 text-right">مقادیر گزینه:</h5>
                        @foreach ($option['values'] as $valueIndex => $value)
                            <div class="flex items-center mb-4">
                                <input type="text" wire:model.defer="options.{{ $index }}.values.{{ $valueIndex }}"
                                       class="w-full max-w-lg px-4 py-3 border  rounded-lg focus:outline-none focus:border-blue-500 @error('options.' . $index . '.values.' . $valueIndex) border-red-500 @enderror"
                                       placeholder="مقدار">
                                <button wire:click.prevent="removeOptionValue({{ $index }}, {{ $valueIndex }})"
                                        class="mr-2 px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                            <path d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#ffffff"/>
                                            <path d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#ffffff"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#ffffff"/>
                                        </svg>
                                </button>
                                @error('options.' . $index . '.values.' . $valueIndex)
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
    
                        <button wire:click.prevent="addOptionValue({{ $index }})"
                                class=" px-4 py-2 text-sm bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                            افزودن مقدار جدید
                        </button>
    
                        <button wire:click.prevent="removeOption({{ $index }})"
                                class=" px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none ">
                            حذف گزینه
                            {{-- <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z" fill="#ffffff"/>
                                <path d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z" fill="#ffffff"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z" fill="#ffffff"/>
                            </svg> --}}
                        </button>
                    </div>
                </div>
            @endforeach
    
            
        </div>



        <!-- بخش Preview -->
        <div class="mt-8 border-t border-dashed border-gray-300 pt-6">
            <h4 class="font-semibold mb-4 text-right">خلاصه خدمات:</h4>

            <!-- عنوان خدمت -->
            <div class="mb-4">
                <strong>عنوان انگلیسی:</strong> {{ $title }}
                <br>
                <strong>عنوان فارسی:</strong> {{ $title_fa }}
                <br>
                <strong>اسلاگ (Slug):</strong> {{ $slug }}
            </div>

            <!-- نوع خدمت -->
            <div class="mb-6">
                <h5 class="font-medium mb-2 text-right">نوع خدمت:</h5>
                @if (!empty($type['title']))
                    <div>
                        <strong>عنوان نوع:</strong> {{ $type['title'] }}
                        <ul class="list-disc list-inside mt-2">
                            @foreach ($type['values'] as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-gray-500 text-sm">هنوز نوع خدمت تعریف نشده است.</p>
                @endif
            </div>

            <!-- گزینه‌ها -->
            <div>
                <h5 class="font-medium mb-2 text-right">گزینه‌ها:</h5>
                @if (!empty($options))
                    @foreach ($options as $index => $option)
                        <div class="border border-gray-300 rounded-md p-4 mb-4">
                            <strong>عنوان گزینه:</strong> {{ $option['title'] }}
                            <br>
                            <strong>چندگزینه‌ای:</strong> {{ $option['is_multiple'] ? 'بله' : 'خیر' }}
                            <br>
                            <strong>الزامی:</strong> {{ $option['is_required'] ? 'بله' : 'خیر' }}
                            <br>
                            <strong>مقادیر:</strong>
                            <ul class="list-disc list-inside mt-2">
                                @foreach ($option['values'] as $value)
                                    <li>{{ $value }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-sm">هنوز گزینه‌ای تعریف نشده است.</p>
                @endif
            </div>
        </div>




        <div class="flex justify-end items-center gap-x-3 mt-16 ">
            
            <!-- ذخیره خدمات -->
            
                <button wire:click.prevent="saveService"
                        class="px-4 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                    ذخیره خدمت
                </button>
        

            <a href="{{route('admin.services')}}" class="flex items-center gap-x-2 border duration-200 rounded-lg text-sm px-4 py-2 ">
                بارگشت
                <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                    <path d="M3.57813 12.4981C3.5777 12.6905 3.65086 12.8831 3.79761 13.0299L9.7936 19.0301C10.0864 19.3231 10.5613 19.3233 10.8543 19.0305C11.1473 18.7377 11.1474 18.2629 10.8546 17.9699L6.13418 13.2461L20.3295 13.2461C20.7437 13.2461 21.0795 12.9103 21.0795 12.4961C21.0795 12.0819 20.7437 11.7461 20.3295 11.7461L6.14168 11.7461L10.8546 7.03016C11.1474 6.73718 11.1473 6.2623 10.8543 5.9695C10.5613 5.6767 10.0864 5.67685 9.79362 5.96984L3.84392 11.9233C3.68134 12.0609 3.57812 12.2664 3.57812 12.4961L3.57813 12.4981Z" fill="#343C54"/>
                </svg>
            </a>
            
    
        </div>

    
       
   
</div>
