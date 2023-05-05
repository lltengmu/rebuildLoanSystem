
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/focus-premium/focus/images/favicon.png') }}">
    @yield("styles")
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/global.css') }}">
    
</head>

<body>

    @include('public.loading.index')


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!-- navigation header -->
        @include('public.navigation.header')
        
        <!-- header -->
        @include('public.header.index')
        
        <!-- navigation bar -->
        @switch(session("_user_info.identify"))
            @case("individual")
                @include('public.navigation.index')
                @break
            @case("client")
                @include('public.navigation.client')
                @break
        @endswitch
        
        
        <!-- content body -->
        @yield('content')
    </div>

    <!-- base focus js -->
    <script src="{{ asset('focus-premium/focus/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/custom.min.js') }}"></script>
    @yield("javascript")
</body>

</html>