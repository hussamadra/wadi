@extends('layouts-new.index')

@section('content')
    {{--  --}}
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
    {{--  --}}

    <section class="form-control-repeater">
        <div class="row">
            <!-- Invoice repeater -->

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($image != null)
                            <div class="studentIMG">
                                <img src={{ asset($image) }} width="300" height="300">
                            </div>
                        @endif
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <br>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الاسم الأول باللغة العربية</h6>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $student->first_name }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الاسم الأول باللغة الانكليزية</h6>
                                <input type="text" class="form-control" id="first_name_en" name="first_name_en"
                                    value="{{ $student->first_name_en }}" readonlyrequired />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الشهرة باللغة العربية</h6>
                                <input type="text" class="form-control" name="last_name"
                                    value="{{ $student->last_name }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الشهرة باللغة الانكليزية</h6>
                                <input type="text" class="form-control" name="last_name_en"
                                    value="{{ $student->last_name_en }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">اسم الأب باللغة العربية </h6>
                                <input type="text" class="form-control" name="father_name"
                                    value="{{ $student->father_name }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">اسم الأب باللغة الانكليزية</h6>
                                <input type="text" class="form-control" name="father_name_en"
                                    value="{{ $student->father_name_en }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">اسم الأم باللغة العربية </h6>
                                <input type="text" class="form-control" name="mother_name"
                                    value="{{ $student->mother_name }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">اسم الأم باللغة الانكليزية</h6>
                                <input type="text" class="form-control" name="mother_name_en"
                                    value="{{ $student->mother_name_en }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-12">
                                <h6 class="invoice-to-title">مكان و تاريخ الولادة</h6>
                                <input type="text" class="form-control" name="birthday" value="{{ $student->birthday }}"
                                    readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الرقم الوطني</h6>
                                <input type="text" class="form-control" name="nation_no"
                                    value="{{ $student->nation_no }}" readonly required />
                            </div>
                            <div class="col-md-3">
                                <h6 class="invoice-to-title">الأمانة</h6>
                                <input type="text" class="form-control" name="nation_no2"
                                    value="{{ $student->nation_no2 }}" readonly required />
                            </div>
                            <div class="col-md-3">
                                <h6 class="invoice-to-title">القيد</h6>
                                <input type="text" class="form-control" name="nation_no3"
                                    value="{{ $student->nation_no3 }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">رقم الموبايل (1)</h6>
                                <input type="text" class="form-control" name="mobile1" value="{{ $student->mobile1 }}"
                                    readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الهاتف الرضي (1)</h6>
                                <input type="text" class="form-control" name="phone1" value="{{ $student->phone1 }}"
                                    readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">رقم الموبايل (2)</h6>
                                <input type="text" class="form-control" name="mobile2"
                                    value="{{ $student->mobile2 }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">الهاتف الأرضي (2)</h6>
                                <input type="text" class="form-control" name="phone2"
                                    value="{{ $student->phone2 }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">عمل الأب</h6>
                                <input type="text" class="form-control" name="f_work"
                                    value="{{ $student->f_work }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">عمل الأم</h6>
                                <input type="text" class="form-control" name="m_work"
                                    value="{{ $student->m_work }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">رقم موبايل الأب</h6>
                                <input type="text" class="form-control" name="f_phone"
                                    value="{{ $student->f_phone }}" readonly required />
                            </div>
                            <div class="col-md-6">
                                <h6 class="invoice-to-title">رقم موبايل الأم</h6>
                                <input type="text" class="form-control" name="m_phone"
                                    value="{{ $student->m_phone }}" readonly required />
                            </div>
                        </div>

                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-12">
                                <h6 class="invoice-to-title">العنوان بالتفصيل</h6>
                                <input type="text" class="form-control" name="address"
                                    value="{{ $student->address }}" readonly required />
                            </div>
                        </div>
                        <div class="row d-flex align-items-end pb-1 pt-2">
                            <div class="col-md-12">
                                <h6 class="invoice-to-title">البريد الالكتروني</h6>
                                <input type="text" class="form-control" name="email" value="{{ $student->email }}"
                                    readonly required />
                            </div>
                        </div>

                        <hr>


                    </div>
                </div>
            </div>




        {{-- set date tables --}}
        <div class="card">
            @include('tables')
        </div>





        {{-- <a class="btn btn-success col-3 m-1" href="{{ route('createForStudent', ['id' => $student->id]) }}">طلب
                تسجيل</a> --}}
        {{-- </div> --}}
        <!-- Tab links -->
        <div>
            <div class="tab">
                <a href="{{ route('createForStudent', ['id' => $student->id]) }}"><button class="tablinks">اضافة طلب
                        تسجيل</button></a>
                <a href="{{ route('promises.create') }}?id={{ $student->id }}"> <button class="tablinks">اضافة
                        تعهد</button></a>
               <a href="{{ route('ides.create')}}?id={{ $student->id }}"> <button class="tablinks">اضافة بطاقة تعريف</button></a>
              <a href="{{ route('workdocs.create') }}?id={{ $student->id }}">  <button class="tablinks">اضافة وثقة دوام/تأجيل</button> </a>
              <a href="{{ route('receipts.create') }}?id={{ $student->id }}">  <button class="tablinks">اضافة ايصال دفع</button> </a>


            </div>

        </div>



        </div>

        </div>

    </section>
@endsection
@push('script')
    <script src={{ asset('js/jquery.repeater.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('#student_id').change(function() {
                var student_name = $(this).val();
                url = '{{ route('registering.getStudent') }}';
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        student_id: student_id
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
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
                '<button class="btn btn-danger text-nowrap px-1 i-delete" data-id="' + ids +
                '" data-repeater-delete type="button" >' +
                '<i data-feather="trash"></i>' +
                'Delete' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }

        $('#add-new').on('click', function() {
            console.log('id');
            $('#i-repeat').append(addItem())
        })
        document.addEventListener('click', function(event) {
            data = event.target.getAttribute('data-id');
            if (data) {
                console.log(data);
                document.getElementById('item' + data).remove();
            }
        })
    </script>
@endpush
