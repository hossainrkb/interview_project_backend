<script src="{{ asset('/themes/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/themes/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('/themes/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('/themes/dist/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('/themes/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/themes/plugins/toastr/toastr.min.js') }}"></script>

<script>
    function sweetAlertToast(message, alertType) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCancelButton: false,
            timer: 6000
        });
        Toast.fire({
            icon: alertType,
            title: `<p style='padding:20px'>${message}</p>`
        })
    }
</script>
<script>
    var csrf_token = document.getElementById('csrf_token_identifier').value;
    var application_base_url = document.getElementById('application_base_url').value;
    var application_api_url = document.getElementById('application_api_url').value;
</script>
<script src="{{ asset('/js/settings.js') }}"></script>
@stack('js')
