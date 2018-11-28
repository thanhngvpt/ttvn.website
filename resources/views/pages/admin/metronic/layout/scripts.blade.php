<script src="{!! \URLHelper::asset('metronic/js/compiled.js', 'admin') !!}"></script>

<script type="text/javascript">
    var Boilerplate = {
        'csrfToken': "{!! csrf_token() !!}"
    };

    @if(Session::has('message-success'))
        toastr.success("{{ Session::get('message-success') }}", "Success");
    @elseif(Session::has('message-failed'))
        toastr.error("{{ Session::get('message-failed') }}", "Error");
    @endif
</script>