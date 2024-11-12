@extends('layouts-new.index')

@section('content')

<div class="card">
    @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>اسم المادة</th>
                                <th>الاختصاص</th>
                                <th>السنة</th>
                                <th>الفصل</th>
                                <th>حد النجاح</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->special->name }}</td>
                                    <td>{{ $subject->year }}</td>
                                    <td>{{ $subject->semester }}</td>
                                    <td>{{ $subject->mark }}</td>
                                    @include('components.useractions',['route'=>$route,'data'=>$subject])
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
