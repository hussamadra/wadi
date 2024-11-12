<td>

        <a href="{{route($route.'.show',$data->id)}}" class="btn btn-info">
            <i data-feather='edit-2' class="text-white"></i> التفاصيل
        </a>
</td>
<td>

    @can($route.'.edit')
        <a href="{{route($route.'.edit',$data->id)}}" class="btn btn-warning">
            <i data-feather='edit-2' class="text-white"></i> تعديل

        </a>
    @endcan

</td>

<td>

    @can($route.'.delete')
            <a class="btn btn-danger mt-1" data-toggle="modal" data-target="#delete{{$data->id}}"
               data-id="{{$data->id}}" > <i data-feather='delete' class="text-white"></i> حذف </a>

            <div class="modal fade bd-example-modal-lg" id="delete{{$data->id}}" tabindex="-1" role="dialog"
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

                                                                <form action="{{route($route.'.destroy',$data->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')

                                                            هل أنت متأكد من عملية الحذف ؟
                                                            <input type="hidden" class="form-control" name="id"
                                                                   value="{{$data->id}}">

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



    @endcan

</td>
