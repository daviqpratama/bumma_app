<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f5ec] font-sans antialiased">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#f0f4e5] border-r">
            @include('layouts.sidebar')
        </aside>

        <!-- Content -->
        <div class="flex-1">
            <!-- Topbar -->
            <header class="bg-[#cfe3c2] h-14 flex items-center justify-between px-6 shadow">
                <h1 class="text-lg font-bold text-gray-800">BUMMA</h1>
                <div class="text-black">
                    <i class="fas fa-user"></i>
                </div>
            </header>

            <main class="p-6">
    @yield('content')
</main>

        </div>

    </div>
</body>
</html>
