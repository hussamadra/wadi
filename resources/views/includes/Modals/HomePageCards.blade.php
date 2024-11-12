<!-- Modal -->
<div class="modal fade" id="cards{{$branch->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{$branch->ar_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($branch->user as $user)

                        @php
                            $service_requests = \App\Models\ServiceRequest::where('user_id',$user->id)->where('status',1)->whereDate('created_at', '=', Carbon\Carbon::today())->pluck('id');
                            $additional_field_value = \App\Models\AdditionalFieldValue::whereIn('service_request_id',$service_requests)->pluck('additional_field_id');
                            $additional_field = \App\Models\AdditionalField::whereIn('id',$additional_field_value)->where('ar_name','LIKE','%'. 'المبلغ المقبوض' .'%')->pluck('id');
                            $total = \App\Models\AdditionalFieldValue::whereIn('additional_field_id',$additional_field)->whereIn('service_request_id',$service_requests)->pluck('ar_value');
                            $sum = array_sum(($total->toArray()));

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
                                <h5 class="text-center">{{$sum}}</h5>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
