<script src="{!! \URLHelper::asset('libs/plugins/jQuery/jquery-3.2.1.min.js', 'admin') !!}"></script>
<script src="{!! \URLHelper::asset('libs/plugins/jQueryUI/jQuery-ui.min.js', 'admin') !!}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button);</script>

<script src="{!! \URLHelper::asset('libs/bootstrap/js/bootstrap.min.js', 'admin') !!}"></script>
<script src="{!! \URLHelper::asset('libs/adminlte/js/app.min.js', 'admin') !!}"></script>
<script src="{!! \URLHelper::asset('libs/plugins/toastr/toastr.min.js', 'admin') !!}"></script>
<script src="{!! \URLHelper::asset('libs/plugins/flagstrap/dist/js/jquery.flagstrap.min.js', 'admin') !!}"></script>
<script src="{!! \URLHelper::asset('js/script.js', 'admin/adminlte') !!}"></script>

<script type="text/javascript">
    var Boilerplate = {
        'csrfToken': "{!! csrf_token() !!}"
    };

    $('#language-switcher').flagStrap({
        countries: {
            "GB": "English",
            "VN": "Tiếng Việt"
        },
        buttonSize: "btn-sm",
        buttonType: "btn-primary",
        labelMargin: "10px",
        scrollable: false,
        placeholder: false,
        scrollableHeight: "350px",
        onSelect: function (value, element) {
            url = window.location.href.split('?')[0] + '?locale=' + value.toLowerCase();
            window.location.href = url;
        }
    });

    @if(Session::has('message-success'))
        toastr["success"]("{{ Session::get('message-success') }}", "Successfully !!!");
    @endif
        @if(Session::has('message-failed'))
        toastr["error"]("{{ Session::get('message-failed') }}", "Error !!!");
    @endif
</script>