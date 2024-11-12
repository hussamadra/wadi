@extends('layouts-new.index')

@section('content')
<div class="card">
    @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>الاسم و الشهرة</th>
                                <th>اسم الأب</th>
                                <th>اسم الأم</th>
                                <th>تاريخ الاضافة</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->first_name }} {{$student->last_name}}</td>
                                    <td>{{ $student->father_name }}</td>
                                    <td>{{ $student->mother_name }}</td>
                                    <td>{{ $student->created_at }}</td>

                                    @include('components.useractions',['route'=>$route,'data'=>$student])
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
