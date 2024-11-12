@role(' مشرف مالي|مدير تقني|مشرف مراكز|مدير عام')
<div class="row">
    @foreach($branches as $branch)
        @php $users = $branch->user;
                $users_id = $users->pluck('id');
                // المبلغ المقبوض وتم تنفيذه
                if ($branch->id == 13) //deybak
                    {
                $service_requests = \App\Models\ServiceRequest::whereIn('user_id',$users_id)->where('status',1)->where( \DB::raw('MONTH(created_at)'), '=', date('n') )->pluck('id');
                    }
                    else{
                $service_requests = \App\Models\ServiceRequest::whereIn('user_id',$users_id)->where('status',1)->whereDate('created_at', '=', Carbon\Carbon::today())->pluck('id');

                    }

                $additional_field_value = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests)->pluck('additional_field_id');
                $additional_field = \App\Models\AdditionalField::whereIn('id',$additional_field_value)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
                $total = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field)->whereIn('service_request_id',$service_requests)->pluck('ar_value');
                $sum = array_sum(($total->toArray()));

                // المبلغ المقبوض ولم يتم تنفيذه
                if ($branch->id == 13){
                    $service_requests1 = \App\Models\ServiceRequest::whereIn('user_id',$users_id)->where('status',1)->whereMonth('created_at', '=', Carbon\Carbon::now()->subMonth()->month)->pluck('id');
                }else{
                  $service_requests1 = \App\Models\ServiceRequest::whereIn('user_id',$users_id)->where('status',0)->pluck('id');
                }
                $additional_field_value1 = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests1)->pluck('additional_field_id');
                $additional_field1 = \App\Models\AdditionalField::whereIn('id',$additional_field_value1)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
                $total1 = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field1)->whereIn('service_request_id',$service_requests1)->pluck('ar_value');
                $sum1 = array_sum(($total1->toArray()));

        @endphp

        <div class="col-3">
            <a data-toggle="modal" data-target="#cards{{$branch->id}}">
                @include('includes.Modals.HomePageCards')
                <div class="card">
                    <div class="card-header align-items-start">
                        <div>
                            <h3 class="card-text">{{$branch->ar_name}}</h3>
                        </div>
                        <div class="avatar bg-light-warning p-50">
                            <div class="avatar-content">
                                <i data-feather="shopping-cart" class="font-medium-5"></i>
                            </div>
                        </div>
                    </div>

                    @if ($branch->id == 13)  {{-- deybak --}}
                    <h5 class="text-center"> رصيد هذا الشهر : <span> {{$sum}} </span></h5>
                    <h5 class="text-center"> رصيد الشهر الماضي : </h5><input type="text" style="border: none"
                                                                             class="form-control text-center"
                                                                             value=" {{$sum1}}"
                                                                             id="{{$branch->id.'_'.$sum1}}">

                    @else
                        <h5 class="text-center"> تم تنفيذه : <span> {{$sum}} </span></h5>
                        <h5 class="text-center"> لم تم تنفيذه : <span> {{$sum1}} </span></h5>
                    @endif
                </div>
            </a>
        </div>

    @endforeach
</div>
@endrole

{{--        --------------------------------------------}}


@role('مدير تقني')
<div class="card">
    <div class="card-body">
        <h4>عمليات تسجيل الدخول والخروج</h4>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>المستخدم</th>
                <th> تسجيل الدخول</th>
                <th> تسجيل الخروج</th>
                <th>الفرع</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1 @endphp
            @foreach($sessions as $session)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$session->user->name}}</td>
                    <td>{{$session->created_at}}</td>
                    <td>{{$session->logout}}</td>
                    <td>{{$session->user->branch->ar_name}}</td>
                </tr>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
@endrole


{{--        -------------------------------------------}}


@role('مشرف مركز مشترك|مشرف مركز')
<div class="card">
    <div class="card-body">
        <h2>مركز {{$branches->ar_name}}</h2>
        <div class="row">
            <div class="col-">
                <form action="{{route('services.user_amount_yesterday')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$branches->id}}" name="branch_id">
                    <button class="btn btn-outline-primary">عرض أرصدة الأمس</button>
                </form>
            </div>
            <div class="col">
                <button class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal">تصفير
                    رصيد أمس
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل متأكد من عملية التصفير </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('services.reset_user_amount')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{$branches->id}}" name="branch_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-outline-danger">تأكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach($branches->user as $user)

        @php
            //today
                $service_requests = \App\Models\ServiceRequest::where('user_id',$user->id)->where('status',1)->whereDate('created_at', '=', Carbon\Carbon::today())->pluck('id');
                $additional_field_value = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests)->pluck('additional_field_id');
                $additional_field = \App\Models\AdditionalField::whereIn('id',$additional_field_value)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
                $total = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field)->whereIn('service_request_id',$service_requests)->pluck('ar_value');
                $sum = array_sum(($total->toArray()));

            //yesterday
                $service_requests1 = \App\Models\ServiceRequest::where('user_id',$user->id)->where('status',1)->whereDate('created_at', '=', Carbon\Carbon::yesterday())->pluck('id');
                $additional_field_value1 = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests1)->pluck('additional_field_id');
                $additional_field1 = \App\Models\AdditionalField::whereIn('id',$additional_field_value1)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
                $total1 = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field1)->whereIn('service_request_id',$service_requests1)->pluck('ar_value');

                if ($user->check_mount == Null){
                  $sum1 = 0;
                }else{
                $sum1 = array_sum(($total1->toArray()));
                }
        @endphp
        <div class="col-3">
            <div class="card">
                <div class="card-header align-items-start">
                    <div>
                        <h3 class="card-text">{{$user->name}}</h3>
                    </div>
                    <div class="avatar bg-light-warning p-50">
                        <div class="avatar-content">
                            <i data-feather="" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <h5 class="text-center"><span>{{$sum}}</span> رصيد اليوم </h5>
                <h5 class="text-center"><span>{{$sum1}}</span> رصيد أمس </h5>

            </div>
        </div>
    @endforeach
</div>
@endrole
