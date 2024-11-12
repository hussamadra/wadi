@extends('layouts-new.index')

@section('content')

    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- users filter start -->
            <div class="card">
                <h5 class="card-header">خيارات البحث </h5>
                <form id="searchForm">
                    <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                        <div class="col-md-2 ">
                            <h6 class="invoice-to-title">اسم المستخدم</h6>
                            <select id="branch_select1" class="form-control" name="user_id">
                                <option value="" selected>غير محدد</option>
                                @foreach($all_users as $user)
                                    <option
                                        {{($user->id==request()->user_id)?'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <h6 class="invoice-to-title">الفرع</h6>
                            <select id="branch_select2" class="form-control" name="branch_id">
                                <option value="" selected>غير محدد</option>
                                @foreach($branches as $branch)
                                    <option
                                        {{($branch->id==request()->branch_id)?'selected':''}} value="{{$branch->id}}">{{$branch->ar_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 user_status pt-1">
                            <button type="submit" class="btn btn-success">بحث</button>
{{--                            <button form="searchForm" type="reset" value="Reset" class="btn btn-primary" id="reset_id">--}}
{{--                                Reset--}}
{{--                            </button>--}}
                            <button class="btn btn-primary" id="reset_id">
                                Reset
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- users filter end -->
    <!-- list section start -->
    <div class="card">

        <div class="card-datatable table-responsive pt-0">
            <table id="data_tb" class="user-list-table table table-hover">
                <thead class="thead-light ">
                <tr>
                    <th>رقم</th>
                    <th>رقم المستخدم</th>
                    <th>الاسم</th>
                    <th>الفرع</th>
                    {{--<th>المبلغ</th>--}}
                    {{--<th>التسديد</th>--}}
                    <th>تاريخ الدخول</th>
                    <th>تاريخ الخروج</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->user->mobile ?? ''}} </td>
                        <td>{{$user->user->name ?? ''}}</td>
                        <td>{{$user->user->branch->ar_name ?? ''}}</td>
                        {{--<td>{{$user->in}}</td>--}}
                        {{--<td>{{$user->out}}</td>--}}
                        <td>{{$user->created_at ?? ''}}</td>
                        <td>{{$user->logout ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </section>

    @push('script')
        <script>
            $(document).ready(function() {
                $('#data_tb').DataTable( {
                    'order':[[4,'desc']],
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                } );
            } );
        </script>
        <script>
        // $('#data_tb').DataTable({
        //     'order':[[4,'desc']],
        //
        // });
        </script>
        <script src="{{asset('assets/vuexy/js/scripts/pages/app-report-list.js')}}"></script>
        <script>
            $('#reset_id').click(function (){
                $("#branch_select1").prop("selectedIndex", 0)
                $("#branch_select2").prop("selectedIndex", 0)
            });
        </script>
    @endpush
@endsection

