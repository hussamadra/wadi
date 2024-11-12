@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post"  id="repeat"
                              action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">اسم المستخدم </h6>
                                    <input type="text" class="form-control" name="name" required
                                       value="{{$user->name}}"/>
                            </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">الرقم</h6>
                                    <input type="number" class="form-control" name="mobile" required
                                       value="{{$user->mobile}}"/>
                            </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">البريد الالكتروني</h6>
                                    <input type="email" class="form-control" name="email" required
                                       value="{{$user->email}}"/>
                            </div>
                            </div>
                            
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                <h6 class="invoice-to-title">دور المستخدم</h6>
                                    <select type="text" class="form-control" required name="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}} </option>
                                        @endforeach
                                    </select>
                            </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">كلمة السر </h6>
                                    <input type="text" class="form-control" name="password"
                                    />
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
