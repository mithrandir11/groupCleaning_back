<aside class="w-72 p-4 border bg-gray-50 border-gray-300 rounded-lg flex-col justify-start items-start gap-6 inline-flex self-start">
    <div class="w-full justify-between items-center gap-2.5 inline-flex ">
       
            <p class="font-bold">پروفایل متخصص</p>
       
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
                    <a href="{{route('worker.dashboard')}}" class="@if (isActiveRoute(['worker.dashboard'])) bg-gray-200 @endif flex-col flex rounded-lg p-3"
                   
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
                    <a href="{{route('worker.orders')}}" class="@if (isActiveRoute(['worker.orders','worker.orders.show'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20" fill="none">
                                    <g id="Cube 01">
                                        <path id="icon" d="M2.78223 5.83329C2.52965 6.27072 2.52543 6.80097 2.517 7.86146L2.5 9.99996L2.517 12.1385C2.52543 13.199 2.52965 13.7292 2.78223 14.1666C3.03481 14.6041 3.49196 14.8728 4.40627 15.4104L6.25 16.4943L8.11073 17.5489C9.03347 18.0718 9.49484 18.3333 10 18.3333M2.78223 5.83329C3.03481 5.39587 3.49196 5.12709 4.40627 4.58955L6.25 3.50557L8.11073 2.45104C9.03347 1.9281 9.49484 1.66663 10 1.66663C10.5052 1.66663 10.9665 1.9281 11.8893 2.45104L13.75 3.50557L15.5937 4.58955C16.508 5.12709 16.9652 5.39587 17.2178 5.83329M2.78223 5.83329L10 9.99996M10 18.3333C10.5052 18.3333 10.9665 18.0718 11.8893 17.5489L13.75 16.4943L15.5937 15.4104C16.508 14.8728 16.9652 14.6041 17.2178 14.1666C17.4704 13.7292 17.4746 13.199 17.483 12.1385L17.5 9.99996L17.483 7.86146C17.4746 6.80097 17.4704 6.27072 17.2178 5.83329M10 18.3333V9.99996M17.2178 5.83329L10 9.99996" stroke="#6B7280" stroke-width="1.6" />
                                    </g>
                                </svg>
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">سفارشات جدید</h2>
                        </div>
                    </a>
                </div>
            </li>

            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('worker.finance')}}" class="@if (isActiveRoute(['worker.finance', 'worker.finance.details'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M12.25 6.625C12.6642 6.625 13 6.96079 13 7.375V7.81278C13.9908 7.96341 14.75 8.81897 14.75 9.85184C14.75 10.2661 14.4142 10.6018 14 10.6018C13.5858 10.6018 13.25 10.2661 13.25 9.85184C13.25 9.54113 12.9981 9.28924 12.6874 9.28924H12C11.5858 9.28924 11.25 9.62503 11.25 10.0392V10.3043C11.25 10.6169 11.4439 10.8968 11.7366 11.0066L13.2901 11.5891C14.1682 11.9185 14.75 12.758 14.75 13.6959V13.9609C14.75 15.0317 14.002 15.9278 13 16.1552V16.625C13 17.0392 12.6642 17.375 12.25 17.375C11.8358 17.375 11.5 17.0392 11.5 16.625V16.1874C10.5092 16.0368 9.75 15.1812 9.75 14.1483C9.75 13.7341 10.0858 13.3983 10.5 13.3983C10.9142 13.3983 11.25 13.7341 11.25 14.1483C11.25 14.4591 11.5019 14.7109 11.8126 14.7109H12.5C12.9142 14.7109 13.25 14.3752 13.25 13.9609V13.6959C13.25 13.3832 13.0561 13.1034 12.7634 12.9936L11.2099 12.411C10.3318 12.0817 9.75 11.2422 9.75 10.3043V10.0392C9.75 8.96845 10.498 8.07236 11.5 7.845V7.375C11.5 6.96079 11.8358 6.625 12.25 6.625Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.25 2C6.72715 2 2.25 6.47715 2.25 12C2.25 17.5228 6.72715 22 12.25 22C17.7728 22 22.25 17.5228 22.25 12C22.25 6.47715 17.7728 2 12.25 2ZM3.75 12C3.75 7.30558 7.55558 3.5 12.25 3.5C16.9444 3.5 20.75 7.30558 20.75 12C20.75 16.6944 16.9444 20.5 12.25 20.5C7.55558 20.5 3.75 16.6944 3.75 12Z" fill="#343C54"/>
                                </svg>
                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">امور مالی</h2>
                        </div>
                    </a>
                </div>
            </li>

           
            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('worker.messages')}}" class="@if (isActiveRoute(['worker.messages'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path d="M6.25 9.77344C6.25 9.35922 6.58579 9.02344 7 9.02344H17C17.4142 9.02344 17.75 9.35922 17.75 9.77344C17.75 10.1877 17.4142 10.5234 17 10.5234H7C6.58579 10.5234 6.25 10.1877 6.25 9.77344Z" fill="#343C54"/>
                                    <path d="M7 12.0234C6.58579 12.0234 6.25 12.3592 6.25 12.7734C6.25 13.1877 6.58579 13.5234 7 13.5234H12C12.4142 13.5234 12.75 13.1877 12.75 12.7734C12.75 12.3592 12.4142 12.0234 12 12.0234H7Z" fill="#343C54"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 5.53125C2.5 4.28861 3.50736 3.28125 4.75 3.28125H19.25C20.4926 3.28125 21.5 4.28861 21.5 5.53125V16.0796C21.5 17.3223 20.4926 18.3296 19.25 18.3296H15.1014L12.6025 21.6956C12.461 21.8861 12.2377 21.9985 12.0003 21.9985C11.763 21.9985 11.5396 21.8861 11.3981 21.6956L8.89931 18.3296H4.75C3.50736 18.3296 2.5 17.3223 2.5 16.0796V5.53125ZM4.75 4.78125C4.33579 4.78125 4 5.11704 4 5.53125V16.0796C4 16.4938 4.33579 16.8296 4.75 16.8296H9.2766C9.51396 16.8296 9.73731 16.942 9.87879 17.1326L12.0003 19.9903L14.1219 17.1326C14.2634 16.942 14.4867 16.8296 14.7241 16.8296H19.25C19.6642 16.8296 20 16.4938 20 16.0796V5.53125C20 5.11704 19.6642 4.78125 19.25 4.78125H4.75Z" fill="#343C54"/>
                                </svg>

                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">ارتباط با مدیریت</h2>
                        </div>
                    </a>
                </div>
            </li>


            <li>
                <div class="flex-col gap-1 flex">
                    <a href="{{route('worker.info')}}" class="@if (isActiveRoute(['worker.info'])) bg-gray-200 @endif flex-col flex rounded-lg p-3">
                        <div class="h-5 gap-3 flex">
                            <div class="relative">
                                <svg width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4337 6.35C16.4337 8.74 14.4937 10.69 12.0937 10.69L12.0837 10.68C9.69365 10.68 7.74365 8.73 7.74365 6.34C7.74365 3.95 9.70365 2 12.0937 2C14.4837 2 16.4337 3.96 16.4337 6.35ZM14.9337 6.34C14.9337 4.78 13.6637 3.5 12.0937 3.5C10.5337 3.5 9.25365 4.78 9.25365 6.34C9.25365 7.9 10.5337 9.18 12.0937 9.18C13.6537 9.18 14.9337 7.9 14.9337 6.34Z" fill="#343C54"/>
                                    <path d="M12.0235 12.1895C14.6935 12.1895 16.7835 12.9395 18.2335 14.4195V14.4095C20.2801 16.4956 20.2739 19.2563 20.2735 19.4344L20.2735 19.4395C20.2635 19.8495 19.9335 20.1795 19.5235 20.1795H19.5135C19.0935 20.1695 18.7735 19.8295 18.7735 19.4195C18.7735 19.3695 18.7735 17.0895 17.1535 15.4495C15.9935 14.2795 14.2635 13.6795 12.0235 13.6795C9.78346 13.6795 8.05346 14.2795 6.89346 15.4495C5.27346 17.0995 5.27346 19.3995 5.27346 19.4195C5.27346 19.8295 4.94346 20.1795 4.53346 20.1795C4.17346 20.1995 3.77346 19.8595 3.77346 19.4495L3.77345 19.4448C3.77305 19.2771 3.76646 16.506 5.81346 14.4195C7.26346 12.9395 9.35346 12.1895 12.0235 12.1895Z" fill="#343C54"/>
                                </svg>
                                    

                            </div>
                            <h2 class="text-gray-500 text-sm font-medium leading-snug">تغییر مشخصات کاربری</h2>
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