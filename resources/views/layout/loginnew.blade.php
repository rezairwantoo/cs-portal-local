<!DOCTYPE html>
<html style="height: 100%">
<head>
  <title>{{ config('app.name','PPDB Online') }} | Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}">

  <!-- plugin css -->
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}" style="height: 100%; font-family: 'Lato', sans-serif !important;background: white;">
  <!-- <script src="{{ asset('assets/js/spinner.js') }}"></script> -->

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      @yield('content')
    </div>
  </div>
    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->
    @stack('custom-scripts')
</body>
</html>
