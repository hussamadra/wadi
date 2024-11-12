@extends('layouts-new.index')

@section('content')
    @push('css')
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/vuexy/vendors/css/forms/select/select2.min.css')}}">
    @endpush

    <div class="content-body" id="home_page">
        <div class="d-flex justify-content-center">
            <div class="align-self-center">
                <h3 class="text-center">مرحبا بك في مركز الوادي للتأهيل و التدريب السياحي و الفندقي 👋</h3>
                <img src="{{asset('asset/images/logo.jpeg')}}" />
            </div>
        </div>

    </div>
    @push('script')
        <script src="{{asset('assets/vuexy/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/vuexy/js/scripts/pages/app-user-report-list.js')}}"></script>
        <script>
            setInterval(function () {
                $("#home_page").load(location.href + " #home_page");
                console.log('refresh');
            }, 30000)
        </script>
    @endpush
@endsection

