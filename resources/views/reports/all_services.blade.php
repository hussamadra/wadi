@extends('layouts-new.index')

@section('content')

    <div class="card">
        <h5 class="card-header">خيارات البحث </h5>
        <form>
            <div class="row mx-1">
                <div class="col-md user_jeha">
                    <label class="form-label">من</label>
                    <input type="date" class="form-control date" name="from" id="min" value="{{request()->from}}"/>
                </div>
                <div class="col-md user_jeha">
                    <label class="form-label">الى</label>
                    <input type="date" class="form-control date" name="to" id="max" value="{{request()->to}}"/>
                </div>
                <div class="col-md user_status pt-1">
                    <button type="submit" class="btn btn-success">بحث</button>
                    <button form="searchForm" type="reset" value="Reset" class="btn btn-primary" id="reset_id">Reset
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <br>
        <div class="row p-2">
            <div class="col user_role1 mb-1"></div>
            <div class="col user_role2 mb-1"></div>
            <div class="col user_role3 mb-1"></div>
            <div class="col user_role4 mb-1"></div>
            <div class="col user_role5 mb-1"></div>
        </div>
    </div>
    <div class="card">

        @php $i=1; @endphp

        <div class="card-datatable table-responsive p-2" style="overflow-x: auto">
            <table id="data_tb"
                   class="data_tb user-list-table table table table-striped table-bordered nowrap">
                <thead class="thead-light">
                {{--                @forelse($reports as $service_req)--}}
                <tr>
                    <th>#</th>
                    <th>المورد</th>
                    <th>الخدمة</th>
                    <th>الطلب</th>
                    <th>الفرع</th>
                    <th>الموظف</th>
                    <th>الزبون</th>
                    @php
                        $number ='رقم';
                        $paid = 'المبلغ المطلوب';
                        $held = 'المبلغ المقبوض';
                        $fields = \App\Models\AdditionalField::where('common',1)->groupBy('ar_name')->orderBy('sort','asc')->
                        where('comment', 'LIKE', '%'.$number.'%')->
                         orWhere('ar_name', 'LIKE', '%'.$paid.'%')->
                         orWhere('ar_name', 'LIKE', '%'.$held.'%')->get();
                     $fields_ids = \App\Models\AdditionalField::where('common',1)->groupBy('ar_name')->orderBy('sort','asc')->
                        where('comment', 'LIKE', '%'.$number.'%')->
                         orWhere('ar_name', 'LIKE', '%'.$paid.'%')->
                         orWhere('ar_name', 'LIKE', '%'.$held.'%')->pluck('id');
                    @endphp
                    @foreach($fields as $value)
                        <th>{{$value->ar_name ?? ''}}</th>
                    @endforeach
                    <th>تاريخ الانشاء</th>
                    <th>تاريخ التعديل</th>
                    <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($reports as $service_req)

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$service_req->service?->supplier?->ar_name}}</td>
                        <td>{{$service_req->service?->name ?? ''}}</td>
                        <td>{{$service_req->id}}</td>
                        @php $branch = \App\Models\Branch::where('id',$service_req->current_branch)->first(); @endphp
                        <td>{{$branch->ar_name ?? ''}}</td>
                        <td>{{$service_req?->user?->name ?? ''}}</td>

                        @php $additional_field_values = \App\Models\AdditionalFieldValue::where('service_request_id',$service_req->id)->get(); @endphp
                        @php $customer_service_request_id= $additional_field_values[0]['customer_service_request_id'];
                                $customer_request  = \App\Models\CustomerRequest::where('id',$customer_service_request_id)->first();
                                $customer = \App\Models\Customer::where('id',$customer_request->customer_id)->first();
                        @endphp
                        <td>{{$customer->name ?? ''}}</td>

                        @foreach($additional_field_values as $value)
                            {{--                            {{dd($value)}}--}}
                            @php $additionField = \App\Models\AdditionalField::where('id',$value->additional_field_id)->get();
                            @endphp
                            @if($value->additionalField)
                                @if($value->additionalField->show==1)
                                    @if(!in_array($value->additionalField->type,[4,5]))
                                        @if($value->additionalField->common == 1)
                                            <td>{{$value->ar_value ?? ''}}</td>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endforeach
                        <td>{{$service_req->created_at ?? ''}}</td>
                        <td>{{$service_req->updated_at ?? ''}}</td>
                        <td> @include('includes.Modals.pending_service',['serve'=>$service_req])</td>
                    </tr>

                @empty
                    <h4 class="text-center p-2 m-2">لا يوجد بيانات </h4>
                </tbody>
                @endforelse
            </table>
        </div>
        <hr>
        {{--            @endif--}}
        {{--            @endif--}}

    </div>

    @push('script')
        <script>
          $('table.data_tb').DataTable(
                {
                    initComplete: function () {
                        $(document).find('[data-toggle="tooltip"]').tooltip();
                        this.api()
                            .columns(1)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> المورد</option></select>'
                                )
                                    .appendTo('.user_role1')
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                    });
                            });
                        this.api()
                            .columns(2)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الخدمة</option></select>'
                                )
                                    .appendTo('.user_role2')
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                    });
                            });

                        this.api()
                            .columns(4)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الفرع</option></select>'
                                )
                                    .appendTo('.user_role3')
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                    });
                            });

                        this.api()
                            .columns(5)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الموظف</option></select>'
                                )
                                    .appendTo('.user_role4')
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                    });
                            });
                        this.api()
                            .columns(6)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الزبون</option></select>'
                                )
                                    .appendTo('.user_role5')
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                    });
                            });
                    }, drawCallback: function () {
                        $(document).find('[data-toggle="tooltip"]').tooltip();
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                });

        </script>
        <script>
            $('#reset_id').click(function () {
                $('#supplier').val('');
                $('#service').val('');
                $('#branch').val('');
                $('#user').val('');
                $('#customer').val('');
                $('#from').val('');
                $('#to').val('');
            })
        </script>
    @endpush
@endsection

