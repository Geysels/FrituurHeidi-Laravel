<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    @include('includes.head')
</head>

<body>
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            @yield('content')
        </div>
        @include('includes.sidebar')
    </div>
    @include('includes.footer')
</body>

</html>
