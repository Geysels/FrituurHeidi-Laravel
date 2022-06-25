<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    @include('includes.head')
</head>

<body class="scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 bg-cover">
    <div class="drawer drawer-mobile justify-center bg-cover"
        style="background-image: url({{ asset('img/home2.jpeg') }});">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div
            class="drawer-content scrollbar-thin scrollbar-thumb-stone-900 scrollbar-track-gray-100 flex flex-col bg-stone-900">
            @include('includes.header')
            @yield('content')
        </div>
        @include('includes.sidebar')
    </div>
    @include('includes.footer')
    @include('sweetalert::alert')
</body>

</html>
