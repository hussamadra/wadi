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
                                <th>الدورة</th>
                                <th>المبلغ</th>
                                <th>التاريخ</th>
                                <th>ااجراءات</th>
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
                                    @include('components.actions',['route'=>$route,'data'=>$receipt])
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
