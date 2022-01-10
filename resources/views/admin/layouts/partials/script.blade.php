<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{-- <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
{{-- dataTable --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- toastr plugin -->
<script src="{{ URL::asset('/admin/assets/common/libs/toastr/toastr.min.js') }}"></script>
<!-- toastr init -->
<script src="{{ URL::asset('/admin/assets/common/js/pages/toastr.init.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/tooltip.js" >
</script>

<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/admin/assets/common/libs/sweetalert2/sweetalert2.min.js') }}"></script>

{!! Toastr::message() !!}
{{-- ajax status update code --}}
<script>
    function statusUpdate(id, url) {
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
        type: "POST",
        url: url,
        data : {id: id},
        success: function(response) {

        },
        error: function(response) {
        }
    });
}
</script>
<!-- REQUIRED SCRIPTS -->
@yield('script')

