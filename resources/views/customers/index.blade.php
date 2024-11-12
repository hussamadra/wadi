@extends('layouts-new.index')

@section('content')

<div class="card">
    
                    <div class="card-datatable table-responsive pt-0">
                        <table id="data_tb" class="user-list-table table ">
                            <thead class="thead-light ">
                            <tr>
                                <th>الأسم</th>
                                <th>الموبايل</th>
                                <th>البريد الالكتروني</th>
                                <th>تاريخ الاضافة</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    @include('components.actions',['route'=>$route,'data'=>$customer])
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
                    'order':[[3,'desc']],
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                } );
            } );
        </script>
    @endpush
@endsection
