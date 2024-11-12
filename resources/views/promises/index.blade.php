@extends('layouts-new.index')

@section('content')

<div class="card">
    {{-- @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد']) --}}
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>الاسم</th>
                                <th>التاريخ</th>
                                <th>تاريخ الاضافة</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($promises as $promise)
                                <tr>
                                    <td>{{ $promise->name }}</td>
                                    <td>{{ $promise->date }}</td>
                                    <td>{{ $promise->created_at }}</td>
                                    @include('components.actions',['route'=>$route,'data'=>$promise])
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
