<!doctype html>
<html lang="en">
<head>
    @include('header.head')
</head>
<body>
    @include('alerts')
    @include('header.menu')
    <header>
        @include('header.header')
    </header>

    <div class="container">
        @yield('section')
    </div>
    @include('footer.footer')
</body>
</html>
