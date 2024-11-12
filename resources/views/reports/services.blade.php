@extends('layouts-new.index')

@section('content')

    <div class="content-body">
        <div class="card">

            <div class="card-datatable table-responsive pt-0">
                <table id="data_tb1" class="user-list-table3 table table-hover">
                    <thead class="thead-light ">
                    <tr>
                        <th>رقم</th>
                        <th>الاسم</th>
                        <th>المورد</th>
                        <th>عدد الطلبات الكلي</th>
                        {{--<th>المبلغ الكلي</th>--}}
                        {{--<th>التسديد الكلي</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->supplier->ar_name}}</td>
                        <td>{{$total}}</td>
                        {{--<td>{{$out}}</td>--}}
                        {{--<td>{{$out}}</td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- list section start -->
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
            <div class="row p-2">
                <div class="col serv_role1 mb-1"></div>
                <div class="col serv_role2 mb-1"></div>
            </div>
            <hr>
        </div>
        <div class="card">

            <div class="card-datatable table-responsive pt-0">
                <table id="" class="user-list-table data_tb table table-hover">
                    <thead class="thead-light ">
                    <tr>
                        <th>#</th>
                        <th>رقم الطلب</th>
                        <th>المستخدم</th>
                        <th>الفرع</th>
                        @foreach($service->shownAdditionalFields as $field)
                            <th>{{$field->ar_name}}</th>
                        @endforeach
                        <th>تاريخ التعديل</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($service_requests as $serve)
                        @php $branch = \App\Models\Branch::where('id',$serve->current_branch)->first() @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$serve->id}}</td>
                            <td>{{$serve->user->name}}</td>
                            <td>{{$branch->ar_name}}</td>
                            @foreach($serve->additionalValues as $value)
                                @if($value->additionalField)
                                    @if($value->additionalField->show==1)
                                        @if(!in_array($value->additionalField->type,[4,5]))
                                            <td>{{$value->ar_value}}</td>
                                        @else
                                            <td>@include('components.file_link',['value'=>$value->ar_value])</td>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                            <td>{{$serve->updated_at}}</td>
                            <td>@include('includes.Modals.pending_service',['serve',$serve])</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')

        <script>
            $('table.data_tb').DataTable(
                {
                    initComplete: function () {
                        $(document).find('[data-toggle="tooltip"]').tooltip();
                        this.api()
                            .columns(2)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> المستخدم</option></select>'
                                )
                                    .appendTo('.serv_role1')
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
                            .columns(3)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الفرع</option></select>'
                                )
                                    .appendTo('.serv_role2')
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
            var id = "{{$service->id}}"
        </script>
        <script src="{{asset('assets/vuexy/js/scripts/pages/app-service-list.js')}}"></script>

    @endpush
@endsection

