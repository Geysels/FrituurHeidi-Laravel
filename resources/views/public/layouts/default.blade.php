<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    @include('includes.head')
</head>

<body class="scrollbar-thin scrollbar-thumb-stone-600 scrollbar-track-gray-100 overflow-x-hidden bg-stone-800">
    @include('includes.nav')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>

</html>
