<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>{{ $title ?? 'پنل مدیریت' }}</title>

    <x-head.tinymce-config/>
    @vite('resources/css/app.css')
</head>
<body>
     


     <div class="px-1 lg:px-4   ">
        {{-- @if ($showHeader ?? true)
        <Header/>
        @endif --}}
        <div class="py-12 flex gap-x-6">
            @if ($showSidebar ?? true)
                <x-sidebar.admin/>
            @endif
            @yield('content')
        </div>

        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
        @stack('scripts')
        {{-- <Footer/> --}}
    </div>
</body>
</html>