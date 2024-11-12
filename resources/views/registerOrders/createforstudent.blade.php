@extends('layouts-new.index')

@section('content')

@csrf
@method()
@endif
    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <form method="post"  id="repeat"
                              action="{{route('registering.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                {{-- <div class="col-md-6">
                                    <select name="student_id" id="student_id" class="form-control" required>
                                        <option value="" selected disabled> --اختر الطالب --</option>
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="" selected disabled> --اختر نوع التسجيل --</option>
                                        <option value="دبلوم في العلوم السياحية">دبلوم في العلوم السياحية</option>
                                        <option value="دبلوم تخصصي في العلوم السياحية">دبلوم تخصصي في العلوم السياحية</option>
                                        <option value="دورة مهنية تخصصية">دورة مهنية تخصصية</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-6">
                                    <select name="kid" class="form-control" required>
                                        <option value="" selected disabled> --اختر القيد  --</option>
                                        @foreach ($branches as $branche)
                                        <option value="{{ $branche->id }}">{{ $branche->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="special" class="form-control" required>
                                        <option value="" selected disabled> --اخترالاختصاص  --</option>
                                        @foreach ($specials as $special)
                                        <option value="{{ $special->name }}">{{ $special->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <h3 class="mt-2">الشهادة</h3>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">الشهادة التي قبل بموجبها</h6>
                                    <input type="text" class="form-control" name="certificate" required />
                                </div>
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">نوع الشهادة</h6>
                                    <input type="text" class="form-control" name="certificate_type" required />
                                </div>
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">تاريخ نيلها</h6>
                                    <input type="text" class="form-control" name="certificate_date" required />
                                </div>
                            </div>


                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title"> اللغة الانكليزية</h6>
                                    <input type="text" class="form-control" name="en" required />
                                </div>
                                <div class="col-md-4" id="france">
                                    <h6 class="invoice-to-title"> اللغة الفرنسية</h6>
                                    <input type="text" class="form-control" name="fr" required />
                                </div>
                                <div class="col-md-4">
                                    <h6 class="invoice-to-title">المجموع العام</h6>
                                    <input type="text" class="form-control" name="sum" required />
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">اللغات التي اتقنها</h6>
                                    <input type="text" class="form-control" name="langs" required />
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">المهارات الاخرى</h6>
                                    <input type="text" class="form-control" name="skill" required />
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-12">
                                    <h6 class="invoice-to-title">تعرفت على المركز عن طريق</h6>
                                    <input type="text" class="form-control" name="know" required />
                                </div>
                            </div>

                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">تاريخ التسجيل</h6>
                                    <input type="date" class="form-control" name="register" required />
                                </div>
                                <div class="col-md-6">
                                    <h6 class="invoice-to-title">أسباب التسجيل</h6>
                                    <input type="text" class="form-control" name="register_date" required />
                                </div>
                            </div>

                            <hr>

                            <h3 class="mt-2">التجنيد</h3>

                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-12">
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="" selected disabled> --  اختر الجنس--</option>
                                        <option value="ذكر">ذكر</option>
                                        <option value="أنثى">أنثى</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row d-flex align-items-end pb-1 pt-2">
                                <div class="col-md-4">
                                    <select id="milit" class="form-control" required>
                                        <option value="1">نعم</option>
                                        <option value="2">لا</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="milit1">
                                    <h6 class="invoice-to-title">شعبة التجنيد</h6>
                                    <input type="text" class="form-control" name="military" required />
                                </div>
                                <div class="col-md-4" id="milit2">
                                    <h6 class="invoice-to-title">رقم التجنيد</h6>
                                    <input type="text" class="form-control" name="military_no" required />
                                </div>
                            </div>

                            <hr>

                            <div class="row d-flex align-items-end pb-1 pt-2" id="test">
                                <div class="col-md-12" id="milit2">
                                    <h6 class="invoice-to-title">دفعة المبلغ</h6>
                                    <input type="text" class="form-control" name="amount" required />
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
    $(document).on('change', '#type', function() {

        if ($('#type').val() == 'دبلوم في العلوم السياحية') {
            $('#france').show();

        } else {
            $('#france').hide();
        }
    })


</script>
<script>
    $(document).on('change', '#type', function() {

        if ($('#type').val() == 'دورة مهنية تخصصية') {
            $('#test').hide();
        }
    })

</script>
<script>
    $(document).on('change', '#milit', function() {

        if ($('#milit').val() == 1) {
            $('#milit1').show();
            $('#milit2').show();

        } else {
            $('#milit1').hide();
            $('#milit2').hide();
        }
    })
</script>
<script>
    $(document).on('change', '#gender', function() {

        if ($('#gender').val() == 'ذكر') {
            $('#allmilitay').show();

        } else {
            $('#allmilitay').hide();
        }
    })
</script>
<script>
    $(document).ready(function() {
        $('#student_id').change(function() {
            var student_name = $(this).val();
            url = '{{ route("registering.getStudent") }}';
            $.ajax({
                url: url
                , type: 'GET'
                , data: {
                    student_id: student_id
                }
                , success: function(response) {
                    console.log(response);
                }
                , error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });

</script>
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
