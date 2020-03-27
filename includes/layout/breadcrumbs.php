<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <?php if (isset($page_breadcrumbs) && !empty($page_breadcrumbs)) { ?>
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <?php echo $page_header_title ?>
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">

                    <a href="<?php echo $APP_ROOT ?>" class="kt-subheader__breadcrumbs-home"><i class="fa fa-home"></i></a>

                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <?php foreach ($page_breadcrumbs as $breadcrumb) { ?>
                        <a href="<?php echo $breadcrumb['link'] ?>" class="kt-subheader__breadcrumbs-link">
                            <?php echo $breadcrumb['title'] ?> </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    <?php } ?>
                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>
        <?php } ?>
    </div>
</div>
