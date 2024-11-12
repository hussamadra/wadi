@extends('layouts.resettemplate')

@section('content')
<div id = "wrapper">
    <div id = "left" >
        <div class="flow">
<div id="signin">

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <h1 class="title-form Pcolor">نسيت كلمة المرور   </h1>

    <!-- <h1 class="title-form Pcolor">Sign in </h1> -->
    <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <input id="email" type="email" placeholder="الرجاء ادخال البريد الالكتروني" class="text-input" data-validation="email" data-email-message="Please enter valid email address."
            data-required-message="Required field" required data-msg-containerid="emailError" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
                        <div>
                             <input id="password" type="password" placeholder="الرجاء ادخال كلمة السر الجديدة " class="text-input" minlength="8" required @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                             <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="الرجاء تأكيد كلمة السر الجديدة " class="text-input" id="con_password" minlength="8" required>
                        </div>
                        <button type="submit" class="btn btn-primary" class=" btn btn-background-slide primary-btn"> إعادة تعيين كلمة المرور </button>
                        <div class="links">
                            <a href="{{ route('login') }}" class="forget"> لا انتظر , تذكرت كلمة المرور !</a>
                        </div>
                    </form>
                    <footer id= "main-footer">
                        <a href="{{ route('need') }}">تحتاج مساعدة ؟</a>
                    </footer>
                </div>
            </div>
                        </div>
                        <div id ="right">
                            <div class = "logo">
                                <img src="{{asset('asset/images/logo.png')}}" alt="Coworker">
                            </div>

                        </div>
                    </div>
                    <!-- <div class="ftxt"> www.OnlineWebFonts.Com </div> -->

@endsection
