@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="repeat"
                              action="{{route('roles.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12 mb-2">
                                    <h6 class="invoice-to-title">اسم الدور </h6>
                                    <input type="text" class="form-control" name="name" required
                                           value=""/>

                                    <div class="col-md-12 m-2 row">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-3 ">
                                                <table class="table">

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="form-check-input "
                                                                   name="permissions[]" value="{{$permission->id}}">
                                                            <label class="form-check-label"
                                                                   for="exampleCheck1">{{str_replace('.',' ',$permission->name)}}</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <hr>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
