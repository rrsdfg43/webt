<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta name="description" content="@yield('description')">
    <meta content="es" name="language" />
    <meta name="robots" content="all, index, follow" />

    <link rel="canonical" href="{{ request()->url() }}">
    @yield('css')
</head>

<body>
    @include('partials.nav')
    @yield('content')
    @yield('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @include('partials.footer')
</body>

</html>
