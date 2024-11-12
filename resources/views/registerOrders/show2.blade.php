<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>الجمهورية العربية السورية</p>
                    <p>وزارة السياحة</p>
                    <p>الهيئة العامة للتدريب السياحي و الفندقي</p>
                    <p>مركز الوادي للتأهيل و التدريب السياحي {{$register->branch}}</p>
                    <p style="color:#000;">رقم : {{$register->id}}</p>
                    <p>التاريخ: {{$register->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
            <h3 class="text-center">طلب تسجيل</h3>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h6 class="text-center">دبلوم تخصصي في العلوم السياحية اختصاص({{$register->special}})</h6>
                </div>
                <div class="col-md-4"></div>
            </div>
                    
            
            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">اسم الطالب:</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->student->first_name}} {{$register->student->last_name}}</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">الهاتف الخليوي : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->student->mobile1}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">مكان و تاريخ الولادة : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->student->birthday}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <h6 class="invoice-to-title">اسم الأب : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->father_name}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">عمله : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->f_work}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">الهاتف الثابت أو الخليوي : </h6>.
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->f_phone}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <h6 class="invoice-to-title">اسم الأم : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->mother_name}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">عملها : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->m_work}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">الهاتف الثابت أو الخليوي : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->m_phone}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <h6 class="invoice-to-title">الرقم الوطني :</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->nation_no}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">الأمانة : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->nation_no2}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">القيد : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->student->nation_no3}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title"> العنوان : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->student->address}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title"> البريد الالكتروني : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->student->email}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <h6 class="invoice-to-title">الشهادة التي قبل بموجبها : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->certificate}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">نوعها : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->certificate_type}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">تاريخ نيلها : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->certificate_date}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">معدل اللغة الانكليزية : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->en}}</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">المعدل العام : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->sum}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">اللغات التي اتقنها : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->langs}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">المهارات الأخرى : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->skill}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">تعرفت على المركز عن طريق : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->know}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">تاريخ التسجيل : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->register_date}}</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">أسباب التسجيل : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">{{$register->register}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <h6 class="invoice-to-title">أرغب في الحصول على مصدقة تأجيل : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">----------------</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">شعبة تجنيد : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->military}}</h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">رقم التجنيد : </h6>
                </div>
                <div class="col-md-2">
                    <h6 class="invoice-to-title">{{$register->military_no}}</h6>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">تم تثبيت التسجيل بدفعة و قدرها : </h6>
                </div>
                <div class="col-md-9">
                    <h6 class="invoice-to-title">{{$register->amount}}</h6>
                </div>
             
            </div>
          
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        أطلعت على اللائحة الداخلية للمركز و على الرسوم و بدلات الخدمة الطلابية المعلنة في لوحة اعلانات المركز 
                        <br>و وافقت على الالتزام بما فيها من شروط و أحكام و خصوصا الالتزام باللباس و الدوام و التحلي بالأخلاق العامة و تعليمات الوزارة 
                        <br>و اتعهد بالالتزام بدفع كامل الأقساط المالية المترتبة علي في مواعيدها دون أي تأخير
                    </p>
                </div>
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <h6 class="invoice-to-title">الموظف المختص بالركز : </h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">----------------</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">اسم و توقيع الطالب/ة</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="invoice-to-title">----------------</h6>
                </div>
             
            </div>    

        </div>

  </body>
  </html>