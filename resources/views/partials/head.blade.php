    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('libraria_template/images/favicon.ico') }}" rel="icon" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    @if(Request::is(['admin', 'admin/*']))
        <!-- Fonts and icons -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

        <!-- CSS Files -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('paper_template/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('paper_template/assets/demo/demo.css') }}" rel="stylesheet" />

        <!-- Core JS Files -->
        <script src="{{ asset('paper_template/assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('paper_template/assets/js/core/popper.min.js') }}" defer></script>
        <script src="{{ asset('paper_template/assets/js/core/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('paper_template/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
        <!--  Google Maps Plugin -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
        <!-- Chart JS -->
        <script src="{{ asset('paper_template/assets/js/plugins/chartjs.min.js') }}" defer></script>
        <!--  Notifications Plugin -->
        <script src="{{ asset('paper_template/assets/js/plugins/bootstrap-notify.js') }}" defer></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('paper_template/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript" defer></script>
        
        <!-- DataTable -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/datatables.min.css"/>
        
        <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/datatables.min.js"></script>
        
        <!-- Toast -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

        <!-- Searchable Select -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    @else
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="{{ asset('libraria_template/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="{{ asset('libraria_template/css/mmenu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libraria_template/css/mmenu.positioning.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Responsive Table -->
        <link rel="stylesheet" type="text/css" href="{{ asset('libraria_template/css/responsivetable.css') }}" />

        <!-- Accordion Stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset('libraria_template/css/jquery.accordion.css') }}">
        
        <!-- Stylesheet -->
        <link href="{{ asset('libraria_template/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/jquery-1.12.4.min.js') }}" defer></script>        
        <!-- jQuery UI -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/jquery-ui.min.js') }}" defer></script>        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/jquery.easing.1.3.js') }}" defer></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/bootstrap.min.js') }}" defer></script>        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/mmenu.min.js') }}" defer></script>        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/harvey.min.js') }}" defer></script>        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/waypoints.min.js') }}" defer></script>
        <!-- Facts Counter -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/facts.counter.min.js') }}" defer></script>
        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/mixitup.min.js') }}" defer></script>
        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/owl.carousel.min.js') }}" defer></script>        
        <!-- Accordion -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/accordion.min.js') }}" defer></script>        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/responsive.tabs.min.js') }}" defer></script>        
        <!-- Responsive Table -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/responsive.table.min.js') }}" defer></script>        
        <!-- Masonry -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/masonry.min.js') }}" defer></script>        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/carousel.swipe.min.js') }}" defer></script>        
        <!-- bxSlider -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/bxslider.min.js') }}" defer></script>        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="{{ asset('libraria_template/js/main.js') }}" defer></script>
    @endif