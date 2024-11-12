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
                <div class="col-md-4">
                    <p>مركز الوادي </p>
                    <p>للتأهيل و التدريب السيحي</p>
                    <p>فرع : {{$receipt->branch_name}}</p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('asset/images/logo.jpeg')}}" />
                </div>
                <div class="col-md-4">
                    <p>Al-Wadi Center</p>

                </div>
            </div>


            <div class="row d-flex align-items-end pb-1 pt-2">

                <div class="col-md-6">
                    <h6 class="invoice-to-title">اسم الطالب:</h6>
                    {{$receipt->student->first_name}} {{$receipt->student->last_name}}

                </div>
                <div class="col-md-6">
                    <h6 class="invoice-to-title">الاسم الأول باللغة الانكليزية</h6>
                    {{$receipt->student->first_name_en}}
                </div>
            </div>
            <div class="row d-flex align-items-end pb-1 pt-2">
                <div class="col-md-6">
                    <h6 class="invoice-to-title">لشهرة باللغة العربية</h6>
                    {{$receipt->student->last_name}}
                </div>
                <div class="col-md-6">
                    <h6 class="invoice-to-title">الشهر باللغة الانكليزة</h6>
                    {{$receipt->student->last_name_en}}
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        أطعت على اللائحة الداخلية للمركز و عى الرسوم و بدلات لخدمة الطلابية امعلنة في لوحة اعلانات المركز
                        <br>و وافق على الالتزام بما فيها من شروط و أحام و خصوصا الالتزام باللباس و الدوم و التحلي بالأخلاق العامة و تعليمت الوزارة
                        <br>و اتعهد الالتزام بدفع كال الأقساط المالي المترتبة علي في واعيدها دون أي تأخير
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>الموظف المختص بالمركز </td>
                            <td>------------</td>
                            <td>اسم و توقيع الطالب/ة</td>
                            <td>--------------</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

  </body>
  </html>
