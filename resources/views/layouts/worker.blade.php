<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>{{ $title ?? 'پنل متخصص' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
     


    <div class="px-1 lg:px-4   ">

        <div class="py-12 flex gap-x-6">
            @if ($showSidebar ?? true)
                <x-sidebar.worker/>
            @endif
            @yield('content')
        </div>

        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    </div>
</body>
</html>