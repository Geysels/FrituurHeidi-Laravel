<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-100 bg-amber-500">
    @include('includes.nav')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>

</html>
