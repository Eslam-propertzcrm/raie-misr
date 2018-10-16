<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fast-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-color.css') }}" rel="stylesheet" title="color">
    <link href="{{ asset('css/theme-color_v2.css') }}" rel="alternate stylesheet" title="color2">
    <link href="{{ asset('css/theme-color_v3.css') }}" rel="alternate stylesheet" title="color3">
    <link href="{{ asset('css/theme-color_v4.css') }}" rel="alternate stylesheet" title="color4">
    <link href="{{ asset('css/theme-color_v5.css') }}" rel="alternate stylesheet" title="color5">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
     @endif
</head>