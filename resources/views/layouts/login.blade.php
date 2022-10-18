<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<div class="main">
</head>

<body>
    <div id="app">

        <main class="py-4">
            @yield('konten')
        </main>
    </div>
</body>

</html>