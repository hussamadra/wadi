
@role('موظف تسديد امامي|موظف تسديد خلفي')
@php
    $user = \Illuminate\Support\Facades\Auth::user();
    $service_requests= \App\Models\ServiceRequest::where('user_id',$user->id)->where('status',1)->whereDate('created_at', '=', Carbon\Carbon::today())->pluck('id');
    $additional_field_value = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests)->pluck('additional_field_id');
    $additional_field = \App\Models\AdditionalField::whereIn('id',$additional_field_value)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
    $total = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field)->whereIn('service_request_id',$service_requests)->pluck('ar_value');
    $sum = array_sum(($total->toArray()));
@endphp
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-header align-items-start">
                <div>
                    <h3 class="card-text"> {{$user->name}} </h3>
                </div>
                <div class="avatar bg-light-warning p-50">
                    <div class="avatar-content">
                        <i data-feather="shopping-cart" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
            <h5 class="text-center"> {{$sum}} </h5>

        </div>
    </div>
</div>
@endrole
