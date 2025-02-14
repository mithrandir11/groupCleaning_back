@php
    $pendingOrdersCount = \App\Models\Order::getPendingCount();
    $messagesCount = \App\Models\Message::getMessageCount();
@endphp
<aside class="w-72 p-4 border bg-gray-50 border-gray-300 rounded-lg flex-col justify-start items-start gap-6 inline-flex self-start">
    <div class="w-full justify-between items-center gap-2.5 inline-flex ">
       
            <p class="font-bold">پروفایل مدیریت</p>
       
        <div class="w-6 h-6 relative ">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Menu">
                    <rect width="24" height="24"  />
                    <path id="icon" d="M13 6H21M3 12H21M7 18H21" stroke="#1F2937" stroke-width="1.6" stroke-linecap="round" />
                </g>
            </svg>
        </div>
    </div>

    <div class="w-full ">
        
        <ul class="flex-col gap-y-4 flex">

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.dashboard')}}" class="@if (isActiveRoute(['admin.dashboard'])) bg-gray-200 @endif flex-col flex rounded-lg p-3"
                   
                    >
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.60352 3.25C4.36088 3.25 3.35352 4.25736 3.35352 5.5V8.99998C3.35352 10.2426 4.36087 11.25 5.60352 11.25H9.10352C10.3462 11.25 11.3535 10.2426 11.3535 8.99998V5.5C11.3535 4.25736 10.3462 3.25 9.10352 3.25H5.60352ZM4.85352 5.5C4.85352 5.08579 5.1893 4.75 5.60352 4.75H9.10352C9.51773 4.75 9.85352 5.08579 9.85352 5.5V8.99998C9.85352 9.41419 9.51773 9.74998 9.10352 9.74998H5.60352C5.1893 9.74998 4.85352 9.41419 4.85352 8.99998V5.5Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.60352 12.75C4.36088 12.75 3.35352 13.7574 3.35352 15V18.5C3.35352 19.7426 4.36087 20.75 5.60352 20.75H9.10352C10.3462 20.75 11.3535 19.7426 11.3535 18.5V15C11.3535 13.7574 10.3462 12.75 9.10352 12.75H5.60352ZM4.85352 15C4.85352 14.5858 5.1893 14.25 5.60352 14.25H9.10352C9.51773 14.25 9.85352 14.5858 9.85352 15V18.5C9.85352 18.9142 9.51773 19.25 9.10352 19.25H5.60352C5.1893 19.25 4.85352 18.9142 4.85352 18.5V15Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8535 5.5C12.8535 4.25736 13.8609 3.25 15.1035 3.25H18.6035C19.8462 3.25 20.8535 4.25736 20.8535 5.5V8.99998C20.8535 10.2426 19.8462 11.25 18.6035 11.25H15.1035C13.8609 11.25 12.8535 10.2426 12.8535 8.99998V5.5ZM15.1035 4.75C14.6893 4.75 14.3535 5.08579 14.3535 5.5V8.99998C14.3535 9.41419 14.6893 9.74998 15.1035 9.74998H18.6035C19.0177 9.74998 19.3535 9.41419 19.3535 8.99998V5.5C19.3535 5.08579 19.0177 4.75 18.6035 4.75H15.1035Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1035 12.75C13.8609 12.75 12.8535 13.7574 12.8535 15V18.5C12.8535 19.7426 13.8609 20.75 15.1035 20.75H18.6035C19.8462 20.75 20.8535 19.7426 20.8535 18.5V15C20.8535 13.7574 19.8462 12.75 18.6035 12.75H15.1035ZM14.3535 15C14.3535 14.5858 14.6893 14.25 15.1035 14.25H18.6035C19.0177 14.25 19.3535 14.5858 19.3535 15V18.5C19.3535 18.9142 19.0177 19.25 18.6035 19.25H15.1035C14.6893 19.25 14.3535 18.9142 14.3535 18.5V15Z" fill="#343C54"/>
                                </svg>
                                    
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">میزکار</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.services')}}" class="@if (isActiveRoute(['admin.services', 'admin.services.create', 'admin.services.edit'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3744 3.99973L13.276 3.40701C13.2129 3.02736 12.8845 2.74902 12.4996 2.74902C12.1151 2.74902 11.7869 3.02695 11.7235 3.40625L11.6243 3.99973H6.66406C6.24985 3.99973 5.91406 4.33552 5.91406 4.74973V8.93333C5.91406 9.34754 6.24985 9.68333 6.66406 9.68333H10.374L9.8357 19.6281C9.76595 20.9167 10.792 21.9997 12.0824 21.9997H12.9156C14.2061 21.9997 15.2321 20.9167 15.1623 19.6281L14.6241 9.68333H18.3349C18.7492 9.68333 19.0849 9.34754 19.0849 8.93333V8.74973C19.0849 6.12638 16.9583 3.99973 14.335 3.99973H13.3744ZM13.1219 9.68333H11.8762L11.3335 19.7092C11.3103 20.1387 11.6523 20.4997 12.0824 20.4997H12.9156C13.3458 20.4997 13.6878 20.1387 13.6645 19.7092L13.1219 9.68333ZM17.5358 8.18333C17.2678 6.65842 15.9367 5.49973 14.335 5.49973H7.41406V8.18333H17.5358Z" fill="#343C54"/>
                                </svg>   
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت خدمات</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.orders')}}" class="@if (isActiveRoute(['admin.orders','admin.orders.show', 'admin.orders.assignOrderToWorker.show'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                {{-- @if ($pendingOrdersCount > 0)
                                    <span class="absolute -top-1 -left-1 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        {{ $pendingOrdersCount }}
                                    </span>
                                @endif --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20" fill="none">
                                    <g id="Cube 01">
                                        <path id="icon" d="M2.78223 5.83329C2.52965 6.27072 2.52543 6.80097 2.517 7.86146L2.5 9.99996L2.517 12.1385C2.52543 13.199 2.52965 13.7292 2.78223 14.1666C3.03481 14.6041 3.49196 14.8728 4.40627 15.4104L6.25 16.4943L8.11073 17.5489C9.03347 18.0718 9.49484 18.3333 10 18.3333M2.78223 5.83329C3.03481 5.39587 3.49196 5.12709 4.40627 4.58955L6.25 3.50557L8.11073 2.45104C9.03347 1.9281 9.49484 1.66663 10 1.66663C10.5052 1.66663 10.9665 1.9281 11.8893 2.45104L13.75 3.50557L15.5937 4.58955C16.508 5.12709 16.9652 5.39587 17.2178 5.83329M2.78223 5.83329L10 9.99996M10 18.3333C10.5052 18.3333 10.9665 18.0718 11.8893 17.5489L13.75 16.4943L15.5937 15.4104C16.508 14.8728 16.9652 14.6041 17.2178 14.1666C17.4704 13.7292 17.4746 13.199 17.483 12.1385L17.5 9.99996L17.483 7.86146C17.4746 6.80097 17.4704 6.27072 17.2178 5.83329M10 18.3333V9.99996M17.2178 5.83329L10 9.99996" stroke="#6B7280" stroke-width="1.6" />
                                    </g>
                                </svg>
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت سفارشات</h2>
                            @if ($pendingOrdersCount > 0)
                                <span class=" bg-blue-500 text-white text-sm font-bold px-2 pb-1 rounded-lg mr-auto">
                                    {{ $pendingOrdersCount }}
                                </span>
                            @endif
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.users')}}" class="@if (isActiveRoute(['admin.users', 'admin.users.edit'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M15.3289 11.4955C14.4941 11.4955 13.724 11.2188 13.1051 10.7522C13.3972 10.3301 13.6284 9.86262 13.786 9.36254C14.1827 9.7539 14.7276 9.99545 15.3289 9.99545C16.5422 9.99545 17.5258 9.01185 17.5258 7.79851C17.5258 6.58517 16.5422 5.60156 15.3289 5.60156C14.7276 5.60156 14.1827 5.84312 13.786 6.23449C13.6284 5.73441 13.3972 5.26698 13.1051 4.84488C13.7239 4.37824 14.4941 4.10156 15.3289 4.10156C17.3706 4.10156 19.0258 5.75674 19.0258 7.79851C19.0258 9.84027 17.3706 11.4955 15.3289 11.4955Z" fill="#343C54"/>
                                    <path d="M14.7723 13.1891C15.0227 13.437 15.2464 13.6945 15.4463 13.9566C16.7954 13.9826 17.7641 14.3143 18.4675 14.7651C19.2032 15.2366 19.6941 15.8677 20.0242 16.5168C20.3563 17.1698 20.5204 17.8318 20.6002 18.337C20.6398 18.5878 20.6579 18.795 20.6661 18.9365C20.6702 19.0071 20.6717 19.061 20.6724 19.0952L20.6726 19.1161L20.6727 19.1313L20.6727 19.1363L21.4197 19.1486C20.6793 19.1358 20.6728 19.136 20.6727 19.1363L20.6727 19.1376C20.6666 19.5509 20.9961 19.8914 21.4096 19.8985C21.8237 19.9057 22.1653 19.5758 22.1725 19.1617L21.4284 19.1488C22.1725 19.1617 22.1725 19.1621 22.1725 19.1617L22.1725 19.1599L22.1726 19.1575L22.1726 19.1511L22.1727 19.1319C22.1727 19.1163 22.1726 19.0951 22.1721 19.0686C22.1712 19.0158 22.1689 18.9419 22.1636 18.85C22.153 18.6665 22.1303 18.4094 22.0819 18.1029C21.9856 17.4936 21.7848 16.6697 21.3612 15.8368C20.9357 15 20.2801 14.1451 19.2768 13.5022C18.2708 12.8574 16.9604 12.4549 15.274 12.4549C14.8284 12.4549 14.4092 12.483 14.0148 12.5362C14.2852 12.7384 14.5376 12.9566 14.7723 13.1891Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.13173 7.79855C5.13173 5.75678 6.7869 4.1016 8.82867 4.1016C10.8704 4.1016 12.5256 5.75678 12.5256 7.79855C12.5256 9.84031 10.8704 11.4955 8.82867 11.4955C6.7869 11.4955 5.13173 9.84031 5.13173 7.79855ZM8.82867 5.6016C7.61533 5.6016 6.63173 6.58521 6.63173 7.79855C6.63173 9.01189 7.61533 9.99549 8.82867 9.99549C10.042 9.99549 11.0256 9.01189 11.0256 7.79855C11.0256 6.58521 10.042 5.6016 8.82867 5.6016Z" fill="#343C54"/>
                                    <path d="M3.37502 19.1374C3.38126 19.5507 3.0517 19.8914 2.63812 19.8986C2.22397 19.9058 1.88241 19.5759 1.87522 19.1617L2.62511 19.1487C1.87522 19.1617 1.87523 19.1621 1.87522 19.1617L1.87519 19.1599L1.87516 19.1575L1.87509 19.1511L1.875 19.1319C1.87499 19.1163 1.87512 19.0951 1.87559 19.0687C1.87653 19.0158 1.87882 18.942 1.88413 18.85C1.89474 18.6665 1.91745 18.4094 1.96585 18.103C2.0621 17.4936 2.26292 16.6697 2.68648 15.8368C3.11206 15 3.76758 14.1452 4.77087 13.5022C5.77688 12.8575 7.08727 12.455 8.77376 12.455C10.4602 12.455 11.7706 12.8575 12.7767 13.5022C13.7799 14.1452 14.4355 15 14.861 15.8368C15.2846 16.6697 15.4854 17.4936 15.5817 18.103C15.6301 18.4094 15.6528 18.6665 15.6634 18.85C15.6687 18.942 15.671 19.0158 15.6719 19.0687C15.6724 19.0951 15.6725 19.1163 15.6725 19.1319L15.6724 19.1511L15.6724 19.1575L15.6723 19.1599C15.6723 19.1603 15.6723 19.1617 14.9282 19.1488L15.6723 19.1617C15.6651 19.5759 15.3235 19.9058 14.9094 19.8986C14.4959 19.8914 14.1664 19.5509 14.1725 19.1376L14.1725 19.1364C14.1726 19.1361 14.1791 19.1358 14.9199 19.1487L14.1725 19.1364L14.1725 19.1314L14.1724 19.1161L14.1722 19.0952C14.1716 19.061 14.17 19.0072 14.1659 18.9366C14.1577 18.7951 14.1396 18.5878 14.1 18.337C14.0202 17.8319 13.8561 17.1699 13.524 16.5168C13.1939 15.8677 12.703 15.2366 11.9673 14.7651C11.2343 14.2954 10.2132 13.955 8.77376 13.955C7.33434 13.955 6.31319 14.2954 5.58022 14.7651C4.84453 15.2366 4.35363 15.8677 4.02351 16.5168C3.6914 17.1699 3.52727 17.8319 3.44749 18.337C3.40787 18.5878 3.38981 18.7951 3.38163 18.9366C3.37756 19.0072 3.37596 19.061 3.37536 19.0952C3.37505 19.1123 3.375 19.1245 3.375 19.1314L3.37502 19.1374Z" fill="#343C54"/>
                                </svg>
                                    
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت کاربران</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.workers')}}" class="@if (isActiveRoute(['admin.workers'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg class="fill-gray-500" width="22" height="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3l0-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5l0 21.5c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112l32 0c24 0 46.2 7.5 64.4 20.3zM448 416l0-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176l32 0c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2l0 26.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3l0-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2l0 42.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112l32 0c61.9 0 112 50.1 112 112z"/></svg>
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت متخصصین</h2>
                        </div>
                    </a>
                </div>
            </li>
            

            <li>
                <div x-data="{ isOpen: 
                {{ isActiveRoute(['admin.finance.reports.details', 'admin.finance.pricing', 'admin.finance.payments', 'admin.finance.reports', 'admin.finance.pricing.show', 'admin.finance.payments.showWorkers', 'admin.finance.payments.create', 'admin.finance.payments.edit']) ? 'true' : 'false' }} }" 
                 class="flex-col gap-1 flex ">
                    <button @click.prevent="isOpen = !isOpen" type="button" class="flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M12.25 6.625C12.6642 6.625 13 6.96079 13 7.375V7.81278C13.9908 7.96341 14.75 8.81897 14.75 9.85184C14.75 10.2661 14.4142 10.6018 14 10.6018C13.5858 10.6018 13.25 10.2661 13.25 9.85184C13.25 9.54113 12.9981 9.28924 12.6874 9.28924H12C11.5858 9.28924 11.25 9.62503 11.25 10.0392V10.3043C11.25 10.6169 11.4439 10.8968 11.7366 11.0066L13.2901 11.5891C14.1682 11.9185 14.75 12.758 14.75 13.6959V13.9609C14.75 15.0317 14.002 15.9278 13 16.1552V16.625C13 17.0392 12.6642 17.375 12.25 17.375C11.8358 17.375 11.5 17.0392 11.5 16.625V16.1874C10.5092 16.0368 9.75 15.1812 9.75 14.1483C9.75 13.7341 10.0858 13.3983 10.5 13.3983C10.9142 13.3983 11.25 13.7341 11.25 14.1483C11.25 14.4591 11.5019 14.7109 11.8126 14.7109H12.5C12.9142 14.7109 13.25 14.3752 13.25 13.9609V13.6959C13.25 13.3832 13.0561 13.1034 12.7634 12.9936L11.2099 12.411C10.3318 12.0817 9.75 11.2422 9.75 10.3043V10.0392C9.75 8.96845 10.498 8.07236 11.5 7.845V7.375C11.5 6.96079 11.8358 6.625 12.25 6.625Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.25 2C6.72715 2 2.25 6.47715 2.25 12C2.25 17.5228 6.72715 22 12.25 22C17.7728 22 22.25 17.5228 22.25 12C22.25 6.47715 17.7728 2 12.25 2ZM3.75 12C3.75 7.30558 7.55558 3.5 12.25 3.5C16.9444 3.5 20.75 7.30558 20.75 12C20.75 16.6944 16.9444 20.5 12.25 20.5C7.55558 20.5 3.75 16.6944 3.75 12Z" fill="#343C54"/>
                                </svg>
                                    
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">امور مالی</h2>
                        </div>
                    </button>

                    <div x-show="isOpen" x-cloak class="grid pr-12">
                        <a href="{{route('admin.finance.pricing')}}" class="{{ isActiveRoute(['admin.finance.pricing', 'admin.finance.pricing.show']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >قیمت گذاری</a>
                        <a href="{{route('admin.finance.payments')}}" class="{{ isActiveRoute(['admin.finance.payments','admin.finance.payments.showWorkers', 'admin.finance.payments.create', 'admin.finance.payments.edit']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >پرداخت ها</a>
                        <a href="{{ route('admin.finance.reports') }}" class="{{ isActiveRoute(['admin.finance.reports', 'admin.finance.reports.details']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg  text-sm font-medium leading-snug px-3 py-1 " >گزارش</a>
                    </div>
                </div>
            </li>


            <li>
                <div x-data="{ isOpen: {{ isActiveRoute(['admin.tags.create', 'admin.tags.edit', 'admin.tags', 'admin.footerSymbol.create', 'admin.footerSymbol.edit', 'admin.footer.edit', 'admin.footer', 'admin.footer.create', 'admin.faqs.show', 'admin.faqs.edit', 'admin.faqs.create', 'admin.faqs', 'admin.suggestedPages.show', 'admin.suggestedPages.edit', 'admin.menu', 'admin.articles', 'admin.suggestedPages', 'admin.menu.create', 'admin.menu.edit', 'admin.articles.create', 'admin.articles.edit', 'admin.suggestedPages.create']) ? 'true' : 'false' }} }" class="flex-col gap-1 flex ">
                    <button @click.prevent="isOpen = !isOpen" type="button" class="flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8609 4.96887C12.3192 4.7747 11.727 4.7747 11.1853 4.96887L2.91085 7.935C1.73804 8.35542 1.73806 10.014 2.91085 10.4344L11.1853 13.4006C11.727 13.5948 12.3192 13.5948 12.8609 13.4006L21.1354 10.4344C22.3082 10.014 22.3082 8.35542 21.1354 7.93501L12.8609 4.96887ZM11.6915 6.38089C11.9059 6.30403 12.1403 6.30403 12.3547 6.38089L20.1764 9.18473L12.3547 11.9886C12.1403 12.0654 11.9059 12.0654 11.6915 11.9886L3.86977 9.18473L11.6915 6.38089Z" fill="#343C54"/>
                                    <path d="M2.91085 13.5646L5.05398 12.7964L7.27658 13.5931L3.86977 14.8144L11.6915 17.6182C11.9059 17.6951 12.1403 17.6951 12.3547 17.6182L20.1764 14.8144L16.7695 13.5931L18.9921 12.7964L21.1354 13.5646C22.3082 13.9851 22.3082 15.6437 21.1354 16.0641L12.8609 19.0302C12.3192 19.2244 11.727 19.2244 11.1853 19.0302L2.91085 16.0641C1.73806 15.6437 1.73804 13.9851 2.91085 13.5646Z" fill="#343C54"/>
                                </svg>
                                    
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت صفحات</h2>
                        </div>
                    </button>

                    <div x-show="isOpen" x-cloak class="grid pr-12">
                        <a href="{{route('admin.menu')}}" class="{{ isActiveRoute(['admin.menu', 'admin.menu.create', 'admin.menu.edit']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >منو</a>
                        <a href="{{route('admin.articles')}}" class="{{ isActiveRoute(['admin.articles', 'admin.articles.create', 'admin.articles.edit']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >مقالات</a>
                        <a href="{{route('admin.suggestedPages')}}" class="{{ isActiveRoute(['admin.suggestedPages', 'admin.suggestedPages.create', 'admin.suggestedPages.show', 'admin.suggestedPages.edit']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >صفحات پیشنهادی</a>
                        <a href="{{route('admin.faqs')}}" class="{{ isActiveRoute(['admin.faqs', 'admin.faqs.create', 'admin.faqs.edit', 'admin.faqs.show']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >سوالات متداول</a>
                        <a href="{{route('admin.footer')}}" class="{{ isActiveRoute(['admin.footerSymbol.create', 'admin.footerSymbol.edit', 'admin.footer', 'admin.footer.create', 'admin.footer.edit']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >فوتر</a>
                        <a href="{{route('admin.tags')}}" class="{{ isActiveRoute(['admin.tags.create', 'admin.tags.edit', 'admin.tags']) ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >تگ ها</a>
                        {{-- <a href="{{route('admin.finance.payments')}}" class="{{ isActiveRoute('admin.finance.payments') ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg text-sm font-medium leading-snug px-3 py-2 " >پرداخت ها</a>
                        <a href="{{ route('admin.finance.reports') }}" class="{{ isActiveRoute('admin.finance.reports') ? 'bg-gray-200' : '' }} text-gray-500 rounded-lg  text-sm font-medium leading-snug px-3 py-1 " >گزارش</a> --}}
                    </div>
                </div>
            </li>
            
           

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.notifications')}}" class="@if (isActiveRoute(['admin.notifications', 'admin.notifications.create', 'admin.notifications.edit'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="#343C54" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0016 2.00098C12.4158 2.00098 12.7516 2.33676 12.7516 2.75098V3.53801C16.5416 3.9143 19.5016 7.11197 19.5016 11.001V14.115L20.1938 15.9609C20.7454 17.4319 19.6581 19.001 18.0871 19.001H15.0628C15.0287 20.6631 13.6701 21.9995 11.9998 21.9995C10.3295 21.9995 8.97089 20.6631 8.93682 19.001H5.9161C4.34514 19.001 3.25776 17.4319 3.80936 15.9609L4.5016 14.115V11.001C4.5016 7.11197 7.46161 3.9143 11.2516 3.53801V2.75098C11.2516 2.33676 11.5874 2.00098 12.0016 2.00098ZM10.4375 19.001C10.471 19.8339 11.1573 20.4995 11.9998 20.4995C12.8423 20.4995 13.5286 19.8339 13.5622 19.001H10.4375ZM6.0016 11.001C6.0016 7.68727 8.68789 5.00098 12.0016 5.00098C15.3153 5.00098 18.0016 7.68727 18.0016 11.001V14.1168C18.0016 14.2955 18.0337 14.4727 18.0965 14.64L18.7893 16.4876C18.9732 16.9779 18.6108 17.501 18.0871 17.501H5.9161C5.39244 17.501 5.02998 16.9779 5.21385 16.4876L5.90673 14.64C5.96946 14.4727 6.0016 14.2955 6.0016 14.1168V11.001Z" fill="#343C54"/>
                                </svg>

                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">اعلان ها</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.messages')}}" class="@if (isActiveRoute(['admin.messages','admin.messages.show'])) bg-gray-200 @endif flex-col flex  rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M6.25 9.77344C6.25 9.35922 6.58579 9.02344 7 9.02344H17C17.4142 9.02344 17.75 9.35922 17.75 9.77344C17.75 10.1877 17.4142 10.5234 17 10.5234H7C6.58579 10.5234 6.25 10.1877 6.25 9.77344Z" fill="#343C54"/>
                                    <path d="M7 12.0234C6.58579 12.0234 6.25 12.3592 6.25 12.7734C6.25 13.1877 6.58579 13.5234 7 13.5234H12C12.4142 13.5234 12.75 13.1877 12.75 12.7734C12.75 12.3592 12.4142 12.0234 12 12.0234H7Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 5.53125C2.5 4.28861 3.50736 3.28125 4.75 3.28125H19.25C20.4926 3.28125 21.5 4.28861 21.5 5.53125V16.0796C21.5 17.3223 20.4926 18.3296 19.25 18.3296H15.1014L12.6025 21.6956C12.461 21.8861 12.2377 21.9985 12.0003 21.9985C11.763 21.9985 11.5396 21.8861 11.3981 21.6956L8.89931 18.3296H4.75C3.50736 18.3296 2.5 17.3223 2.5 16.0796V5.53125ZM4.75 4.78125C4.33579 4.78125 4 5.11704 4 5.53125V16.0796C4 16.4938 4.33579 16.8296 4.75 16.8296H9.2766C9.51396 16.8296 9.73731 16.942 9.87879 17.1326L12.0003 19.9903L14.1219 17.1326C14.2634 16.942 14.4867 16.8296 14.7241 16.8296H19.25C19.6642 16.8296 20 16.4938 20 16.0796V5.53125C20 5.11704 19.6642 4.78125 19.25 4.78125H4.75Z" fill="#343C54"/>
                                </svg>
                                    

                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">پیام ها</h2>
                            @if ($messagesCount > 0)
                                <span class=" bg-blue-500 text-white text-sm font-bold px-2 pb-1 rounded-lg mr-auto">
                                    {{ $messagesCount }}
                                </span>
                            @endif
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.resumes')}}" class="@if (isActiveRoute(['admin.resumes','admin.resumes.show'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8253 6.45518C11.8222 6.45304 11.8191 6.45092 11.816 6.44882L11.0226 5.91552C9.90385 5.16349 8.42087 5.25001 7.39716 6.12703L5.44921 7.79585C5.3133 7.91229 5.14023 7.97629 4.96126 7.97629H2.75C2.33579 7.97629 2 8.31207 2 8.72629V14.7558C2 15.17 2.33579 15.5058 2.75 15.5058H4.83766C5.05324 15.5058 5.2584 15.5986 5.40079 15.7604L7.74003 18.4197C8.49372 19.2765 9.76945 19.4335 10.7083 18.7849L11.3925 18.3122L12.1263 18.5611C13.0569 18.8769 14.0847 18.5522 14.665 17.7591L15.135 17.1168L15.4611 17.1608C16.3853 17.2854 17.2905 16.827 17.7371 16.0084L17.7859 15.9188H21.25C21.6642 15.9188 22 15.583 22 15.1688V8.72629C22 8.31207 21.6642 7.97629 21.25 7.97629H19.0388C18.8587 7.97629 18.6846 7.91148 18.5483 7.79371L16.8614 6.3357C15.3979 5.07079 13.2183 5.12952 11.8253 6.45518ZM10.1858 7.16041C9.62641 6.78439 8.88492 6.82765 8.37306 7.26616L6.42512 8.93498C6.01738 9.28429 5.49817 9.47629 4.96126 9.47629H3.5V14.0058H4.83766C5.48441 14.0058 6.09989 14.2841 6.52706 14.7697L8.8663 17.429C9.11753 17.7146 9.54277 17.7669 9.85573 17.5507L10.8502 16.8637C11.0453 16.7289 11.2928 16.6943 11.5174 16.7706L12.6083 17.1407C12.9185 17.2459 13.2611 17.1377 13.4545 16.8733L14.1879 15.8711C14.3502 15.6492 14.6209 15.534 14.8934 15.5707L15.6616 15.6743C15.9696 15.7158 16.2714 15.563 16.4202 15.2901L16.675 14.823C16.6795 14.8144 16.6841 14.8059 16.6889 14.7975L16.7135 14.7524C16.8754 14.4556 16.8186 14.0871 16.5749 13.8527L13.918 11.2977L11.839 12.9305C10.9599 13.621 9.70712 13.5613 8.8976 12.7904L8.82951 12.7255C7.91585 11.8554 7.89611 10.4043 8.78576 9.50962L10.7469 7.53756L10.1858 7.16041ZM18.305 14.4188H20.5V9.47629H19.0388C18.4985 9.47629 17.9762 9.28187 17.5675 8.92857L15.8805 7.47056C14.9865 6.69784 13.6471 6.74839 12.8138 7.58629L9.84938 10.5673C9.55282 10.8655 9.5594 11.3493 9.86396 11.6393L9.93205 11.7041C10.2019 11.9611 10.6195 11.981 10.9125 11.7508L13.4755 9.73786C13.4946 9.72126 13.5144 9.70578 13.5347 9.69143L14.041 9.29373C14.3668 9.03789 14.8383 9.09456 15.0941 9.42031C15.3122 9.69806 15.3032 10.0818 15.0939 10.3474L17.6146 12.7715C18.0737 13.2129 18.3116 13.813 18.305 14.4188Z" fill="#343C54"/>
                                </svg>
                                    

                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">مدیریت رزومه ها</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('admin.settings')}}" class="@if (isActiveRoute(['admin.settings', 'admin.settings.edit'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9992 8.7743C9.88118 8.7743 8.16419 10.4913 8.16419 12.6093C8.16419 14.7273 9.88118 16.4443 11.9992 16.4443C14.1172 16.4443 15.8342 14.7273 15.8342 12.6093C15.8342 10.4913 14.1172 8.7743 11.9992 8.7743ZM9.66419 12.6093C9.66419 11.3197 10.7096 10.2743 11.9992 10.2743C13.2888 10.2743 14.3342 11.3197 14.3342 12.6093C14.3342 13.8989 13.2888 14.9443 11.9992 14.9443C10.7096 14.9443 9.66419 13.8989 9.66419 12.6093Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5809 8.9224C1.96404 9.99083 2.33012 11.357 3.39854 11.9739C3.88777 12.2563 3.88776 12.9625 3.39856 13.2449C2.33013 13.8618 1.96407 15.2279 2.58092 16.2964L4.09692 18.9222C4.71391 19.9908 6.08044 20.3568 7.14896 19.7399C7.63844 19.4573 8.25011 19.8106 8.25011 20.3754C8.25011 21.6092 9.2503 22.6094 10.4841 22.6094H13.5165C14.7502 22.6094 15.7501 21.6091 15.7501 20.3756C15.7501 19.8108 16.3615 19.458 16.8503 19.7402C17.9185 20.357 19.2845 19.991 19.9012 18.9227L21.4176 16.2963C22.0344 15.2279 21.6684 13.8617 20.6 13.2449C20.1108 12.9624 20.1108 12.2563 20.6 11.9739C21.6684 11.3571 22.0345 9.99089 21.4176 8.92247L19.9012 6.29604C19.2845 5.2278 17.9185 4.86179 16.8503 5.47854C16.3615 5.76076 15.7501 5.40794 15.7501 4.84314C15.7501 3.60961 14.7502 2.60938 13.5165 2.60938H10.4841C9.2503 2.60938 8.25011 3.60957 8.25011 4.84337C8.25011 5.40822 7.63842 5.76152 7.14894 5.47892C6.08042 4.86201 4.71388 5.22797 4.09689 6.29663L2.5809 8.9224ZM4.14854 10.6748C3.79755 10.4722 3.6773 10.0234 3.87994 9.6724L5.39593 7.04663C5.59863 6.69554 6.04772 6.57518 6.39894 6.77796C7.88811 7.63773 9.75011 6.56327 9.75011 4.84337C9.75011 4.43799 10.0787 4.10937 10.4841 4.10937L13.5165 4.10937C13.9216 4.10937 14.2501 4.43788 14.2501 4.84314C14.2501 6.56227 16.1112 7.63733 17.6003 6.77758C17.9511 6.57504 18.3997 6.69524 18.6022 7.04604L20.1186 9.67247C20.3212 10.0234 20.201 10.4722 19.85 10.6749C18.3608 11.5346 18.3608 13.6841 19.85 14.5439C20.2009 14.7465 20.3212 15.1953 20.1186 15.5463L18.6022 18.1727C18.3996 18.5235 17.9511 18.6437 17.6003 18.4412C16.1112 17.5815 14.2501 18.6565 14.2501 20.3756C14.2501 20.7809 13.9216 21.1094 13.5165 21.1094H10.4841C10.0787 21.1094 9.75011 20.7808 9.75011 20.3754C9.75011 18.6555 7.88812 17.5811 6.39896 18.4408C6.04774 18.6436 5.59866 18.5232 5.39596 18.1722L3.87996 15.5464C3.67732 15.1954 3.79757 14.7466 4.14856 14.5439C5.63778 13.6841 5.63775 11.5346 4.14854 10.6748Z" fill="#343C54"/>
                                </svg>
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">تنظیمات</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <form action="{{route('logout')}}" method="POST" class="flex-col gap-1 flex">
                    @csrf
                    <button type="submit" class="flex-col flex  rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20" fill="none">
                                    <g id="Logout">
                                        <path id="icon" d="M9.16667 17.5L5.83333 17.5V17.5C3.98765 17.5 2.5 16.0123 2.5 14.1667V14.1667L2.5 5.83333V5.83333C2.5 3.98765 3.98765 2.5 5.83333 2.5V2.5L9.16667 2.5M8.22814 10L17.117 10M14.3393 6.66667L17.0833 9.41074C17.3611 9.68852 17.5 9.82741 17.5 10C17.5 10.1726 17.3611 10.3115 17.0833 10.5893L14.3393 13.3333" stroke="#6B7280" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </div>
                            <h2 class="text-red-500 text-sm font-medium leading-snug">خروج</h2>
                        </div>
                    </button>
                </form>
            </li>

            
        </ul>
    </div>  
</aside>

