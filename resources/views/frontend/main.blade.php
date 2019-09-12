<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Onion Films">
    <meta name="author" content="Vedanasoft Technologies - https://vedanasoft.com">

    <title>Onion Films</title>

    <!-- normalize core CSS -->
    <link href="{{ asset('onion/css/normalize.css' ) }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('onion/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('onion/bootstrap/fonts/glyphicons-halflings-regular.eot') }}">

    <!-- Load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <link href="{{ asset('onion/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <script src="{{ asset('onion/bootstrap/js/ie-emulation-modes-warning.js') }}"></script> --}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Fonts - Change if needed -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400italic,400,700,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Menu shrinking -->
    

    <!-- Main styles of this template -->
    <link href="{{ asset('onion/css/style.min.css') }}?v=1.0.0" rel="stylesheet">

    <!-- Custom CSS. Input here your changes -->
    <link href="{{ asset('onion/css/custom.css') }}" rel="stylesheet">

</head>

<body>
    @include('frontend.include.header')
    @yield('content')
    @include('frontend.include.footer')
    <!-- Scripts -->
    <!-- Loads Bootstrap Main JS -->
    <script src="{{ asset('onion/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('onion/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

    

    <!-- Initiate Portoflio Script -->
    <script src="{{ asset('onion/extensions/portfolio/isotope.min.js') }}"></script>
    <script src="{{ asset('onion/extensions/portfolio/portfolio.js') }}"></script>

    <!-- Initiate Fancybox/Lightbox Script -->
    <!-- Fancybox/Lightbox -->
    <script type="text/javascript" src="{{ asset('onion/extensions/fancybox/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('onion/extensions/fancybox/jquery.fancybox.pack.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('onion/extensions/fancybox/jquery.fancybox.css') }}" media="screen" />
    <script type="text/javascript" src="{{ asset('onion/extensions/fancybox/jquery.fancybox-media.js') }}"></script>
    <!-- Initiate Fancybox/Lightbox for Videos -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
             */
            $('.fancybox-media')
                .attr('rel', 'media-gallery')
                .fancybox({
                    openEffect: 'none',
                    closeEffect: 'none',
                    prevEffect: 'none',
                    nextEffect: 'none',
                    arrows: false,
                    helpers: {
                        media: {},
                        buttons: {}
                    }
                });
        });
    </script>
    @yield('custom-js')
    
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>

    <script type="text/javascript">

        $(function()
        {
            $('.collapse').each(function(e)
            {
                var collapse_element = $(this)
                var navs = $(this).find('.nav-item')
                navs.each(function(e)
                {
                    let link = $(this).find('a').attr('href');
                    console.log(link)
                    if(link == '{{ url()->current() }}')
                    {

                        $(this).addClass('active');
                        collapse_element.addClass('show')
                    }   
                })
            })
        })
        @if(\Session::has('success-msg'))
            $.notify({
                icon: 'fa fa-bell',
                title: '<strong>Heads up!</strong>',
                message: '{{ \Session::get('success-msg') }}'
            },{
                type: 'success'
            });
        @endif

        @if(\Session::has('error-msg'))
            $.notify({
                icon: 'fa fa-bell',
                title: '<strong>Heads up!</strong>',
                message: '{{ \Session::get('error-msg') }}'
            },{
                type: 'danger'
            });
        @endif

        @if(\Session::has('friendly-error-msg'))
            $.notify({
                    icon: 'fa fa-bell',
                    title: '<strong>Heads up!</strong>',
                    message: '{{ \Session::get('friendly-error-msg') }}'
                },{
                    type: 'info'
            });
        @endif

        @if(\Session::has('warning-msg'))
            $.notify({
                    icon: 'fa fa-bell',
                    title: '<strong>Heads up!</strong>',
                    message: '{{ \Session::get('warning-msg') }}'
                },{
                    type: 'warning'
            });
        @endif
    </script>

</body>

</html>