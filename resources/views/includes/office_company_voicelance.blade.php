<div class="row mx-1">
    <div class="col-md user_role1 mb-1"></div>
    <div class="col-md user_role2 mb-1"></div>
    <div class="col-md user_role3 mb-1"></div>
    <div class="col-md user_role4 mb-1"></div>
    <div class="col-md user_role5 mb-1"></div>
</div>

        <h3>{{$company}}</h3>
        <table id="data_tb_{{$table}}" class="user-list-table table table table-striped table-bordered nowrap">
            <thead class="thead-light ">
            <tr>
                <th>رقم العقد</th>
                <th>محافظة</th>
                <th>شركة</th>
                <th>الزبون</th>
                <th>تاريخ الاصدار</th>
                <th>مدة العقد</th>
                <th>البناء</th>
                <th>الغرفة</th>
                <th>الديسك</th>
                <th>الساعة</th>
                <th>سنة الاصدار</th>
                <th>رمز العقد</th>
                <th>حالة البيع</th>
                <th>حالة العقد</th>
                <th>العمليات</th>
            </tr>
            </thead>
            <tbody>

            {{--                @php $i=1 @endphp--}}
            @foreach ($office_requests as $office_request)

                <tr>
                    <td>{{ $office_request->SN }}</td>
                    <td>{{ $office_request->governorate }}</td>
                    <td>{{ $office_request->company_name ?? ''}}</td>
                    <td>{{ $office_request->contract ?? '' }}</td>
                    <td>{{Carbon\Carbon::parse($office_request->date)->format('Y-m-d')}}</td>
                    <td>مدة</td>
                    <td>{{ $office_request->building ?? ''  }}</td>
                    <td>{{ $office_request->floor }}</td>
                    <td>{{ $office_request->office }}</td>
                    <td>{{ $office_request->hours }}</td>
                    <td>{{ $office_request->year }}</td>
                    <td>{{ $office_request->code}}</td>
                    <td>حالة البيع</td>
                    <td>حالة العقد</td>
                    <td>
                        @can($route.'.edit')
                            <a href="{{route($route.'.edit',$office_request->id)}}">
                                <i data-feather='edit-2' class="text-warning"></i> تعديل
                            </a>
                            <br>
                        @endcan
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>



