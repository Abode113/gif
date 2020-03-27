function storeKey(selector) {
    var params = {
        key: $(selector).data('key')
    };
    $.post(siteURL + "requests/store.php", params)
        .done(function (response) {
            $(selector).val(response.key);
        })
}

function addCsrfCheckForRquests(csrfRequestFiles) {
    $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        var storeEl = $("#store");
        // Checks
        if (originalOptions.method) {
            // console.warn("using method");
            return;
        }
        if (originalOptions.type.toLowerCase() !== 'post' || options.type.toLowerCase() !== 'post') return;
        var requestPage = getFileFromUrl(originalOptions.url);
        if (csrfRequestFiles.indexOf(requestPage) < 0 || requestPage.toLowerCase() == "store.php") return;
        if (storeEl.length < 1) {
            console.warn("did you forget to add the store input to the form?");
            return;
        }

        if (options.data instanceof FormData === true) {
            options.data.append('store', storeEl.val());
            options.data.append('store_key', storeEl.data("key"));
        } else if (typeof options.data == "string") {
            options.data = options.data + "&store=" + storeEl.val() + "&store_key=" + storeEl.data("key")
            // options.data = $.extend(originalOptions.data, { store : $("#store").val() });
        } else if (typeof options.data == "object") {
            options.data = $.extend(options.data, {store: $("#store").val(), store_key: storeEl.data("key")});
        } else {
            console.error("Unknown Data Type");
            return;
        }

        var originalSuccess = options.success;
        options.success = function (data) {
            storeKey('#store');
            if (isFunction(originalSuccess)) {
                originalSuccess(data);
            }
        };
    });

    function getFileFromUrl(url) {
        var r = /[^/\\&\?]+\.\w{3,4}(?=([\?&].*$|$))/;
        if (!r.test(url)) return '';
        return r.exec(url)[0]
    }

    function isFunction(functionToCheck) {
        return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }
}
