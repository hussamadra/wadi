@extends('layouts-new.index')

@section('content')

<div class="card">
    @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>اسم الاختصاص</th>
                                <th>الفرع</th>
                                <th>المبلغ</th>
                                <th>السنة</th>
                                <th colspan="3">الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($specials as $special)
                                <tr>
                                    <td>{{ $special->name }}</td>
                                    <td>{{ $special->branche->name }}</td>
                                    <td>{{ $special->amount }}</td>
                                    <td>{{ $special->year }}</td>
                                    @include('components.specialActions',['route'=>$route,'data'=>$special])
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
