var mainURL = '';
var siteURL = '';
var projectRoot = '';
var filesURL = '';
if (window.location.host === 'localhost') {
    fullURL = 'localhost/GIF/';
    mainURL = '/GIF/gifs';
    siteURL = '/GIF/';
    filesURL = '/files/';
    projectRoot = '/files/';

}
var KTAppOptions = {
    "colors": {
        "state": {
            "brand": "#5d78ff",
            "dark": "#282a3c",
            "light": "#ffffff",
            "primary": "#5867dd",
            "success": "#34bfa3",
            "info": "#36a3f7",
            "warning": "#ffb822",
            "danger": "#fd3995"
        },
        "base": {
            "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
            "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        }
    }
};

function select2Remote(selector, placeholder, url, list) {
    var data = [];
    var params = {
        action: list,
    };
    $.post(siteURL + "requests/" + url + "", params)
        .done(function (response) {
            if (typeof response.data === "object") {
                $.each(response.data, function (i, obj) {
                    data[i] = {id: obj.id, text: obj.name}
                });
            }
            $(selector).select2({
                placeholder: placeholder,
                allowClear: false,
                data: data
            });

        })

}

function select2default(selector, placeholder) {
    $(selector).select2({
        placeholder: placeholder,
        allowClear: false,

    });
}

//Loading Function
function loading() {
    KTApp.blockPage({
        overlayColor: '#000000',
        type: 'loader',
        state: 'success',
        message: lang.pleaseWait
    });
}

//Unloading Function
function unloading() {
    KTApp.unblockPage()

}

function notification(type, massage) {
    var placement = $('html').attr('lang') === 'ar' ? 'left' : 'right';
    $.notify({
        message: massage,
    }, {
        // settings
        type: type,
        placement: {
            from: "top",
            align: placement
        },
        offset: {
            x: 30,
            y: 90
        },
        animate: {
            enter: 'fade-in',
            exit: ''
        },

        delay: 2000
    });

}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.preview-img').attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec;
    return time;
}


function defer() {
    $('.is-loading').each(function (index) {

        var $Element = $(this);
        var type = $Element.data('type');
        switch (type) {
            // News
            case 1: {
                $Element.attr('src', siteURL + 'assets/images/no_image.png');
            }
            // User
            case 2: {
                $Element.attr('src', siteURL + 'assets/images/avatar.png');
            }
            default: {
                $Element.attr('src', siteURL + 'assets/images/no_image.png');
            }
        }

        var img = new Image();
        img.onload = function () {

            $Element.removeClass('is-loading');
            $Element.attr('src', $Element.data('src'));
        };
        img.setAttribute('src', $Element.data('src'));
    });
}


$(document).ready(function () {

    var lang = $('html').attr('lang') == 'en' ? 'en' : 'ar';
    let images = [], video = [], thumb = [], file = [];
    let initial;

    var language = $('html').attr('lang') === 'en' ? 'en' : 'ar';
    var isRTL = $('html').attr('lang') !== 'en';
    var arrow_left = $('html').attr('lang') === 'en' ? '<i class="fa fa-chevron-left"></i>' : '<i class="fa fa-chevron-right"></i>';
    var arrow_right = $('html').attr('lang') === 'en' ? '<i class="fa fa-chevron-right"></i>' : '<i class="fa fa-chevron-left"></i>';

    $(document).on('click', '#change-language', function (e) {
        var lang = $(this).data('lang');
        var params = {
            lang: lang,
        };
        e.preventDefault();
        $.post(siteURL + "requests/change_language.php", params)
            .done(function (response) {
                if (response.code === 1) {
                    location.reload()
                }
            })

    });

    $(document).on('click', '#sign-out', function (e) {
        $.post(siteURL + 'requests/logout.php')
            .done(function (response) {
                if (response == 1) {
                    window.location = 'login'
                }
            })

    });

    if ($('textarea').length > 0) {
        $('textarea').trumbowyg({
            lang: lang,
            svgPath: siteURL + 'assets/images/icons.svg',
            resetCss: true,
            removeformatPasted: true,
            btns: [
                ['strong', 'em'],
                ['undo', 'redo'],
                ['unorderedList', 'orderedList'],
                ['viewHTML'],
                ['fullscreen']
            ],
        });
    }


    if ($('.date-picker').length > 0) {
        $.fn.datepicker.defaults.zIndexOffset = 10;
        $('.date-picker').datepicker({
            todayHighlight: true,
            rtl: isRTL,
            templates: {
                leftArrow: arrow_left,
                rightArrow: arrow_right
            }
        });

    }

    if ($('.time-picker').length > 0) {
        $.fn.timepicker.defaults = $.extend(true, {}, $.fn.timepicker.defaults, {
            icons: {
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down'
            }
        });
        $('.time-picker').timepicker()

    }
    if ($('.select-picker').length > 0) {
        $('.select-picker').selectpicker();

    }
    if ($('.max-length').length > 0) {
        $('.max-length').maxlength({
            warningClass: "kt-badge kt-badge--warning kt-badge--rounded kt-badge--inline",
            limitReachedClass: "kt-badge kt-badge--success kt-badge--rounded kt-badge--inline"
        });
    }
    if ($('.max-length').length > 0) {

        $('.touch-spin').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            verticalbuttons: true,
            verticalup: '<i class="fa fa-angle-up"></i>',
            verticaldown: '<i class="fa fa-angle-down"></i>'
        });
    }
    if ($('[data-switch=true]').length > 0) {
        $('[data-switch=true]').bootstrapSwitch();

    }
    if ($('.date-range-picker').length > 0) {
        $('.date-range-picker').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary'
        });

    }

    if ($('input[type=file].file-input').length > 0) {

        if ($('.old-video').length > 0) {
            let oldImages = $('.old-video');
            $.each(oldImages, function (key, val) {
                video.push(val.outerHTML)
            });
        }

        if ($('.old-thumb').length > 0) {
            let oldImages = $('.old-thumb');
            $.each(oldImages, function (key, val) {
                thumb.push(val.outerHTML)
            });
        }
        if ($('.old-file').length > 0) {
            let oldImages = $('.old-file');
            $.each(oldImages, function (key, val) {
                file.push(val.outerHTML)
            });
        }

        initial = {'pictures': [], 'video': video, 'thumbnail': thumb, 'file': file};

        $('input[type=file].file-input').each(function () {
            var max = $(this).data('max');
            var name = $(this).attr('id');
            $(this).fileinput({
                initialPreview: initial[name],
                previewFileType: false,
                fileSingle: lang.file,
                filePlural: lang.files,
                browseLabel: lang.browseLabel,
                msgPlaceholder: lang.msgPlaceholder,
                msgSelected: lang.msgSelected,
                maxFileCount: max,
                rtl: true,
                fileActionSettings: {
                    showZoom: false,
                    showRemove: true,
                    removeIcon: '<i class="fa fa-trash"></i>',

                },
                showRemove: false,
            });
        });
    }

});
