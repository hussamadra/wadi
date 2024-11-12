@extends('layouts-new.index')

@section('content')

    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- users filter start -->

            <!-- users filter end -->
            <div class="card">

                <div class="card-datatable table-responsive pt-0">
                    <table id="data_tb" class="user-list-table3 table table-hover">
                        <thead class="thead-light ">
                        <tr>
                            <th>رقم</th>
                            <th>الاسم</th>
                            <th>المورد</th>
                            <th>عدد الطلبات الكلي</th>
                            {{--<th>المبلغ الكلي</th>--}}
                            {{--<th>التسديد الكلي</th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{$pending_serve->id}}</td>
                            <td>{{$pending_serve->name}}</td>
                            <td>{{$pending_serve->supplier->ar_name}}</td>
                            <td>{{$total}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="data_tb" class="user-list-table table table-hover">
                        <thead class="thead-light ">
                        <tr>
                            <th>رقم الطلب</th>
                            <th>المستخدم</th>
                            <th>الفرع</th>
                            @foreach($pending_serve->service->shownAdditionalFields as $field)
                                <th>{{$field->ar_name}}</th>
                            @endforeach
                            <th>التاريخ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$pending_serve->id}}</td>
                            <td>{{$pending_serve->user->name}}</td>
                            <td>{{$pending_serve->user->branch->ar_name}}</td>
                            @foreach($service_request->additionalValues as $value)
                                @if($value->additionalField)
                                    @if($value->additionalField->show==1)
                                        @if(!in_array($value->additionalField->type,[4,5]))
                                            <td>{{$value->ar_value}}</td>
                                        @else
                                            <td>@include('components.file_link',['value'=>$value->ar_value])</td>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                            <td>{{$service_request->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $('#data_tb').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                } );
            } );
        </script>
        <script>
            var id = "{{$pending_serve->id}}"
        </script>
        <script src="{{asset('assets/vuexy/js/scripts/pages/app-service-list.js')}}"></script>
    @endpush
@endsection

