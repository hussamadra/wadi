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
        <div class="container" style="">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="background-color:#1976D2; padding: 10px; color: #fff; margin-top: 10px;">تعهد</h2>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        أنا الطالب {{ $promise->name }} الموقع أدناه و بعد اطلاعي على النظام العام للمركز أرجو الموافقة<br>
                        على قبولي في مركز الوادي للتأهيل و التدريب السياحي و أتعهد و ألتزم بمراعاة و تنفيذ جميع الأنظمة و القوانين السارية في <br>
                        مركز الوادي للتأهيل و التدريب السياحي المتعلقة بحسن الأخلاق و السلوك و الانضباط.
                    </p>
                    <p class="text-center">
                        كما أتعهد بالتقيد بصورة كاملة بجميع قرارات و تعاليم الادارة لاسيما فيما يتعلق بالحضور الالزامي للمقررات و الدروس<br>
                        و الالتزامات المالية وفق النظام العام.
                    </p>
                    <p class="text-center">
                        كما أنني و في حال مخالفتي لما ورد أعلاه و لكافة التعهدات ولما ورد في النظام العام المركزي فإنني على استعداد لتنفيذ أي<br>
                        اجراء أو تدبير يتخذه المركز بمقتضى أنظمته مهما كانت درجته بما في ذلك الإنذار أو الفصل المؤقت أو النهائي.
                    </p>
                    <p class="text-center">
                        المبلغ المالي المدفوع من قبل الطالب لا يرد مهما كانت الأسباب.
                    </p>
                    <p class="text-center">
                        على الطالب دفع نصف قيمة القسط عند التسجيل و إتمام القسط المالي بالكامل قبل بدء امتحانات الفصل الدراسي الأول و أي <br>
                        تأخير عن سداد القسط الدراسي يعتبر الطالب ملغى و لايحق له استرداد أي مبلغ مالي.
                    </p>
                    <h3 class="text-center">التاريخ :  {{  $promise->date  }}</h3>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>اسم الطالب/ة و توقيعه</td>
                            <td>{{ $promise->name }}</td>
                            <td>اسم و توقيع مدير شؤون الطلاب و التسجيل</td>
                            <td>--------------</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="float-start" style="background-color:#1976D2; padding: 10px; color: #fff; margin-top: 10px;">وثائق مرفقة دبلوم تخصصي</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>1. الشهادة الثانوية مصدقة من الجهات الرسميةالمختصة عدد 2</p>
                    <p>2. صور شخصية حديثة العهد عدد 3</p>
                    <p>3. نسخة عن بطاقة الهوية الشخصية أو جواز السفر عدد 3</p>
                    <p>4. معادلة الشهادات للطلاب الأجانب</p>
                    <p>5. مصدقة التخرج الصادرة عن الجامعة أو المعهد المتوسط/مصدقة أصولا عدد 2</p>
                    <p>6. كشف علامات مصدق أصولا عدد 2</p>
                </div>
            </div>
            
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>فرع (1) وادي العيون مصياف _ وادي العيون _ بيت شلهوم _ حي الزراعة 0996721725_ 0995327357</h4>
                    <h4>فرع (2) طرطوس _ شرق دوار السعدي _ جانب الخدمات الفنية _ قبل بنك قطر الوطني 0987008484 _ 0937247657</h4>
                    <h4>فرع (3) حمص _ الحضارة _ شارع العشاق _ دخلة مفروشات عكرمة 0940349094 _ 031/2775199</h4>
                </div>
            </div>

        </div>

  </body>
  </html>