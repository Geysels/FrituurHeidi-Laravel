<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-100 flex min-h-screen bg-gray-100">

    @include('includes.sidebar')
    <div class="flex-1">
        <main>
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
</body>

</html>
