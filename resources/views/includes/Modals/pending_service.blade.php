{{--    <!-- show details modal -->--}}
<a class="" data-toggle="modal" data-target="#view{{$serve->id}}"
   data-id="{{$serve->id}}"><i data-feather="eye" class="text-warning"></i>تفاصيل</a>
<div class="modal fade bd-example-modal-lg" id="view{{$serve->id}}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-body">
                    <!-- users list start -->
                    <section class="app-user-list">
                        <div class="card">
                            <div class="content-body">
                                <!-- users list start -->
                                <section class="app-user-list">

                                    <div class="card">
                                        <div class="card-datatable table-responsive pt-0">
                                            <table id="data_tb" class="user-list-table table table-hover">
                                                <thead class="thead-light ">
                                                <tr>
                                                    <th>رقم الطلب</th>
                                                    <th>اسم الخدمة</th>
                                                    <th>المستخدم</th>
                                                    <th>الفرع</th>

                                                    @foreach($serve?->service?->additionalFields as $field)
                                                        @if($field->show == 2)
                                                        <th>{{$field->ar_name}} {{$field->comment}}</th>
                                                        @endif
                                                    @endforeach
                                                    <th>التاريخ</th>
                                                    @if($serve->status==0)
                                                        <th>خيارات</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php  $branch = \App\Models\Branch::findOrFail($serve->current_branch) @endphp
                                                <tr>
                                                    <td>{{$serve->id}}</td>
                                                    <td>{{$serve->service->name}}
                                                        -{{$serve?->service?->supplier->ar_name}}</td>
                                                    <td>{{$serve->user->name}}</td>

                                                    <td>{{$branch->ar_name}}</td>
                                                    @foreach($serve->additionalValues as $value)
                                                        @if($value->additionalField)
                                                            @if($value->additionalField->show !=2)
                                                                @if(!in_array($value->additionalField->type,[4,5]))
                                                                    <td>{{$value->ar_value}}</td>
                                                                @else
                                                                    <td>@include('components.file_link',['value'=>$value->ar_value])</td>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <td>{{$serve->created_at}}</td>
                                                    <td>
                                                        @if($serve->status==0)
                                                            @can('requests.create')
                                                                <a class="btn btn-success"
                                                                   href="{{route('pending_services_serves.respond',['id'=>$serve->id,'status'=>1])}}">تنفيذ</a>
                                                            @endcan
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>


@can('pending_services_serves.edit')
    {{--            <a href="{{route('pending_services_serves.edit',$serve->id)}}">تعديل</a>--}}
    <a class="" data-toggle="modal" data-target="#edit{{$serve->id}}"
       data-id="{{$serve->id}}"> <i data-feather='edit' class="text-warning"></i> تعديل </a>
@endcan
<div class="modal fade bd-example-modal-lg" id="edit{{$serve->id}}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الطلب {{$serve->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- users list start -->
                <section class="app-user-list">

                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">

                                <form action="{{route('pending_services_serves.update','test')}}"
                                      method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{$serve->id}}">


                                    @foreach($serve->additionalValues as $value)
{{--                                        {{dd($value->ar_value)}}--}}
                                        <div class="form-group">
                                            @if($value->additionalField)
                                                @if($value->additionalField->show==1)
                                                    @if(!in_array($value->additionalField->type,[4,5]))
                                                        <label
                                                            for="exampleInputEmail1">{{$value->additionalField->ar_name}}</label>
                                                    @if($value->additionalField->type == 3)
                                                        @php $values= explode(',',$value->additionalField->ar_value) @endphp
                                                            <select class="form-control" name="{{$value->additionalField->id}}" id="">
                                                                @foreach($values as $val)
                                                                    <option value="{{$val}}">{{$val}}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                        <input type="text" name="{{$value->additionalField->id}}"
                                                               class="form-control"
                                                               value="{{$value->ar_value}}">
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                                        </button>
                                        <button type="submit" id="update_data" class="btn btn-success">حفظ</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

@can('pending_services_serves.delete')
    <a class="" data-toggle="modal" data-target="#delete{{$serve->id}}"
       data-id="{{$serve->id}}"> <i data-feather='delete' class="text-warning"></i> حذف </a>
@endcan
<div class="modal fade bd-example-modal-lg" id="delete{{$serve->id}}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="اغلاق">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-body">
                    <!-- users list start -->
                    <section class="app-user-list">
                        <div class="card">
                            <div class="content-body">
                                <!-- users list start -->
                                <section class="app-user-list">

                                    <div class="card">
                                        <div class="card-datatable table-responsive pt-0">
                                            <form action="{{route('pending_services_serves.destroy','test')}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                هل أنت متأكد من عملية الحذف ؟
                                                <input type="hidden" class="form-control" name="id"
                                                       value="{{$serve->id}}">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
