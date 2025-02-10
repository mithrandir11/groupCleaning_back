<div class="grow">
    <h1 class="text-2xl font-bold mb-10 ">ویرایش خدمت</h1>

    <!-- فرم اصلی -->
    <div>
        <!-- عنوان خدمت -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">عنوان انگلیسی:</label>
            <input type="text" wire:model.defer="title"
                   class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('title') border-red-500 @enderror"
                   placeholder="عنوان انگلیسی" required>
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- عنوان فارسی -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">عنوان فارسی:</label>
            <input type="text" wire:model.defer="title_fa"
                   class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('title_fa') border-red-500 @enderror"
                   placeholder="عنوان فارسی" required>
            @error('title_fa')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug:</label>
            <input type="text" wire:model.defer="slug"
                   class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('slug') border-red-500 @enderror"
                   placeholder="Slug" required>
            @error('slug')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <button wire:click.prevent="generateSlug"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                تولید Slug
            </button>
        </div>

        <!-- نوع خدمت -->
        <div class="mb-8">
            <h4 class="font-semibold mb-4 text-right">نوع خدمت:</h4>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">عنوان نوع خدمت:</label>
                <input type="text" wire:model.defer="type.title"
                       class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('type.title') border-red-500 @enderror"
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
                               class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('type.values.' . $index) border-red-500 @enderror"
                               placeholder="مقدار">
                        <button wire:click.prevent="removeTypeValue({{ $index }})"
                                class="ml-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">
                            حذف مقدار
                        </button>
                        @error('type.values.' . $index)
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <button wire:click.prevent="addTypeValue"
                        class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none">
                    افزودن مقدار جدید
                </button>
            </div>
        </div>

        <!-- گزینه‌ها -->
        <div>
            <h4 class="font-semibold mb-4 text-right">گزینه‌های خدمت:</h4>

            @foreach ($options as $index => $option)
                <div class="border  rounded-md p-4 mb-6">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">عنوان گزینه:</label>
                        <input type="text" wire:model.defer="options.{{ $index }}.title"
                               class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('options.' . $index . '.title') border-red-500 @enderror"
                               placeholder="عنوان گزینه" required>
                        @error('options.' . $index . '.title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center mb-4">
                        <label class="mr-2">
                            <input type="checkbox" wire:model.defer="options.{{ $index }}.is_multiple" class="mr-1">
                            چندگزینه‌ای؟
                        </label>
                        <label>
                            <input type="checkbox" wire:model.defer="options.{{ $index }}.is_required" class="mr-1" checked>
                            الزامی؟
                        </label>
                    </div>

                    <!-- مقادیر گزینه -->
                    <div>
                        <h5 class="font-medium mb-2 text-right">مقادیر گزینه:</h5>
                        @foreach ($option['values'] as $valueIndex => $value)
                            <div class="flex items-center mb-4">
                                <input type="text" wire:model.defer="options.{{ $index }}.values.{{ $valueIndex }}"
                                       class="w-full px-4 py-3 border  rounded-md focus:outline-none focus:border-blue-500 @error('options.' . $index . '.values.' . $valueIndex) border-red-500 @enderror"
                                       placeholder="مقدار">
                                <button wire:click.prevent="removeOptionValue({{ $index }}, {{ $valueIndex }})"
                                        class="ml-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">
                                    حذف مقدار
                                </button>
                                @error('options.' . $index . '.values.' . $valueIndex)
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach

                        <button wire:click.prevent="addOptionValue({{ $index }})"
                                class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none">
                            افزودن مقدار جدید
                        </button>

                        <button wire:click.prevent="removeOption({{ $index }})"
                                class="w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none mt-2">
                            حذف گزینه
                        </button>
                    </div>
                </div>
            @endforeach

            <button wire:click.prevent="addOption"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                افزودن گزینه جدید
            </button>
        </div>

        <!-- ذخیره خدمات -->
        <div class="mt-8 text-center">
            <button wire:click.prevent="updateService"
                    class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                به‌روزرسانی خدمت
            </button>
        </div>
    </div>

    <!-- بخش خلاصه (Preview) -->
    <div class="mt-8 border-t  pt-6">
        <h4 class="font-semibold mb-4 text-right">خلاصه خدمات:</h4>

        <!-- عنوان خدمت -->
        <div class="mb-4">
            <strong>عنوان انگلیسی:</strong> {{ $title }}
            <br>
            <strong>عنوان فارسی:</strong> {{ $title_fa }}
            <br>
            <strong>Slug:</strong> {{ $slug }}
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
                    <div class="border  rounded-md p-4 mb-4">
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
</div>