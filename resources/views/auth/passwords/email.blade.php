@extends('layouts.resettemplate')

@section('content')
<div class="container">
    <div id = "wrapper">
        <div id = "left" >
            <div class="flow">
<div id="signin">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h1 class="title-form Pcolor">نسيت كلمة المرور   </h1>
                            <div>
                                <input id="email" type="email" placeholder="الرجاء ادخال البريد الالكتروني" class="text-input" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <button type="submit" class=" btn btn-background-slide primary-btn">
                                    إعادة تعيين كلمة المرور
                                </button>
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
@endsection
