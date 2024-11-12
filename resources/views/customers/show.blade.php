@extends('layouts-new.index')

@section('content')
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vuexy/vendors/css/forms/select/select2.min.css')}}">
    @endpush
    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- users filter start -->
            <div class="card">

                <div class="card-datatable table-responsive pt-0">
                    <table id="data_tb" class="user-list-table3 table table-hover">
                        <thead class="thead-light ">
                        <tr>
                            <th>رقم</th>
                            <th>الاسم</th>
                            <th>موبايل</th>
                            <th>بريد الكتروني</th>
                            <th>المبلغ الحالي</th>
                            <th>المبلغ المضاف الكلي</th>
                            <th>المبلغ المستخدم الكلي</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->mobile}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$current}}</td>
                            <td>{{$in}}</td>
                            <td>{{$out}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="card">--}}
                {{--<h5 class="card-header">خيارات البحث </h5>--}}
                {{--<form >--}}
                    {{--<div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">--}}
                        {{--<div class="col-md-3 user_jeha">--}}
                            {{--<label class="form-label">السنه</label>--}}
                            {{--<select class="form-control date"--}}
                                    {{--name="year" >--}}
                                {{--<option value="0"></option>--}}
                                {{--@for($i=2021;$i<2040;$i++)--}}
                                    {{--<option value="{{$i}}" @if(request()->year==$i) selected @endif>{{$i}}</option>--}}
                                {{--@endfor--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 user_jeha">--}}
                            {{--<label class="form-label">الشهر</label>--}}
                            {{--<select class="form-control date"--}}
                                    {{--name="month" >--}}
                                {{--<option value="0"></option>--}}
                                {{--@for($i=1;$i<12;$i++)--}}
                                    {{--<option value="{{str_pad($i, 2, '0', STR_PAD_LEFT)}}" @if(request()->month==str_pad($i, 2, '0', STR_PAD_LEFT)) selected @endif>{{$i}}</option>--}}
                                {{--@endfor--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 user_jeha">--}}
                            {{--<label class="form-label">اليوم</label>--}}
                            {{--<select class="form-control date"--}}
                                    {{--name="day" >--}}
                                {{--<option value="0"></option>--}}
                                {{--@for($i=1;$i<31;$i++)--}}
                                    {{--<option value="{{str_pad($i, 2, '0', STR_PAD_LEFT)}}" @if(request()->day==str_pad($i, 2, '0', STR_PAD_LEFT)) selected @endif>{{$i}}</option>--}}
                                {{--@endfor--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 user_status pt-1">--}}
                            {{--<button type="submit" class="btn btn-success">بحث</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--<hr>--}}
                {{--<div class=" row">--}}
                    {{--<div class="col-md-3 user_role2 mb-1"></div>--}}
                    {{--<div class="col-md-3 user_role mb-1"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- users filter end -->
            <!-- list section start -->
            <div class="card">

                <div class="card-datatable table-responsive pt-0">
                    <table id="data_tb" class="user-list-table table table-hover">
                        <thead class="thead-light ">
                        <tr>
                            <th>القيمه</th>
                            <th>النوع</th>
                            <th>التاريخ</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($carts as $cart)
                            <tr>
                                <td>{{$cart->amount}}</td>
                                <td>@if($cart->type==1) شحن @else  سحب@endif</td>
                                <td>{{$cart->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    @push('script')

    <script src="{{asset('assets/vuexy/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/vuexy/js/scripts/pages/app-customer-details-list.js')}}"></script>
    @endpush
@endsection

