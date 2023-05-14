<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('assets/dist/js/pages/dashboard3.js') }}"></script>
<!-- Validator -->
<script src="{{ asset('assets/plugins/validator/validator.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('assets/dist/js/toast.js') }}"></script>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });
@if(Session::has('notif-message'))
$(function () {
  Toast.fire({
    icon: "{{ trim(Session::get('notif-type')) }}",
    title: "{{ trim(Session::get('notif-message')) }}"
  });
});

@endif
</script>
