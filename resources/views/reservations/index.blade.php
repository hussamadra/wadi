@extends('layouts-new.index')

@section('content')

    <div class="card">
        @include('rent_items.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
        <div class="row p-2">
            <div class="col-4">
{{--                @can('manage_rents') <a href="{{route('rent_plans.index')}}" class="btn btn-outline-dark">ادارة خطط الحجوزات</a> @endcan--}}
            </div>
        </div>
        <h5 class="card-header">خيارات البحث </h5>
        <form id="searchForm">
            <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                <div class="col-md-2 user_jeha">
                    <label class="form-label">نص</label>
                    <input type="text" class="form-control date" name="text" value="{{request()->text}}"/>
                </div>
                <div class="col-md-3 user_jeha">
                    <label class="form-label">من</label>
                    <input type="datetime-local" class="form-control date" name="from" value="{{request()->from}}"/>
                </div>
                <div class="col-md-3 user_jeha">
                    <label class="form-label">الى</label>
                    <input type="datetime-local" class="form-control date" name="to" value="{{request()->to}}"/>
                </div>
                <div class="col-md-2 ">
                    <h6 class="invoice-to-title">الصالة</h6>
                    <select id="branch_select" class="form-control" name="branch_id">
                        <option value="" selected>غير محدد</option>
                        @foreach($branches as $branch)
                            <option
                                {{($branch->id==request()->branch_id)?'selected':''}} value="{{$branch->id}}">{{$branch->ar_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">المكتب</h6>
                    <select id="rent_item_select" class="form-control" name="rent_item_id">
                        <option value="" selected disabled>اختر مكتب</option>
                    </select>
                </div>
                <div class="col-md-3 user_status pt-1">
                    <button type="submit" class="btn btn-success">بحث</button>
                    <button form="searchForm" type="reset" value="Reset" class="btn btn-primary" id="reset_id">Reset
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <div class="card-datatable table-responsive pt-0">
            <table id="data_tb" class="user-list-table table ">
                <thead class="thead-light ">
                <tr>
                    <th>اسم صاحب العلاقة</th>
                    <th>اسم المكتب</th>
                    <th>الصالة</th>
                    <th>تاريخ البداية</th>
                    <th>تاريخ النهاية</th>
                    <th>الكلفة</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->customer->name }}</td>
                        <td>{{ $reservation->rent_item->name }}</td>
                        <td>{{ $reservation->rent_item->branch->ar_name }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->cost }}</td>
                        @include('reservations.actions',['route'=>$route,'data'=>$reservation])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
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

        $('#reset_id').trigger("reset");
    </script>
    <script>
        $(document).ready(function() {
            $('#data_tb').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
            } );
        } );
    </script>
@endpush

