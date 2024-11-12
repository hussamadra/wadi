@extends('layouts-new.index')   

@section('content')

<div class="card">
    {{-- @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد']) --}}
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>الاسم و الشهرة</th>
                                <th>اسم الأب</th>
                                <th>الجنسية</th>
                                <th>السنة الدراسية</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($workdocs as $workdoc)
                                <tr>
                                    <td>{{ $workdoc->student->first_name }} {{$workdoc->student->last_name}}</td>
                                    <td>{{ $workdoc->student->father_name }}</td>
                                    <td>{{ $workdoc->nation }}</td>
                                    <td>{{ $workdoc->year }}</td>
                                    @include('components.actions',['route'=>$route,'data'=>$workdoc])
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
