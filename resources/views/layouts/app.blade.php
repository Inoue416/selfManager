@extends('/base')
@section('head')
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
@endsection
@section('content')
    <div id="app">
        <main class="py-4">
            @yield('content_auth')
        </main>
    </div>
@endsection
