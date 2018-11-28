$(document).ready(function () {
    $(".delete-button").click(function (e) {
        var self = $(this),
            url = self.attr('data-delete-url');

        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!"
        }).then(function (e) {
            if( typeof(e.value) != 'undefined' && e.value) {
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        '_token': Boilerplate.csrfToken
                    },
                    error: function (xhr, error) {
                        // console.log(url, xhr, error);
                        // self.loading = false;
                        // location.reload();
                    },
                    success: function (response) {
                        // location.reload();
                    }
                });
                swal("Deleted!", "Your file has been deleted.", "success").then(function () {
                    location.reload();
                });
            }
        })
    });
});