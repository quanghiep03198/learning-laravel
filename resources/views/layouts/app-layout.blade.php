<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="https://laravel.com/img/logomark.min.svg" />
    <link rel="stylesheet" href="{{ asset('assets/css/easyui.css') }}">
    <link rel="stylesheet" href="{{ asset('asset') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <x-partials.drawer-sidebar></x-partials.drawer-sidebar>
        <!-- Static sidebar for desktop -->
        <x-partials.static-sidebar></x-partials.static-sidebar>
        <div class="xl:pl-72">
            <x-partials.header></x-partials.header>
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easyui.min.js') }}"></script>
    <script src="{{ asset('assets/js/easyloader.js') }}"></script>
</body>

</html>
