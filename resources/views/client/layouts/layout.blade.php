<!DOCTYPE html>
<html lang="en">
<x-client-head>
    <x-slot:title>@yield('title', 'Tasty Food')</x-slot>
    <x-slot:styles>
        @stack('styles')
    </x-slot:styles>

</x-client-head>


<body class="">
    <x-client-navbar>
        <x-slot:pageTitle>@yield('pageTitle', 'Tasty Food')</x-slot:pageTitle>
        <x-slot:banner>
            @yield('banner', asset('client/assets/img/Group 70@2x.png'))
        </x-slot:banner>
    </x-client-navbar>

    @yield('content')

    <x-client-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        })
    </script>
</body>

</html>
