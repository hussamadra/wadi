<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <title>{{$page.' :'}} @yield('title')  - مركز الوادي للتدريب و التأهيل السياحي  </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('public/asset/images/slogo.png')}}">

    @include('layouts-new.css')
    <style>
        .white{
            color: #7367F0 !important;
        }
        body::-webkit-scrollbar {
            display: none; /* for Chrome, Safari, and Opera */
            overflow-y: scroll;
        }
        .task-show a{
            /* color: #fff; */

        }
        .task-show a:hover{
            color: #fff;

        }
        .task-show a:focus{
            color: #fff;

        }
        label{
            font-weight: bolder;
            font-size: 100%;
        }
        thead, th {text-align: right;}


    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('layouts-new.header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('layouts-new.menu')
<!-- END: Main Menu-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{$page}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a>
                                </li>
                                @if(isset($menu))
                                    <li class="breadcrumb-item"><a href="{{$menu_link}}">{{$menu}}</a>
                                    </li>@endif
                                <li class="breadcrumb-item active">{{$page}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            </div>
        </div>
        <div class="content-body">
<!-- BEGIN: Content-->
@yield('content')

<!-- END: Content-->
        </div>
    </div>
</div>


<!-- Modal to add new user starts-->


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><a class="ml-25" href="#"></a><span class="d-none d-sm-inline-block"> </span></span><span class="float-md-right d-none d-md-block">COPYRIGHT &copy; 2024</span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

@include('layouts-new.js')
</body>
<!-- END: Body-->

</html>
