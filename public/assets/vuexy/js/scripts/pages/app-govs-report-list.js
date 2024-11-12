window.addEventListener('load', function () {
  var dtInvoiceTable = $('.user-list-table'),
    assetPath = '';

  // datatable
  if (dtInvoiceTable.length) {
      console.log(dtInvoiceTable)
    var dtInvoice = dtInvoiceTable.DataTable({
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'بحث',
        searchPlaceholder: 'بحث',
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
        dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
        '<"col-lg-12 col-xl-6" l>' +
        '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      buttons: [

          {
              extend: 'excel',
              text: 'تصدير اكسل',
              className: 'add-new btn btn-primary mt-50',
              exportOptions: {
                  modifier: {
                      // DataTables core
                      order: 'index',  // 'current', 'applied', 'index',  'original'
                      page: 'all',      // 'all',     'current'
                  }
              }
          }
      ],

        initComplete: function () {
            $(document).find('[data-toggle="tooltip"]').tooltip();

            this.api()
                .columns(0)
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الخدمة</option></select>'
                    )
                        .appendTo('.user_role2')
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                        });
                });
            this.api()
              .columns(1)
              .every(function () {
                  var column = this;
                  var select = $(
                      '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الموظف </option></select>'
                  )
                      .appendTo('.user_role')
                      .on('change', function () {
                          var val = $.fn.dataTable.util.escapeRegex($(this).val());
                          column.search(val ? '^' + val + '$' : '', true, false).draw();
                      });

                  column
                      .data()
                      .unique()
                      .sort()
                      .each(function (d, j) {
                          select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                      });
              });
            this.api()
                .columns(2)
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> الفرع</option></select>'
                    )
                        .appendTo('.user_role3')
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                        });
                });
      }, drawCallback: function () {
            $(document).find('[data-toggle="tooltip"]').tooltip();
        }
    });
  }
});
