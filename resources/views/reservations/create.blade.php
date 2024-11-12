@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card ml-4 mr-4">
                    <div class="card-body">
                        <form method="post" id="repeat"
                              action="{{route('reservations.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">اسم صاحب العلاقة</h6>
                                    <select class="form-control" name="customer_id" required>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-6 ">
                                    <h6 class="invoice-to-title">الصالة</h6>
                                    <select id="branch_select" class="form-control" name="branch_id" required>
                                        <option value="" selected disabled>اختر صالة</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->ar_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">المكتب</h6>
                                    <select id="rent_item_select" class="form-control" name="rent_item_id" required>
                                        <option value="" selected disabled>اختر مكتب</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">المدة</label>
                                    <select name="rent_plan_id" id="rent_plan_id" class="form-control">
                                        @foreach($rent_plans as $rent_plan)
                                            <option value="{{$rent_plan->id}}">{{$rent_plan->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">عدد التكرار</label>
                                    <input type="number" class="form-control" name="repeat_count" required min="1"/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">من</label>
                                    <input type="datetime-local" class="form-control date" name="start_date"/>
                                </div>

                                <div class="col-md-6 user_jeha">
                                    <label class="form-label">الكلفة</label>
                                    <input type="text" class="form-control" name="cost"/>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">تفاصيل </h6>
                                    <textarea type="text" class="form-control" name="description"></textarea>
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
