<td>
    <a class="" data-toggle="modal" data-target="#view{{$reservation->id}}"
       data-id="{{$reservation->id}}"><i data-feather="eye" class="text-warning"></i>تفاصيل</a>
    <div class="modal fade" id="view{{$reservation->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">تفاصيل  أخرى الحجز</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="" id="" cols="30" rows="10" readonly class="form-control">{{$reservation->description ?? 'لا يوجد تفاصيل'}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <a href="{{route($route.'.edit',$reservation->id)}}">
            <i data-feather='edit-2' class="text-warning"></i> تعديل
        </a>
        <br>
    @can('rents-item.delete')
        <a class="" data-toggle="modal" data-target="#delete{{$reservation->id}}"
           data-id="{{$reservation->id}}"> <i data-feather='delete' class="text-danger"></i> حذف </a>
    @endcan
    <div class="modal fade bd-example-modal-lg" id="delete{{$reservation->id}}" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الحجز</h5>
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
                                                <form action="{{route('reservations.destroy','test')}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    هل أنت متأكد من عملية الحذف ؟
                                                    <input type="hidden" class="form-control" name="id"
                                                           value="{{$reservation->id}}">

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

</td>
