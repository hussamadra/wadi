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
    <title>{{$page.' :'}} @yield('title')  -   مصادر الجزيرة </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--@include('layouts-new.css')--}}
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        .white{
            color: #7367F0 !important;
        }
        body::-webkit-scrollbar {
            display: none; /* for Chrome, Safari, and Opera */
            overflow-y: scroll;
        }
        .task-show a{
            color: #fff;

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
    <style>
        body {
            background-color: #fff;
            line-height: 30px;
            font-family: 'tunisia', fantasy;

        }


        p {
            font-size: 1.3rem;
        }

        b {
            font-size: 1.3rem;
        }
        table, th, td {
            border: 1px solid black;
        }
        td,th{
            padding: 8px;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="" style="margin: 4%" dir="rtl">

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->
<!-- Modal to add new user starts-->


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
{{--<footer class="footer footer-static footer-light">--}}
    {{--<p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="#"></a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>--}}
{{--</footer>--}}
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

{{--@include('layouts-new.js')--}}
<script>

</script>
</body>
<!-- END: Body-->

</html>