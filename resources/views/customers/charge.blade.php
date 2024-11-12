@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post"  id="repeat"
                              action="{{route('customers.charge',$customer->id)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">قيمة الشحن</h6>
                                    <input type="number" class="form-control" name="amount" required
                                            />
                                </div>
                            </div>


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
