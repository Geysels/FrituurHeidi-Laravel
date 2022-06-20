<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    @include('includes.head')
</head>

<body class="scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-100 bg-[url('/img/wave.svg')] bg-no-repeat">
    <div class="drawer drawer-mobile justify-center">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div
            class="drawer-content scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-100 flex flex-col bg-stone-50">
            {{-- @include('includes.header') --}}
            @yield('content')
        </div>
        @include('includes.sidebar')
    </div>
    @include('includes.footer')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
</body>

</html>
