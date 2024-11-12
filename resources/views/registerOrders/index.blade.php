@extends('layouts-new.index')

@section('content')

<div class="card">
    {{-- @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد']) --}}
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
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
                            @foreach ($registering as $item)
                                <tr>
                                    <th>{{$item->id}} / {{$item->branch_symbol}} / {{$item->kid_symbol}}</th>
                                    <td>{{ $item->student->first_name }} {{$item->student->last_name}}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->branch }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    @include('components.actions',['route'=>$route,'data'=>$item])
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
