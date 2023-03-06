<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ js('tailwindcss.min.js') }}"></script>
    <script src="{{ js('jquery-3.6.0.min.js') }}"></script>

    <title>@yield('title')</title>
</head>
<body>
    <main class="max-w-screen-lg mx-auto bg-gray-200 p-10">
        @yield('content')
    </main>
</body>
</html>