<!DOCTYPE html>
<html lang="en" dir="rtl" data-scompiler-id="0">
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/rtl/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 06:58:34 GMT -->
<head>
    <meta charSet="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="format-detection" content="telephone=no"/>
    <title>Stroyka Admin - eCommerce Dashboard Template</title><!-- icon -->
    <link rel="icon" type="image/png" href="{{asset('public/asset/images/logo.png')}}"/><!-- fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i"/>
    <!-- css -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('public/vendor/bootstrap/css/bootstrap.rtl.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/highlight.js/styles/github.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/simplebar/simplebar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/quill/quill.snow.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/air-datepicker/css/datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/datatables/css/dataTables.bootstrap5.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/nouislider/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/vendor/fullcalendar/main.min.css')}}"/>
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('public/asset/css/style.css')}}"/>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
    <style>
        input{
            direction: rtl !important;
        }
    </style>
</head>
<body><!-- sa-app -->
<div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
    @include('layouts.sidebar')
    <div class="sa-app__content"><!-- sa-app__toolbar -->
        @include('layouts.toolbar-body')
        <div id="top" class="sa-app__body px-2 px-lg-4">
            <div class="container pb-6">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col"><h1 class="h3 m-0">{{$page}}@yield('title')@yield('image_title')</h1></div>
                        <div class="col-auto d-flex">
                                {{date('Y-m-d')}}
                    </div>
                        <div class="col-12 text-center">
                            @if(session()->has('success'))
                                <label class="alert alert-success" >{{session()->get('success')}}</label>
                            @endif
                            @if(session()->has('error'))
                                <label class="alert alert-danger" >{{session()->get('error')}}</label>
                            @endif
                            @if(count($errors)>0)
                                <label class="alert alert-danger" >{{$errors->first()}}</label>
                            @endif
                        </div>
                </div>

                @yield('content')
            </div>
        </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
<!-- sa-app / end --><!-- scripts -->
<script src={{asset('public/vendor/jquery/jquery.min.js')}}></script>

<script src={{asset('public/vendor/feather-icons/feather.min.js')}}></script>
<script src={{asset('public/vendor/simplebar/simplebar.min.js')}}></script>
<script src={{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
<script src={{asset('public/vendor/highlight.js/highlight.pack.js')}}></script>
<script src={{asset('public/vendor/quill/quill.min.js')}}></script>
<script src={{asset('public/vendor/air-datepicker/js/datepicker.min.js')}}></script>
<script src={{asset('public/vendor/air-datepicker/js/i18n/datepicker.en.js')}}></script>
<script src={{asset('public/vendor/select2/js/select2.min.js')}}></script>
<script src={{asset('public/vendor/fontawesome/js/all.min.js')}} data-auto-replace-svg="" async=""></script>
<script src={{asset('public/vendor/chart.js/chart.min.js')}}></script>
<script src={{asset('public/vendor/datatables/js/jquery.dataTables.min.js')}}></script>
<script src={{asset('public/vendor/datatables/js/dataTables.bootstrap5.min.js')}}></script>
<script src={{asset('public/vendor/nouislider/nouislider.min.js')}}></script>
<script src={{asset('public/vendor/fullcalendar/main.min.js')}}></script>
<script src={{asset('public/js/stroyka.js')}}></script>
<script src={{asset('public/js/custom.js')}}></script>
<script src={{asset('public/js/calendar.js')}}></script>
<script src={{asset('public/js/demo.js')}}></script>
<script src={{asset('public/js/demo-chart-js.js')}}></script>


@yield('js')
</body>
<!-- Mirrored from stroyka-admin.html.themeforest.scompiler.ru/variants/rtl/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 06:59:03 GMT -->
</html>
