<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title> @yield('title') </title>
    <link href="{{ asset('public/frontEnd/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="{{ asset('public/frontEnd/js/jquery-1.11.1.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('public/frontEnd/css/style.css') }}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- start menu -->
    <link href="{{ asset('public/frontEnd/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('public/frontEnd/js/megamenu.js') }}"></script>
    <script>$(document).ready(function () {
            $(".megamenu").megamenu();
        });</script>
    <!-- start slider -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/fwslider.css') }}" media="all">
    <script src="{{ asset('public/frontEnd/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/fwslider.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/menu_jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/etalage.css') }}">
    <script src="{{ asset('public/frontEnd/js/jquery.etalage.min.js') }}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function (image_anchor, instance_id) {
                    alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                }
            });
        });
    </script>
    <!--end slider -->
</head>
<body>
<!-- header_top -->
@include('frontEnd.layouts.headerTop')
<!-- header -->
@include('frontEnd.layouts.header')
<!-- content -->
@yield('content')
<!-- footer_top -->
@include('frontEnd.layouts.footer')
</body>
</html>
