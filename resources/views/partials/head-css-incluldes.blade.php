<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title') @if(Request::url() != url('/')) :: StubGuys @endif</title>
    <!-- font include -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5T5VGHN');</script>
    <!-- End Google Tag Manager -->

    <!-- Bootstrap Script -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Font Awesome icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('nexa/css/main.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl-animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Tags Input -->
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app2.css')}}" rel="stylesheet" type="text/css">
    <!-- Sweet Alert Style -->
    <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Nexas Theme Files-->
    <link rel="stylesheet" href="{{asset('nexa/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
    <link rel="stylesheet" href="{{asset('nexa/plugins/morrisjs/morris.css')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('nexa/css/color_skins.css')}}">
    <!-- End Theme Files -->

    <!-- Custom Style -->
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet" type="text/css">
    <!-- My Custom Style -->
    {{--<link href="{{asset('css/my-custom-style.css')}}" rel="stylesheet" type="text/css">--}}
    <!-- Responsive Style -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">

    <!-- dispute  Style -->
    <link href="{{asset('css/dispute.css')}}" rel="stylesheet" type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131495965-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-131495965-1');
    </script>

</head>
