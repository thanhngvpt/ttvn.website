$("#keywords").tagsinput({
    tagClass: "btn btn-sm m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent margin-bottom-5"
});

// for Froala editor
$("#froala-editor").froalaEditor({
    toolbarInline: false,
    pastePlain: true,
    heightMin: 200,
    heightMax: 500,
    imageUploadURL: Boilerplate.imageUploadUrl,
    imageUploadParams: Boilerplate.imageUploadParams,
    imageManagerLoadURL: Boilerplate.imagesLoadURL,
    imageManagerLoadParams: Boilerplate.imagesLoadParams,
    imageManagerDeleteURL: Boilerplate.imageDeleteURL,
    imageManagerDeleteParams: Boilerplate.imageDeleteParams,
    imageManagerDeleteMethod: "DELETE"
}).on('froalaEditor.initialized', function (e, editor) {

}).on('froalaEditor.focus', function (e, editor) {

}).on('froalaEditor.image.inserted', function (e, editor, img) {

}).on('froalaEditor.image.error', function (e, editor, error) {

}).on('froalaEditor.image.removed', function (e, editor, $img) {
    Boilerplate.imageDeleteParams.src = $img.attr('src');
    
    $.ajax({
        url: Boilerplate.imageDeleteURL,
        method: 'DELETE',
        data: Boilerplate.imageDeleteParams,
        error: function (xhr, error) {
            console.log(error);
        },
        success: function (response) {
            console.log(response);
        }
    });
});

$(document).ready(function () {
    $('#cover-image').change(function (event) {
        $('#cover-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
    });

    $('.datetime-picker').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: "bottom-left",
        format: "yyyy/mm/dd hh:ii:ss"
    });
});