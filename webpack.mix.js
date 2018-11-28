var mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .autoload({
        jquery: ['$', 'jQuery', 'jquery', 'window.jQuery'],
        tether: ['Tether', 'window.Tether'],
        'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper']
    })

    //for metronic
    .copyDirectory("node_modules/ion-rangeslider/img/sprite-skin-flat.png", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("node_modules/summernote/dist/font/**", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("node_modules/jstree/dist/themes/default/40px.png", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("node_modules/jstree/dist/themes/default/*.gif", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("node_modules/socicon/font/**", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("node_modules/font-awesome/fonts/**", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("public/static/common/libs/line-awesome/fonts/**", 'public/static/common/libs/metronic/fonts')
    .copyDirectory("public/static/common/libs/flaticon/fonts/**", 'public/static/common/libs/metronic/fonts')

    // metronic fonts for front-end
    .copyDirectory("public/static/common/libs/metronic/fonts", 'public/static/web/2018/fonts')

    // metronic fonts for admin-page
    .copyDirectory("public/static/common/libs/metronic/fonts", 'public/static/admin/metronic/fonts')

    // for public common fonts
    .copyDirectory('node_modules/roboto-fontface/fonts', 'public/static/common/fonts')

    .sass(
        'resources/assets/metronic/src/sass/demo/default/style.scss',
        'public/static/common/libs/metronic/css/demo.css'
    )
    .sass(
        'resources/assets/web/2018/sass/application.scss',
        'public/static/web/2018/css/application.css'
    )
    .sass(
        'resources/assets/admin/metronic/sass/application.scss',
        'public/static/admin/metronic/css/application.css'
    );

// --------------- begin: compile metronic libs ---------------
mix
    .styles(
        [
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/roboto-fontface/css/roboto/roboto-fontface.css',
            'node_modules/components-font-awesome/css/font-awesome.min.css',
            'node_modules/tether/dist/css/tether.css',
            'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
            'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
            'node_modules/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css',
            'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
            'node_modules/bootstrap-daterangepicker/daterangepicker.css',
            'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css',
            'node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css',
            'node_modules/bootstrap-select/dist/css/bootstrap-select.css',
            'node_modules/select2/dist/css/select2.css',
            'node_modules/nouislider/distribute/nouislider.css',
            "node_modules/owl.carousel/dist/assets/owl.carousel.css",
            "node_modules/owl.carousel/dist/assets/owl.theme.default.css",
            "node_modules/ion-rangeslider/css/ion.rangeSlider.css",
            "node_modules/ion-rangeslider/css/ion.rangeSlider.skinFlat.css",
            "node_modules/dropzone/dist/dropzone.css",
            "node_modules/summernote/dist/summernote.css",
            "node_modules/bootstrap-markdown/css/bootstrap-markdown.min.css",
            "node_modules/animate.css/animate.min.css",
            "node_modules/toastr/build/toastr.css",
            "node_modules/jstree/dist/themes/default/style.css",
            "node_modules/morris.js/morris.css",
            "node_modules/chartist/dist/chartist.min.css",
            "node_modules/socicon/css/socicon.css",
            "node_modules/font-awesome/css/font-awesome.css",
            "public/static/common/libs/line-awesome/css/line-awesome.css",
            "public/static/common/libs/flaticon/css/flaticon.css",
            "public/static/common/libs/metronic/css/styles.css",
            "public/static/common/libs/metronic/css/demo.css",
            "node_modules/bootstrap-tagsinput/src/bootstrap-tagsinput.css",
            "node_modules/sweetalert2/dist/sweetalert2.min.css",
        ],
        'public/static/common/libs/metronic/css/compiled.css'
    )
    .scripts(
        [
            // core metronic
            'node_modules/jquery/dist/jquery.js',
            'node_modules/popper.js/dist/umd/popper.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/js-cookie/src/js.cookie.js',
            'node_modules/jquery-smooth-scroll/jquery.smooth-scroll.js',
            'node_modules/moment/min/moment.min.js',
            'node_modules/wnumb/wNumb.js',

            // optional plugin
            'node_modules/jquery.repeater/jquery.repeater.js',
            'node_modules/jquery-form/dist/jquery.form.min.js',
            'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
            'node_modules/block-ui/jquery.blockUI.js',
            'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
            'node_modules/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js',
            'node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
            'node_modules/bootstrap-daterangepicker/daterangepicker.js',
            'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js',
            'node_modules/bootstrap-maxlength/src/bootstrap-maxlength.js',
            'node_modules/bootstrap-switch/dist/js/bootstrap-switch.js',
            'public/static/common/libs/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js',
            'node_modules/bootstrap-select/dist/js/bootstrap-select.js',
            'node_modules/select2/dist/js/select2.full.js',
            'node_modules/typeahead.js/dist/typeahead.bundle.js',
            'node_modules/handlebars/dist/handlebars.js',
            "node_modules/inputmask/dist/jquery.inputmask.bundle.js",
            "node_modules/inputmask/dist/inputmask/inputmask.date.extensions.js",
            "node_modules/inputmask/dist/inputmask/inputmask.numeric.extensions.js",
            "node_modules/inputmask/dist/inputmask/inputmask.phone.extensions.js",
            "node_modules/nouislider/distribute/nouislider.js",
            "node_modules/owl.carousel/dist/owl.carousel.js",
            "node_modules/autosize/dist/autosize.js",
            "node_modules/clipboard/dist/clipboard.min.js",
            "node_modules/ion-rangeslider/js/ion.rangeSlider.js",
            "node_modules/dropzone/dist/dropzone.js",
            "node_modules/summernote/dist/summernote.js",
            "node_modules/markdown/lib/markdown.js",
            "node_modules/bootstrap-markdown/js/bootstrap-markdown.js",
            "node_modules/jquery-validation/dist/jquery.validate.js",
            "node_modules/jquery-validation/dist/additional-methods.js",
            "node_modules/bootstrap-notify/bootstrap-notify.min.js",
            "node_modules/toastr/build/toastr.min.js",
            "node_modules/jstree/dist/jstree.js",
            "node_modules/raphael/raphael.js",
            "node_modules/morris.js/morris.js",
            "node_modules/chartist/dist/chartist.js",
            "node_modules/chart.js/dist/Chart.bundle.js",
            "public/static/common/libs/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js",
            "public/static/common/libs/jquery-idletimer/idle-timer.min.js",
            "node_modules/waypoints/lib/jquery.waypoints.js",
            "node_modules/counterup/jquery.counterup.js",
            "node_modules/bootstrap-tagsinput/src/bootstrap-tagsinput.js",
            "node_modules/zenscroll/zenscroll-min.js",
            "node_modules/es6-promise-polyfill/promise.min.js",
            "node_modules/sweetalert2/dist/sweetalert2.min.js",

            // metronic demo
            "resources/assets/metronic/src/js/framework/base/util.js",
            "resources/assets/metronic/src/js/framework/base/app.js",
            "resources/assets/metronic/src/js/framework/components/general/*.js",
            "resources/assets/metronic/src/js/framework/components/plugins/base/*.js",
            "resources/assets/metronic/src/js/framework/components/plugins/forms/*.js",
            "resources/assets/metronic/src/js/framework/components/plugins/charts/*.js",
            "resources/assets/metronic/src/js/demo/default/base/*.js",
            "resources/assets/metronic/src/js/app/base/*.js",
            "resources/assets/metronic/src/js/snippets/base/*.js"
        ],
        'public/static/common/libs/metronic/js/compiled.js'
    );
// --------------- end: compile metronic libs ---------------

// --------------- begin: web front-end ---------------
mix
    .styles(
        [
            'public/static/common/libs/metronic/css/compiled.css',
            "public/static/web/2018/css/application.css"
        ],
        "public/static/web/2018/css/compiled.css"
    )
    .scripts(
        [
            'public/static/common/libs/metronic/js/compiled.js',
            'resources/assets/web/2018/js/homepage.js'
        ],
        'public/static/web/2018/js/compiled.js'
    );
// --------------- end: web front-end ---------------

// --------------- begin: admin page ---------------
mix
    .styles(
        [
            'public/static/common/libs/metronic/css/compiled.css',
            "public/static/admin/metronic/css/customize-fonts.css",
            'public/static/admin/metronic/css/application.css'
        ],
        "public/static/admin/metronic/css/compiled.css"
    )
    .scripts(
        [
            'public/static/common/libs/metronic/js/compiled.js',
            'resources/assets/admin/metronic/js/config.js'
        ],
        'public/static/admin/metronic/js/compiled.js'
    );
// --------------- end: admin page ---------------