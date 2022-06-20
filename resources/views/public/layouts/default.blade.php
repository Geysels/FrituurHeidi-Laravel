<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    @include('includes.head')
</head>

<body class="bg-stone-800">
    @include('includes.nav')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')
</body>

</html>
