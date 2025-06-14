<!DOCTYPE html>
<html lang="en">
<x-head>
    <x-slot:title>@yield('title', 'Tasty Food')</x-slot>
</x-head>


<body class="nav-fixed">
    <x-navbar />
    <div id="layoutSidenav">
        <x-sidebar />
        <div id="layoutSidenav_content">

            @yield('content')


            <x-footer />
        </div>
    </div>
    <x-script>
      <x-slot:script>@yield('scripts')</x-slot>
    </x-script>
</body>

</html>
