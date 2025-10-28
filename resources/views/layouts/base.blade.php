<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="container mx-auto">
    <!-- 1️⃣ Navbar -->
    <div class="flex flex-col h-screen p-4 gap-0">
        <nav>
            @yield('navbar')
        </nav>

        <!-- Separator -->
        <div class="divider m-0"></div>

        <div>
            @yield('menu')
        </div>

        <!-- Separator -->
        <div class="divider m-0"></div>

        <main>
            @yield('content')
        </main>

    </div>
    @livewireScripts
</body>

</html>