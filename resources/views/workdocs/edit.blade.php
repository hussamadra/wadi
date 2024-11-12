@extends('layouts-new.index')

@section('content')

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post"  id="repeat"
                              action="{{route('workdocs.update',$workdoc->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h3 class="text-center">{{ $workdoc->student->first_name }} {{ $workdoc->student->last_name }}</h3>

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">الجنسية</h6>
                                    <input type="text" class="form-control" name="nation" value="{{$workdoc->nation}}" required />
                                </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <select name="year" class="form-control" required>
                                        <option value="" selected disabled> --اخت السنة --</option>
                                        <option value="الأولى">لأولى</option>
                                        <option value="الثانية">اثانية</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-6">
                                    <select name="academic_year" class="form-control" required>
                                        <option value="" selected disabled> --اختر السنة الدراسية --</option>
                                        <option value="2024-2025">2024-2025</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">تاريخ التسجيل</h6>
                                    <input type="date" class="form-control" name="date" value="{{$workdoc->date}}" required />
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-4">
                                    <select name="branch_name" class="form-control" required>
                                        <option value="" selected disabled> --اختر الفرع --</option>
                                        @foreach ($branches as $branch)
                                        <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">شعبة تجنيد</h6>
                                    <input type="text" class="form-control" name="milit_name" value="{{$workdoc->milit_name}}" required />
                                </div>
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">رقم التجنيد</h6>
                                    <input type="text" class="form-control" name="milit_number" value="{{$workdoc->milit_number}}" required />
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
@push('script')

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
            '<label for="itemsort">ترتيب لحقل</label>' +
            '<input type="number" class="form-control" name="sort[]" id="itemsort" aria-describedby="itemsort" required placeholder="" />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2 col-12 mt-2">' +
            '<div class="form-group">' +
            '<button class="btn btn-danger text-nowrap px-1 i-delete" data-id="' + ids + '" data-repeater-delete type="button" >' +
            '<i data-feather="trash"></i>' +
            'Delete' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    }

    $('#add-new').on('click', function () {
        console.log('id');
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
@endpush
