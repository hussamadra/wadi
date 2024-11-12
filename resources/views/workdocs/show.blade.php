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
                <div class="col-md-6">
                    <p>الجمهورية العربية السورية</p>
                    <p>وزارة الياحة</p>
                    <p>الهيئة العامة للتدريب السياحي و الفندقي</p>
                    <p>مديرية مراز التدريب السياح</p>
                    <p>مركز الوادي للتأهيل و التدريب السياي فرع  {{$workdoc->branch_name}} </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('asset/images/logo.jpeg')}}" />
                </div>
                
            </div>
            
            <h3 class="text-center">وثيقة دوام</h3>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <p class="invoice-to-title">ان الطالب : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->student->first_name}} {{$workdoc->student->last_name}}</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">بن : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->student->father_name}}</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">وادته : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->student->mother_name}}</p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <p class="invoice-to-title">المولود في : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->student->birthday}}</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">و المتمع بالجنسية : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->nation}}</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"> احد طلاب السنة:</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">{{$workdoc->year}}</p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <p class="invoice-to-title">المسجلين في مركزنا للعام الدراسي :</p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title">{{$workdoc->acadimec_year}}</p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title">بتاري : </p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title">{{$workdoc->date}}</p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-3">
                    <p class="invoice-to-title">شعبة التجنيد : {{$workdoc->milit_name}}</p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title">رقم التجنيد : {{$workdoc->milit_number}}</p>
                </div>
                <div class="col-md-3">
                    <p class="invoice-to-title">----------------</p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-12">
                    <p class="invoice-to-title">و هو موظب على الدوام في ركزنا حتى تاريخ اعداد هذه الوثيقة.</p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"> في : </p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">-------------------</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <p class="invoice-to-title">نظم الوثية</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">دققها</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">مدير عام المرك</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
             
            </div>

            <div class="row d-flex align-items-end pt-2 pb-5"></div>

            <div class="row d-flex align-items-end">
                
                <div class="col-md-2">
                    <p class="invoice-to-title">دائرة شؤون الطلاب</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">مدير مراك التدريب السياحي</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title">مدير عام اليئة</p>
                </div>
                <div class="col-md-2">
                    <p class="invoice-to-title"></p>
                </div>
             
            </div>

        </div>

  </body>
  </html>