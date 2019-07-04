<script>
    const BASE_URL = "{{ url('/admin') }}";
    const TOKEN = "{{ csrf_token() }}";
</script>
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/admin.js') }}"></script>
<script src="{{ asset('admin_assets/js/ajax_admin.js') }}"></script>