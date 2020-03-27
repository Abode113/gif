$(document).ready(function () {


    var limit = 12;
    var offset = 0;
    localStorage.setItem('offset', 0);

    var params = {
        limit: limit,
        offset: offset
    };
    loading();

    $.post(siteURL + 'requests/favoriteslist.php', params)
        .done(function (response) {

            unloading();

            if(response.code == 1){

                // $('#prev-btn').prop('disabled', true);
                $('#next-btn').prop('disabled', false);

                $('#gifFavList').empty();
                for(var i = 0; i < response.data.length; i++){

                // <a href="#" class="btn btn-primary">Details</a>
                    $('#gifFavList').append('\
                            <div class="col-3 card-div">\
                                <div class="card" style="width: 18rem;">\
                                    <img src="' + response.data[i].gif + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                    <div class="card-body">\
                                        <h5 class="card-title">' + response.data[i].title + '</h5>\
                                        <a href="' + response.data[i].source + '" <p class="card-text">For More Information</p>\
                                    </div>\
                                </div>\
                            </div>\
                            ');

                }
            }else{
                notification('danger', 'something went wrong');
            }

        });


    $(document).on('click', '#prev-fav-btn', function (e) {

        e.preventDefault();

        loading();

        var limit = 12;
        var offset = parseInt(localStorage.getItem('offset')) - limit;
        localStorage.setItem('offset', offset);

        if (offset == 0){
            $('#prev-fav-btn').prop('disabled', true);
        }

        var params = {
            limit: limit,
            offset: offset
        };

        $.post(siteURL + 'requests/favoriteslist.php', params)
            .done(function (response) {
                unloading();

                if(response.code == 1){

                    // $('#prev-btn').prop('disabled', true);
                    $('#next-fav-btn').prop('disabled', false);

                    $('#gifFavList').empty();
                    for(var i = 0; i < response.data.length; i++){

                    // <a href="#" class="btn btn-primary">Details</a>
                        $('#gifFavList').append('\
                            <div class="col-3 card-div">\
                                <div class="card" style="width: 18rem;">\
                                    <img src="' + response.data[i].gif + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                    <div class="card-body">\
                                        <h5 class="card-title">' + response.data[i].title + '</h5>\
                                        <a href="' + response.data[i].source + '" <p class="card-text">For More Information</p>\
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




    $(document).on('click', '#next-fav-btn', function (e) {

        e.preventDefault();

        var searchText = localStorage.getItem('searchText');

        $('#prev-fav-btn').prop('disabled', false);

        loading();

        var limit = 12;
        var offset = parseInt(localStorage.getItem('offset')) + limit;
        localStorage.setItem('offset', offset);

        var params = {
            limit: limit,
            offset: offset
        };

        $.post(siteURL + 'requests/favoriteslist.php', params)
            .done(function (response) {
                unloading();

                if(response.code == 1){

                    // $('#prev-btn').prop('disabled', true);
                    $('#next-fav-btn').prop('disabled', false);

                    $('#gifFavList').empty();
                    for(var i = 0; i < response.data.length; i++){

                    // <a href="#" class="btn btn-primary">Details</a>
                        $('#gifFavList').append('\
                            <div class="col-3 card-div">\
                                <div class="card" style="width: 18rem;">\
                                    <img src="' + response.data[i].gif + '" class="card-img-top gif" alt="' + response.data[i].title + '"/>\
                                    <div class="card-body">\
                                        <h5 class="card-title">' + response.data[i].title + '</h5>\
                                        <a href="' + response.data[i].source + '" <p class="card-text">For More Information</p>\
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