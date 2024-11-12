@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="repeat"
                              action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">اسم الزبون </h6>
                                    <input type="text" class="form-control" name="name" required
                                           value="{{$customer->name}}"/>
                                </div>
                            </div>
                            
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">ايميل الزبون </h6>
                                    <input type="email" class="form-control" name="email" required
                                           value="{{$customer->email}}"/>
                                </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">رقم الزبون </h6>
                                    <input type="number" class="form-control" name="mobile" required
                                           value="{{$customer->mobile}}"/>
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
