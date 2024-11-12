@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post"  id="repeat"
                              action="{{route('services.add.store',$service->id)}}" enctype="multipart/form-data">
                            @csrf

                            @foreach($service->additionalFields as $field)
                                @if($field->type==3)
                                    @include('components.select',['field'=>$field])
                                @else
                                    @include('components.input',['field'=>$field])
                                @endif
                            @endforeach
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
@section('js')

    <script src={{asset('js/jquery.repeater.min.js')}}></script>
    <script>
        var ids = 0;
        function addItem() {
            ids++;
            return ' <div data-repeater-item class="invoice" id="item' + ids + '">' +
                '<div class="row d-flex align-items-end">' +
                '<div class="col-md-4 col-12">' +
                '<div class="form-group">' +
                '<label for="itemname">اسم الحقل</label>' +
                '<input type="text" class="form-control" name="item_name[]" id="itemname" aria-describedby="itemname" required placeholder="" />' +
                '</div>' +
                '</div>' +
                '<div class="col-md-2 col-12">' +
                '<div class="form-group">' +
                '<label for="itemcost">نوع الحقل</label>' +
                '<select class="form-control" name="type[]" required>' +
                '<option value="1">نص</option>' +
                '<option value="2">رقم</option>' +
                '<option value="3">قائمة منسدلة</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class=" col-12">' +
                '<div class="form-group">' +
                '<label for="itemcost">قيمة الحقل (بينها فاصلة)</label>' +
                '<textarea class="form-control" name="value[]">' +
                '</textarea>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4 col-12">' +
                '<div class="form-group">' +
                '<label for="itemsort">ترتيب الحقل</label>' +
                '<input type="number" class="form-control" name="sort[]" id="itemsort" aria-describedby="itemsort" required placeholder="" />' +
                '</div>' +
                '</div>' +
                '<div class="col-md-2 col-12 mb-50 mt-4">' +
                '<div class="form-group">' +
                '<button class="btn btn-outline-danger text-nowrap px-1 i-delete" data-id="' + ids + '" data-repeater-delete type="button" >' +
                '<i data-feather="x" class="mr-25"></i>' +
                'Delete' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }

        $('#add-new').on('click', function () {
            $('#i-repeat').append(addItem())
        })
        document.addEventListener('click', function (event) {
            data = event.target.getAttribute('data-id');
            if (data) {
                console.log(data);
                document.getElementById('item' + data).remove();
            }
        })

    </script>
@endsection
