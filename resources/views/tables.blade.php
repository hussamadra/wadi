    {{-- يطاقة التعريف --}}

@if ($ide != null)
<div class="card-datatable table-responsive pt-0">
    <table id="data_tb" class="user-list-table table ">
        <thead class="thead-light ">
            <h1>بطاقة تعريف الطالب</h1>
            <tr>
                <th>اسم الطالب</th>
                <th>الفرع</th>
                <th>السنة</th>
                <th>الاختصاص</th>
                <th>تاريخ الاضافة</th>
                <th colspan="3">الاجراءات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $ide->branch }}</td>
                <td>{{ $ide->year }}</td>
                <td>{{ $ide->special }}</td>
                <td>{{ $ide->created_at }}</td>
                @include('components.actions', ['route' => 'ides', 'data' => $ide])
            </tr>

        </tbody>
    </table>
</div>

@endif

  {{-- وثيقة دوام/تأجيل --}}
    @if ($work != null)
    <div class="card-datatable table-responsive pt-0">

        <table id="data_tb" class="user-list-table table ">
            <thead class="thead-light ">
                <h1> وثيقة دوام/تأجيل</h1>
                <tr>
                    <th>اسم الأب</th>
                    <th>الجنسية</th>
                    <th>السنة الدراسية</th>
                    <th colspan="3">الاجراءات</th>



                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $work->nation }}</td>
                    <td>{{ $work->year }}</td>
                    @include('components.actions', ['route' => 'workdocs', 'data' => $work])
                </tr>

            </tbody>
        </table>
    </div>

@endif

    {{-- طلبات التسجيل --}}
     @if ($orders->count() > 0)
        <div class="card-datatable table-responsive pt-0">
            <table id="data_tb" class="user-list-table table ">
                <thead class="thead-light ">
                    </br>
                    </br>
                    <h1>طلبات التسجيل</h1>
                    <tr>
                        <th>الترميز</th>
                        <th>الاسم و الشهرة</th>
                        <th>نوع طلب التسجيل</th>
                        <th>الفرع</th>
                        <th>تاريخ الاضافة</th>
                        <th colspan="3">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->type }}</td>
                            <td>{{ $order->certificate }}</td>
                            <td>{{ $order->certificate_type }}</td>
                            <td>{{ $order->branch }}</td>
                            @include('components.actions', [
                                'route' => 'registering',
                                'data' => $order,
                            ])
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endif




{{-- promesses --}}
 @if ($promesses->count() > 0)
    <div class="card-datatable table-responsive pt-0">

        <table id="data_tb" class="user-list-table table ">
            <thead class="thead-light ">
                <h1>التعهدات</h1>
                <tr>
                    <th>التاريخ</th>
                    <th>تاريح الاضافة</th>
                    <th colspan="3">الاجراءات</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($promesses as $promess)
                    <tr>
                        <td>{{ $promess->date }}</td>

                        <td>{{ $promess->created_at }}</td>
                        @include('components.actions', [
                            'route' => 'promises',
                            'data' => $promess,
                        ])
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endif


    {{-- ايصالات الدفع --}}

 @if ($receipts->count() > 0)
<div class="card-datatable table-responsive pt-0">
    <table id="data_tb" class="user-list-table table ">
        <thead class="thead-light ">
            <h1>ايصالات دفع</h1>
            <tr>
                <th>اسم الطالب</th>
                <th>الفرع</th>
                <th>الدورة</th>
                <th>المبلغ</th>
                <th>التاريخ</th>
                <th colspan="3">ااجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->student->first_name }} {{ $receipt->student->last_name }}</td>
                    <td>{{ $receipt->branch_name }}</td>
                    <td>{{ $receipt->course }}</td>
                    <td>{{ $receipt->amount }}</td>
                    <td>{{ $receipt->date }}</td>
                    @include('components.actions', [
                        'route' => 'receipts',
                        'data' => $receipt,
                    ])
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endif
