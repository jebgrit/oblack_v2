<!DOCTYPE html>

<html lang="fr-FR">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz"> 

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> --}}


    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('frontend/assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fileinput.min.css') }}" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <title>Zoner | Properties Listing {{ asset('frontend/') }}</title> 

</head>

<body class="page-sub-page page-listing-lines page-search-results" id="page-top">
<!-- Wrapper -->

<div class="wrapper">
    <!-- Navigation -->
    @include('frontend.body.header')
    <!-- end Navigation -->

    
    <!-- Page Content -->
    <div id="page-content">
        
        @yield('main')

    </div>
    <!-- end Page Content -->


    <!-- Page Footer -->
    @include('frontend.body.footer')
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-2.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.numberformatter-1.2.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/custom.js') }}"></script>

<!-- tofu -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/tofu/code.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/tofu/function.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/tofu/search.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>

<script type="text/javascript" src="{{ asset('frontend/assets/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/custom-map.js') }}"></script>



<script type="text/javascript" src="{{ asset('frontend/assets/js/markerwithlabel_packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/infobox.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.raty.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.fitvids.js') }}"></script>

<script type="text/javascript">
    var propertyId = 0;
    google.maps.event.addDomListener(window, 'load', initMap(propertyId));
    $(window).load(function(){
        initializeOwl(false);
    });
</script>

</body>
</html>