@extends('layouts-new.index')

@section('content')

<div class="card">
    @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>اسم الفرع</th>
                                <th>العدد المسموح</th>
                                <th colspan="3">الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($branches as $branche)
                                <tr>
                                    <td>{{ $branche->name }}</td>
                                    <td>{{ $branche->amount }}</td>
                                    @include('components.useractions',['route'=>$route,'data'=>$branche])
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
