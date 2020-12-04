<html lang="ja">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div id="app" v-cloak>
    @yield('header')

    <main class="mb-5">
        @yield('content')
    </main>
    @yield('footer')
</div>

<script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>