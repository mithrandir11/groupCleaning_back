<div x-data="{ showModal: false }">
    <!-- دکمه باز کردن مدال -->
    <button @click="showModal = true" type="button" class="{{ $btnColor }} py-1 px-4 text-black text-xs rounded-full font-semibold transition-all duration-200">
        {{ $btnTitle }}
    </button>

    <!-- مدال -->
    <div  x-cloak x-show="showModal" class="pd-overlay bg-black bg-opacity-10 w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="ease-out opacity-100 transition-all duration-500 md:max-w-3xl md:w-full m-3 md:mx-auto mt-20">
            <div class="flex flex-col bg-white min-h-60 rounded-2xl py-6 px-5">
                <!-- هدر مدال -->
                <div class="flex justify-between items-center pb-4 border-b border-gray-200 mb-6">
                    <h4 class="text-sm text-gray-900 font-bold">{{ $title }}</h4>
                    <button @click="showModal = false" class="block cursor-pointer close-modal-button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.75732 7.75739L16.2426 16.2427M16.2426 7.75739L7.75732 16.2427" stroke="black" stroke-width="1.6" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- محتوای مدال -->
                {{ $slot }}

                <!-- فوتر مدال (اختیاری) -->
                <!-- <div class="flex items-center justify-end pt-4 border-t border-gray-200 space-x-4">
                    <button type="button" class="py-2.5 px-5 text-xs bg-blue-50 text-blue-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-blue-100 close-modal-button" @click="showModal = false">Cancel</button>
                    <button type="button" class="py-2.5 px-5 text-xs bg-blue-500 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-blue-700 close-modal-button" @click="showModal = false">Okay, got it</button>
                </div> -->
            </div>
        </div>
    </div>
</div>