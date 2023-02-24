<!DOCTYPE html>
<html lang="ru" class="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="preload" href="{{asset('fonts/LatoRegular.woff2')}}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script  defer src = "{{asset('js/ajax.js')}}"></script>
    <script  defer src = "{{asset('js/modal.js')}}"></script>
    <script  defer src = "{{asset('js/scroll.js')}}"></script>
    <script  src = "{{asset('js/vendor.js')}}"></script>
    <script defer src = "{{asset('js/main.js')}}"></script>
</head>


<body class="page__body" id="page">
  <div class="site-container">
    @include('partials.header.header')
    <main class="main">
        @yield('main')
    </main>
    @include('partials.footer.footer')
  </div>
  @yield('script')
</body>
</html>
