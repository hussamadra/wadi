
@unlessrole('مشرف مالي|موظف تسديد امامي|وزارة|وزارة التجارة الداخلية-كووركر مرنة|وزارة التجارة الداخلية - فويس لانس|وزارة التجارة الداخلية-تماسك|وزارة التجارة الداخلية-ايفو ديسك')
@if($pendings)
    <div class="card">
        <div class="card-body">
            <h4>الطلبات المعلقة</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>رقم الطلب</th>
                    <th>تاريخ الطلب</th>
                    <th>اسم المستخدم</th>
                    <th>اسم الخدمة المطلوبة</th>
                    <th>الفرع</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($pendings as $pending)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$pending->id}}</td>
                        <td>{{$pending->created_at}}</td>
                        <td>{{$pending->user->name}}</td>
                        <td>{{$pending->service->name}}</td>
                        @php $branch = \App\Models\Branch::FindOrFail($pending->current_branch) @endphp
                        <td>{{$branch->ar_name}}</td>
                    </tr>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endunlessrole
@endif

{{--        ------------------------------------------}}


<hr>
@unlessrole('مشرف مالي|وزارة|وزارة التجارة الداخلية-كووركر مرنة|وزارة التجارة الداخلية - فويس لانس|وزارة التجارة الداخلية-تماسك|وزارة التجارة الداخلية-ايفو ديسك')
@if($dones)
    <div class="card">
        <div class="card-body">
            <h4>الطلبات المنفذة</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>رقم الطلب</th>
                    <th>تاريخ الطلب</th>
                    <th>اسم المستخدم</th>
                    <th>اسم الخدمة المطلوبة</th>
                    <th>الفرع</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                @foreach($dones as $done)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$done->id}}</td>
                        <td>{{$done->created_at}}</td>
                        <td>{{$done->user->name}}</td>
                        <td>{{$done->service->name}}</td>
                        @php $branch = \App\Models\Branch::FindOrFail($done->current_branch) @endphp
                        <td>{{$branch->ar_name ?? '' }}</td>
                    </tr>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endunlessrole
