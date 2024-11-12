@extends('layouts-new.index')

@section('content')

<div class="card">
    @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>الأسم</th>
                                <th>الرقم</th>
                                <th>الايميل</th>
                                <th>الدور</th>
                                <th>الفرع</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleNames()->first() }}</td>
                                    
                                    @include('components.useractions',['route'=>$route,'data'=>$user])
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#data_tb').DataTable( {
                'order':[[0,'asc']],
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
            } );
        } );
    </script>
{{--<script src="{{asset('assets/vuexy/js/scripts/pages/app-report-list.js')}}"></script>--}}
@endpush
@endsection
