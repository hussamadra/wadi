@extends('layouts-new.index')

@section('content')
    {{--{{dd('hi')}}--}}
    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="repeat"
                              action="{{route('roles.update',$role->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12 mb-2">
                                    <h6 class="invoice-to-title">اسم الدور </h6>
                                    <input type="text" class="form-control" name="name" required
                                           value="{{$role->name}}"/>

                                    <div class="col-md-12 m-2 row">
                                        {{--                                        {{dd($permissions)}}--}}
                                        @foreach($permissions as $permission)

                                            <div class="card">
                                                <div class="card-body">

                                                    @php
                                                        $ex= explode('.',$permission->name);
                                                             $perms = \Spatie\Permission\Models\Permission::where('group',$ex[0])->orderBy('id','desc')->get();
                                                    @endphp

                                                        <table class="table table-bordered">
                                                            <thead class="thead-dark">
                                                            <th>{{$ex[0]}}</th>
{{----}}
                                                            </thead>
                                                    @foreach($perms as $perm)
                                                            <tr>
                                                                <td>

                                                                    <input type="checkbox"
                                                                           class="form-check-input "
                                                                           name="permissions[]"
                                                                           value="{{$perm->id}}"
                                                                           @if($role->hasPermissionTo($perm->name)) checked @endif
                                                                    >
                                                                    <label class="form-check-label"
                                                                           for="exampleCheck1">{{str_replace('.',' ',$perm->name)}}</label>

                                                                </td>
                                                            </tr>
                                                    @endforeach
                                                        </table>
                                                </div>
                                            </div>


                                        @endforeach
                                    </div>
                                </div>


                                <hr>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
