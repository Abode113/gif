$(document).ready(function () {


    $(document).on('click','#favorite-btn', function () {

        $('.card' + $(this).data('id')).css('color', 'red');

        var gif_image = $(this).data('gif');
        var gif_title = $(this).data('title');
        var gif_source = $(this).data('source');

        var params = {
            gif: gif_image,
            title: gif_title,
            source: gif_source
        };

        $.post("requests/favorite.php", params)
            .done(function (response) {
                unloading();
                if (response.code == 1) {
                } else {
                    $('.theCaptcha').attr('src', $('.theCaptcha').attr('src') + 0);
                    notification('danger', response.msg)
                }
            });

    });

    $(document).on('click','#shareableLink-btn', function () {

        var gif_image = $(this).data('gif');

        var params = {
            realLink: gif_image
        };

        loading();

        $.post("requests/shareableLink.php", params)
            .done(function (response) {
                unloading();
                if (response.code == 1) {
                    Swal.fire('the link is : http://localhost/GIF/gifdetails/' + response.data);
                } else {
                    $('.theCaptcha').attr('src', $('.theCaptcha').attr('src') + 0);
                    notification('danger', response.msg)
                }
            });

    });



    $(document).on('click', '#search-btn', function (e) {
            e.preventDefault();

            var searchText = $('#Searchbox').val();
            localStorage.setItem('searchText', searchText);
            localStorage.setItem('offset', 0);

            loading();

            var gifApi = "https://api.giphy.com/v1/gifs/search?";
            var apiKey = "93y1OoAQVK08RTPk2TmOqGfSnuosm8vw";
            var limit = 12;
            var offset = 0;
            var rating = 'G';
            var lang = 'en';

            var url = gifApi + 'api_key=' + apiKey + '&q=' + searchText + '&limit=' + limit + '&offset=' + offset + '&eating=' + rating + '&lang=' + lang;

            $.get(url)
                .done(function (response) {
                    unloading();
                    if(response.meta.status == 200){

                        // $('#prev-btn').prop('disabled', true);
                        $('#next-btn').prop('disabled', false);

                        $('#gifdiv').empty();
                        for(var i = 0; i < response.data.length; i++){
                        // <a href="#" class="btn btn-primary">Details</a>
                            $('#gifdiv').append('\
                                <div class="col-3 card-div">\
                                    <div class="card" style="width: 18rem;">\
                                        <img src="' + response.data[i].images.fixed_height_downsampled.url + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                        <div class="card-body">\
                                            <h5 class="card-title">' + response.data[i].title + '</h5>\
                                            <a href="' + response.data[i].source_post_url + '" <p class="card-text">For More Information</p>\
                                            <a href="#" id="favorite-btn" \
                                                data-title="' + response.data[i].title + '" \
                                                data-gif="' + response.data[i].images.fixed_height_downsampled.url + '"\
                                                data-source="' + response.data[i].source_post_url + '"\
                                                data-id="' + i + '"\
                                                class="btn btn-primary card' + i + '"><i class="fas fa-heart"></i></a>\
                                            <a href="#" id="shareableLink-btn" \
                                                data-gif="' + response.data[i].images.fixed_height_downsampled.url + '"\
                                                data-id="' + i + '"\
                                                class="btn btn-primary shareableLink' + i + '"><i class="fas fa-share"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                                ');

                        }
                    }else{
                        notification('danger', 'something went wrong');
                    }

                });

        var params = {
            searchText: searchText
        };

        $.post("requests/history.php", params)
            .done(function (response) {
                unloading();
                if (response.code == 1) {
                } else {
                    $('.theCaptcha').attr('src', $('.theCaptcha').attr('src') + 0);
                    notification('danger', response.msg)
                }
            });


    });


    $(document).on('click', '#prev-btn', function (e) {

        e.preventDefault();

        var searchText = localStorage.getItem('searchText');

        loading();

        var gifApi = "https://api.giphy.com/v1/gifs/search?";
        var apiKey = "93y1OoAQVK08RTPk2TmOqGfSnuosm8vw";
        var limit = 12;
        var offset = localStorage.getItem('offset') - limit;
        localStorage.setItem('offset', offset);
        var rating = 'G';
        var lang = 'en';

        var url = gifApi + 'api_key=' + apiKey + '&q=' + searchText + '&limit=' + limit + '&offset=' + offset + '&eating=' + rating + '&lang=' + lang;

        if (offset == 0){
            $('#prev-btn').prop('disabled', true);
        }

        $.get(url)
            .done(function (response) {
                unloading();

                if(response.meta.status == 200){

                    $('#gifdiv').empty();
                    for(var i = 0; i < response.data.length; i++){
                    // <a href="#" class="btn btn-primary">Details</a>
                        $('#gifdiv').append('\
                                <div class="col-3 card-div">\
                                    <div class="card" style="width: 18rem;">\
                                        <img src="' + response.data[i].images.fixed_height_downsampled.url + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                        <div class="card-body">\
                                            <h5 class="card-title">' + response.data[i].title + '</h5>\
                                            <a href="' + response.data[i].source_post_url + '" <p class="card-text">For More Information</p>\
                                            <a href="#" id="favorite-btn" \
                                                data-title="' + response.data[i].title + '" \
                                                data-gif="' + response.data[i].images.fixed_height_downsampled.url + '"\
                                                data-source="' + response.data[i].source_post_url + '"\
                                                data-id="' + i + '"\
                                                class="btn btn-primary card' + i + '"><i class="fas fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                                ');

                    }
                }else{
                    notification('danger', 'something went wrong');
                }

            })
    });




    $(document).on('click', '#next-btn', function (e) {

        e.preventDefault();

        var searchText = localStorage.getItem('searchText');

        $('#prev-btn').prop('disabled', false);

        loading();

        var gifApi = "https://api.giphy.com/v1/gifs/search?";
        var apiKey = "93y1OoAQVK08RTPk2TmOqGfSnuosm8vw";
        var limit = 12;
        var offset = localStorage.getItem('offset') + limit;
        localStorage.setItem('offset', offset);
        var rating = 'G';
        var lang = 'en';

        var url = gifApi + 'api_key=' + apiKey + '&q=' + searchText + '&limit=' + limit + '&offset=' + offset + '&eating=' + rating + '&lang=' + lang;

        $.get(url)
            .done(function (response) {
                unloading();

                if(response.meta.status == 200){

                    $('#gifdiv').empty();
                    for(var i = 0; i < response.data.length; i++){
                    // <a href="#" class="btn btn-primary">Details</a>
                        $('#gifdiv').append('\
                                <div class="col-3 card-div">\
                                    <div class="card" style="width: 18rem;">\
                                        <img src="' + response.data[i].images.fixed_height_downsampled.url + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                        <div class="card-body">\
                                            <h5 class="card-title">' + response.data[i].title + '</h5>\
                                            <a href="' + response.data[i].source_post_url + '" <p class="card-text">For More Information</p>\
                                            <a href="#" id="favorite-btn" \
                                                data-title="' + response.data[i].title + '" \
                                                data-gif="' + response.data[i].images.fixed_height_downsampled.url + '"\
                                                data-source="' + response.data[i].source_post_url + '"\
                                                data-id="' + i + '"\
                                                class="btn btn-primary card' + i + '"><i class="fas fa-heart"></i></a>\
                                        </div>\
                                    </div>\
                                </div>\
                                ');

                    }
                }else{
                    notification('danger', 'something went wrong');
                }

            })
    });

})