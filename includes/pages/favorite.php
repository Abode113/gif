<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                <?php echo $lang['favorite']?>
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin: Search Form -->
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="row align-items-center">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <button type="button" id="prev-fav-btn" class="btn btn-primary" id="search-btn" disabled="true"><img class="pagination-btn" src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_403-512.png"></img></button>
                            <button type="button" id="next-fav-btn" class="btn btn-primary" id="search-btn"><img class="pagination-btn" src="https://cdn4.iconfinder.com/data/icons/iready-symbols-arrows-vol-1/28/004_041_left_prev_previous_home_arrow_circle1x-512.png"></img></button>                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end: Search Form -->
    </div>
        <!--end: Search Form -->

    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="row gifList" id="gifFavList">

        </div>

        <!--end: Datatable -->
    </div>
</div>
