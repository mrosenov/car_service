<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@if ($message = Session::get('success'))
    <script type="text/javascript">
        toastr.success("{{ $message }}");
    </script>
@endif
@if ($message = Session::get('error'))
    <script type="text/javascript">
        toastr.error("{{ $message }}");
    </script>
@endif
@if ($message = Session::get('warning'))
    <script type="text/javascript">
        toastr.warning("{{ $message }}");
    </script>
@endif
@if ($message = Session::get('info'))
    <script type="text/javascript">
        toastr.info("{{ $message }}");
    </script>
@endif
@if ($errors->any())
    <script type="text/javascript">
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    </script>
@endif
