@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="repeat"
                              action="{{route('reservations.update',$reservation->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row d-flex align-items-end pb-1 pt-2">

                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">اسم صاحب العلاقة</h6>
                                    <select class="form-control" name="customer_id" required>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}" {{($customer->id == $reservation->customer_id) ? 'selected' : ''}}>{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">المدة</h6>
                                    <select class="form-control" name="rent_plan_id" required>
                                        @foreach($rent_plans as $rent_plan)
                                            <option
                                                {{($rent_plan->id==$reservation->rent_plan_id) ? 'selected' : ''}} value="{{$rent_plan->id}}">{{$rent_plan->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 ">
                                    <h6 class="invoice-to-title">الصالة</h6>
                                    <select id="branch_select" class="form-control" name="branch_id" required>
                                        @foreach($branches as $branch)
                                            <option
                                                {{($branch->id==$reservation->rent_item->branch_id)?'selected':''}} value="{{$branch->id}}">{{$branch->ar_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">المكتب</h6>
                                    <select id="rent_item_select" class="form-control" name="rent_item_id" required>
                                        <option value="{{$reservation->rent_item->id}}"
                                                selected>{{$reservation->rent_item->name}} </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">من</label>
                                    <input type="datetime-local" class="form-control date" name="start_date"
                                           value="{{date('Y-m-d\TH:i', strtotime($reservation->start_date))}}"/>
                                </div>
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">عدد التكرار</label>
                                    <input type="number" class="form-control" name="repeat_count" required min="1"
                                           value="{{$reservation->repeat_count}}"/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">الكلفة</label>
                                    <input type="text" class="form-control" name="cost" value="{{$reservation->cost}}"/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-12 user_jeha">
                                    <h6 class="invoice-to-title">تفاصيل </h6>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$reservation->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')

    <script src={{asset('js/jquery.repeater.min.js')}}></script>
    <script>
        let branches = @json($branches)

        $("#branch_select").change(event => {
            let branch_id = $("#branch_select").val();

            let branch = branches.find(value => {
                    return value.id == branch_id
                }
            )
            $("#rent_item_select").children().remove()
            $("#rent_item_select").append('<option selected value="" disabled> اختر مكتب</option>')

            branch.rent_items.forEach((model) => {
                $("#rent_item_select")
                    .append('<option value="' + model.id + '">' + model.name + '</option>')
            })

        })
    </script>
@endpush
