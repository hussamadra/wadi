@extends('layouts-new.index')

@section('content')

<div class="card">
    {{-- @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد']) --}}
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
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
                            @foreach ($ides as $ide)
                                <tr>
                                    <td>{{ $ide->student->first_name }} {{ $ide->student->last_name }}</td>
                                    <td>{{ $ide->branch }}</td>
                                    <td>{{ $ide->year }}</td>
                                    <td>{{ $ide->special }}</td>
                                    <td>{{ $ide->created_at }}</td>
                                    @include('components.actions',['route'=>$route,'data'=>$ide])
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
