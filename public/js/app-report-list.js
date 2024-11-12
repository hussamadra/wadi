window.addEventListener('load', function () {
  var dtInvoiceTable = $('.user-list-table'),
    assetPath = '';

  // datatable
  if (dtInvoiceTable.length) {
      console.log(dtInvoiceTable)
    var dtInvoice = dtInvoiceTable.DataTable({
      ajax: assetPath + 'report/services/all', // JSON file to add data
      autoWidth: false,
      columns: [
        // columns according to JSON
        { data: 'id' },
        { data: 'invoice_no' },
        { data: 'customer' },
        { data: 'total' },
        { data: 'vats' },
        { data: 'paid' },
        { data: 'type' },
          { data: 'created_at' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          targets: 0
        },
          {
              // Invoice ID
              targets: 4,
              width: '56px'
          },{
              // Invoice ID
              targets: 5,
              width: '56px'
          },
        {
          // Invoice ID
          targets: 1,
          width: '106px',
          render: function (data, type, full, meta) {
            var $invoiceId = full['invoice_no'];
            // Creates full output for row
            var $rowOutput = '<a class="font-weight-bold" href="#"> #' + $invoiceId + '</a>';
            return $rowOutput;
          }
        },
        {
          // Total Invoice Amount
          targets: 3,
          width: '53px',
          render: function (data, type, full, meta) {
            var $total = full['total'];
            return '<span class="d-none">' + $total + '</span>' + $total;
          }
        },
        {
          // Due Date
          targets: 7,
          width: '80px',
          render: function (data, type, full, meta) {
            var $dueDate = new Date(full['created_at']);
            // Creates full output for row
            var $rowOutput =
              '<span class="d-none">' +
              moment($dueDate).format('YYYYMMDD') +
              '</span>' +
              moment($dueDate).format('DD MMM YYYY');
            $dueDate;
            return $rowOutput;
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          width: '30px',
          orderable: false,
          render: function (data, type, full, meta) {
              var $id = full['id'];
              var $encrypted_id = full['encrypted_id'];

              return (
              '<div class="d-flex align-items-center col-actions">' +
              '<div class="dropdown">' +
              '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-right">' +
              '<a href="invoice/' +
              $id +
              '/edit" class="dropdown-item">' +
              feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Edit</a>' +
              '</div>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'desc']],
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'بحث',
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      // Buttons with Dropdown
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
                      search: 'none'     // 'none',    'applied', 'removed'
                  },
                  // columns: 'th:not(:last-child)'
              }
          }
      ],
      initComplete: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
        // Adding role filter once table initialized
        this.api()
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.invoice_status')
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
      },
      drawCallback: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
      }
    });
  }
});
