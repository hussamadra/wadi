<!-- BEGIN: Vendor JS-->
<script src="{{asset('/assets/vuexy/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

{{--<script src="{{asset('assets/vuexy/vendors/js/charts/apexcharts.min.js')}}"></script>--}}
<script src="{{asset('/assets/vuexy/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/extensions/moment.min.js')}}"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/vfs_fonts.min.js" integrity="sha512-BDZ+kFMtxV2ljEa7OWUu0wuay/PAsJ2yeRsBegaSgdUhqIno33xmD9v3m+a2M3Bdn5xbtJtsJ9sSULmNBjCgYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('/assets/vuexy/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('/assets/vuexy/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->
<script src="{{ asset('/assets/vuexy/js/scripts/bootbox/bootbox.min.js') }}"></script>

<!-- BEGIN: Theme JS-->
<script src="{{asset('/assets/vuexy/js/core/app-menu.js')}}"></script>
<script src="{{asset('/assets/vuexy/js/core/app.js')}}"></script>
{{--<script src="{{asset('assets/vuexy/vendors/js/forms/select/select2.full.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/vuexy/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>--}}
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>

    $(window).on('load', function () {

        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
        @if(session()->has('success'))
feather.replace({
            width: 14,
            height: 14
        });
        toastr['success'](
            "{{session()->get('success')}}",
            {
                closeButton: false,
                tapToDismiss: true
            }
        );
        @endif

        @if(session()->has('error'))
        feather.replace({
            width: 18,
            height: 14
        });
        toastr['error'](
            "{{session()->get('error')}}",
            {
                closeButton: false,
                tapToDismiss: true
            }
        );
        @endif
        @if($errors->any())
        feather.replace({
                    width: 14,
                    height: 14
                });
        toastr['error'](
            "{{$errors->first()}}",
            {
                closeButton: false,
                tapToDismiss: true
            }
        );
        @endif

    })


</script>


@stack('script')
