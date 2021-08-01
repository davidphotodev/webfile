<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://unpkg.com/primevue/resources/themes/saga-blue/theme.css " rel="stylesheet">
    <link href="https://unpkg.com/primevue/resources/primevue.min.css " rel="stylesheet">
    <link href="https://unpkg.com/primeicons/primeicons.css " rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ddstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <div>
            <menu-top />
        </div>
        <div class="">
            @if(Session::has('message'))
                <div class="container">

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>

                        <strong> {{ Session::get('message') }}</strong>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    {{-- <script src="https://kit.fontawesome.com/e522556494.js" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>