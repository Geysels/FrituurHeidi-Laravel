<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    @include('includes.head')
</head>

<body class="scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 bg-cover">
    <div class="drawer drawer-mobile justify-center bg-cover bg-center"
        style="background-image: url({{ asset('img/bestellen3.jpeg') }});">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div
            class="drawer-content scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 flex flex-col bg-stone-800">
            @include('includes.header')
            @yield('content')
        </div>
        @include('includes.sidebar')
    </div>
    @include('includes.footer')
    @include('sweetalert::alert')
</body>

</html>
