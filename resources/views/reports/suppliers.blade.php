@extends('layouts-new.index')

@section('content')
    @push('css')
        <link rel="stylesheet" type="text/css"
              href="{{asset('assets/vuexy/vendors/css/forms/select/select2.min.css')}}">
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
                            <th> المبلغ الكلي</th>
                            <th>التسديد الكلي</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{$supplier->id}}</td>
                            <td>{{$supplier->ar_name}}</td>
                            <td>{{$in}}</td>
                            <td>{{$out}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">خيارات البحث </h5>
                <form>
                    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                        <div class="col-md-3 user_jeha">
                            <label class="form-label">السنه</label>
                            <select class="form-control date"
                                    name="year">
                                <option value="0"></option>
                                @for($i=2021;$i<2040;$i++)
                                    <option value="{{$i}}" @if(request()->year==$i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3 user_jeha">
                            <label class="form-label">الشهر</label>
                            <select class="form-control date"
                                    name="month">
                                <option value="0"></option>
                                @for($i=1;$i<12;$i++)
                                    <option value="{{str_pad($i, 2, '0', STR_PAD_LEFT)}}"
                                            @if(request()->month==str_pad($i, 2, '0', STR_PAD_LEFT)) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3 user_jeha">
                            <label class="form-label">اليوم</label>
                            <select class="form-control date"
                                    name="day">
                                <option value="0"></option>
                                @for($i=1;$i<31;$i++)
                                    <option value="{{str_pad($i, 2, '0', STR_PAD_LEFT)}}"
                                            @if(request()->day==str_pad($i, 2, '0', STR_PAD_LEFT)) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3 user_status pt-1">
                            <button type="submit" class="btn btn-success">بحث</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class=" row">
                    <div class="col-md-3 user_role2 mb-1"></div>
                    <div class="col-md-3 user_role mb-1"></div>
                </div>
            </div>
            <!-- users filter end -->
            <!-- list section start -->
            <div class="card">

                <div class="card-datatable table-responsive pt-0">
                    {{--                    <table id="data_tb" class="user-list-table table table-hover">--}}
                    {{--                        <thead class="thead-light ">--}}
                    {{--                        <tr>--}}
                    {{--                            <th>الخدمة</th>--}}
                    {{--                            <th>الفرع</th>--}}
                    {{--                            <th>عدد الزبائن</th>--}}
                    {{--                        </tr>--}}
                    {{--                        </thead>--}}
                    {{--                        <tbody>--}}

                    {{--                        @foreach($service_requests as $service_request)--}}
                    {{--                            <tr>--}}
                    {{--                                <td>{{$service_request->name}}</td>--}}
                    {{--                                <td>{{\App\Models\User::find($service_request->user_id)?->branch?->ar_name}}</td>--}}
                    {{--                                <td>{{$service_request->count}}</td>--}}
                    {{--                            </tr>--}}
                    {{--                        @endforeach--}}
                    {{--                        </tbody>--}}
                    {{--                    </table>--}}

                    @php $i=1 @endphp
                    @foreach($services as $service)
                        <input type="hidden" id="services_count" value="{{count($services)}}">
                        @php $service_request = \App\Models\ServiceRequest::where('service_id',$service->id)->first() @endphp

                        <div class="card">
                            <div class="card-body" style="overflow-x: auto">
                                <h4 class="m-2">{{$service?->supplier->ar_name}}-{{$service->name}}</h4>
                                <table id="" class="data_tb_{{$i++}} user-list-table table table-hover">
                                    <thead class="thead-light ">

                                    <tr>
                                        @if($service_request?->service->shownAdditionalFields)
                                            <th>الخدمة</th>
                                            <th>رقم الطلب</th>
                                            @foreach($service_request->service->shownAdditionalFields as $field)
                                                <th>{{$field->ar_name}}</th>
                                            @endforeach
                                            <th>المستخدم</th>
                                            <th>الزبون</th>
                                            <th>الفرع</th>
                                            <th>التاريخ</th>
                                        @else
                                            <th><h5 class="text-center">لا يوجد بيانات لعرضها</h5></th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($service?->service_request as $service_req)
                                        <tr>
                                            <td>{{$service_req?->service->name}}-{{$service_req?->service?->supplier?->ar_name}}</td>
                                            <td>{{$service_req->id}}</td>
                                            @php $additional_field_values = \App\Models\AdditionalFieldValue::where('service_request_id',$service_req->id)->get(); @endphp
                                            @foreach($additional_field_values as $value)
                                                @if($value->additionalField)
                                                    @if($value->additionalField->show==1)
                                                        @if(!in_array($value->additionalField->type,[4,5]))
                                                            <td>{{$value?->ar_value}}</td>
                                                        @endif
                                                    @endif
                                                @endif
                                                @php $customer_request = \App\Models\CustomerRequest::where('id',$value->customer_service_request_id)->first();  @endphp
                                                @php $customer = \App\Models\Customer::where('id',$customer_request->customer_id)->first(); @endphp
                                            @endforeach
                                            <td>{{$service_req?->user->name}}</td>
                                            <td>{{$customer->name ?? ''}}</td>
                                            <td>{{$service_req?->user?->branch?->ar_name}}</td>
                                            <td>{{$service_req->created_at}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>

        </section>
    </div>
    @push('script')
        <script>

                services_count = $('#services_count').val();
                console.log(services_count);
                for ( i=1; i <= services_count;i++ ){
                    console.log(i)
                    $('.data_tb_' + i).DataTable({
                        'order':[[1,'desc']],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel'
                        ],
                    } )
                }


        </script>
        <script src="{{asset('assets/vuexy/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/vuexy/js/scripts/pages/app-supplier-report-list.js')}}"></script>
    @endpush
@endsection

