<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>مركز الوادي للتدريب و التأهيل السياحي</title>
    <link rel="apple-touch-icon" href="//assets/vuexy/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" href="https://bayanpay.sa/wp-content/uploads/2021/02/cropped-Loop-Logo-Icon-Transparent-Small-v2-1-192x192.png" sizes="192x192" />

    {{--<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/vuexy/images/ico/favicon.ico')}}">--}}
    <link rel="shortcut icon" href="https://bayanpay.sa/wp-content/uploads/2021/02/cropped-Loop-Logo-Icon-Transparent-Small-v2-1-192x192.png" sizes="192x192" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vuexy/css/style.css')}}">
    <link rel="icon" href="{{asset('asset/images/logo.png')}}">

    <!-- END: Custom CSS-->
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Cairo&display=swap);


        body {
            margin : 0;
            font-family : "cairo", Helvetica, Arial, sans-serif;
            font-size : 1rem;
            font-weight : 400;
            line-height : 1.45;
            color : #6E6B7B;
            text-align : right;
            background-color : #F8F8F8;
        }

        input{
            direction: rtl !important;

        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
<!-- BEGIN: Content-->

                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-10 col-md-8 col-lg-6" style="padding:50px; border-radius:20px; box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;">
                           

                            <h2 class="card-title font-weight-bold mb-1">تسجيل الدخول! 👋</h2>
                            <p class="card-text mb-2">قم بادخال بيانات الدخول الخاصة بك لتتمتع بالدخول للموقع</p>

                            <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">@csrf
                                @if (session()->has('email'))
                                    <strong style="color: red">{{ session()->get('email') }}</strong>

                                @endif
                                @if (session()->has('stop'))
                                    <strong style="color: red">{{ session()->get('stop') }}</strong>

                                @endif
                                <div class="form-group">


                                    <label class="form-label" for="login-email">البريد الالكتروني</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="ahmed@example.com" aria-describedby="email" tabindex="1" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group" >
                                    <div class="d-flex justify-content-between" style="direction: rtl">
                                        <label for="login-password">كلمة المرور</label>
                                        {{--<a href="{{url()}}"><small>Forgot Password?</small></a>--}}
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2" required>
                                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        @if ($errors->has('password'))
                                            <div class="row"><span class="alert" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span></div>

                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="remember-me" name="remember" type="checkbox" tabindex="3" />
                                        <label class="custom-control-label" for="remember-me"> تذكرني </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block" style="background-color:#1976D2 ; color:#fff;" tabindex="4">دخول</button>
                            </form>
                        </div>
                    </div>
                    <!-- /Login-->
                </div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('/assets/vuexy/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/assets/vuexy/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/assets/vuexy/js/core/app-menu.js')}}"></script>
<script src="{{asset('/assets/vuexy/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('/assets/vuexy/js/scripts/pages/page-auth-login.js')}}"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>
