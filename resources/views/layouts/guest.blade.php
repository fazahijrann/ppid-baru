<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPID Kota Bogor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex">
        <!-- Left Section (White Background) with centered content -->
        <div class="w-1/2 h-screen bg-blue dark:bg-blue-900 flex flex-col items-center justify-start">
            <!-- Center PPID logo in the top middle -->
            <div class="flex flex-col items-center mt-8">
                <img class="img-fluid animated slideInRight" src="img/logo-ppid.png" alt="Logo PPID"
                    style="max-width: 90px;">
            </div>
            <div class="w-full sm:max-w-lg px-4 py-4 mt-10 mb-6 bg-white shadow-md overflow-auto sm:rounded-lg mx-auto">
                {{ $slot }}
            </div>
        </div>

        <!-- Right Section (Blue Background) -->
        <div class="w-1/2 h-screen bg-white flex flex-col items-center justify-start">
            <!-- Center Pemkot Bogor logo in the top middle -->
            <div class="flex flex-col items-center mt-8">
                <img class="img-fluid animated slideInLeft" src="img/logo-pemkot-bogor.png" alt="Logo Pemkot Bogor"
                    style="max-width: 78px;">
                <img class="img-fluid animated slideInLeft" src="img/maskot.png" alt="Logo Pemkot Bogor"
                    style="max-width: 550px;">
            </div>
        </div>
    </div>
</body>

</html>
