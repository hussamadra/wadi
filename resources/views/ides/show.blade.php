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
        <div class="container" style="padding-right: 200px; padding-left: 400px;">
            <div class="row" style="background-color:#1976D2; padding: 10px; color: #fff; margin-top: 10px;">
                <div class="col-md-6">
                    <p>الجمهوية العربية السورية </p>
                    <p>وزارة السياحة</p>
                    <p>الهيئة العامة للتدريب السياحي و الفندقي</p>
                </div>
                <div class="col-md-6">
                    <h2>بطاقة طالب/ة</h2>
                    <h4>{{$symbol->id}} /{{$symbol->branch_symbol}} /{{$symbol->kid_symbol}}</h4>
                </div>
            </div>

                    
            
            <div class="row d-flex align-items-center">
                
                <div class="col-md-6">
                    <div class="col-md-12">
                        <p class="invoice-to-title">مركز الوادي للتأهيل و التدري السياح : ({{$ide->branch}})</p>
                    </div>

                    <div class="col-md-12">
                        <p class="invoice-to-title">الام الدراسي:{{$ide->date}}</p>
                    </div>

                    <div class="col-md-12">
                        <p class="invoice-to-title">الاسم و الكنية : {{$ide->student->first_name}} {{$ide->student->last_name}}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p class="invoice-to-title">اسم الأب: {{$ide->student->father_name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="invoice-to-title">اسم الأم: {{$ide->student->mother_name}}</p>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <p class="invoice-to-title">المواليد :{{$ide->student->birthday}}</p>
                    </div>
                    <div class="col-md-12">
                        <p class="invoice-to-title">طالب دبلوم : {{$ide->deplom}}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <p class="invoice-to-title">اختصاص : {{$ide->special}}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="invoice-to-title">السنة : {{$ide->year}}</p>
                        </div>
                    </div>
                        
                </div>
             
            </div> 

            <div class="row" style="background-color:#1976D2; padding: 10px; color: #fff; margin-top: 10px;"">
                
                    <h2 class="text-center">الوادي دوما في لمقدمة</h2>
                
            </div>

        </div>

  </body>
  </html>