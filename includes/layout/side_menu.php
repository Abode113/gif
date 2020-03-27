<?php
if(!isset($_SESSION[SESSION]['SessionId'])){
    header("Location: login");
    exit();
}
?>
<?php
$side_menu_pages = array(
    array(
        "title" => $lang["gifs"],
        "link" => $pages['gifs'],
        "icon" => 'fa fa-columns',
    ),
    array(
        "title" => $lang["favorite"],
        "link" => $pages['favorite'],
        "icon" => 'fa fa-columns',
    ),
//    array(
//        "title" => $lang["gifdetails"],
//        "link" => $pages['gifdetails'],
//        "icon" => 'fa fa-columns',
//    ),
    array(
        "title" => $lang["history"],
        "link" => $pages['history'],
        "icon" => 'fa fa-columns',
    ),
)

?>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="<?php echo $APP_ROOT ?>">
                <img class="sys-icon" alt="Logo" src="<?php echo $APP_ROOT . 'assets/images/sys-icon.gif' ?>"/>
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                         class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                  id="Path-94" fill="#000000" fill-rule="nonzero"
                                  transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                  id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                  transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                        </g>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                  id="Path-94" fill="#000000" fill-rule="nonzero"/>
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                  id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                  transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                        </g>
                    </svg>
                </span>
            </button>
        </div>
    </div>

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
             data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <?php
                $side_menu_pages_html = "";
                foreach ($side_menu_pages as $menu_pages) {
                    if (isset($menu_pages['sub']) && !empty($menu_pages['sub'])) {
                        $is_nested_active = is_nested_active($menu_pages['sub'], $page);
                        $nested_active = $is_nested_active ? " kt-menu__item--open kt-menu__item--here" : "";
                        ?>
                        <li class="kt-menu__item  kt-menu__item--submenu <?php echo $nested_active; ?>"
                            aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="#" class="kt-menu__link kt-menu__toggle">
                                <?php if (isset($menu_pages['icon'])) { ?>
                                    <i class="kt-menu__link-icon <?php echo $menu_pages['icon'] ?>"></i>
                                <?php } ?>
                                <span class="kt-menu__link-text"><?php echo $menu_pages['title'] ?></span>
                                <i class="kt-menu__ver-arrow fa fa-angle-right"></i>
                            </a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                        <span class="kt-menu__link"><span
                                                    class="kt-menu__link-text"><?php echo $menu_pages['title'] ?></span></span>
                                    </li>
                                    <?php foreach ($menu_pages['sub'] as $sub) {
                                        $active_sub_page = $sub['link'] == $page ? 'kt-menu__item--active' : '';
                                        if (in_array($sub['link'], $current_role_pages)) {
                                            ?>
                                            <li class="kt-menu__item <?php echo $active_sub_page ?> "
                                                aria-haspopup="true">
                                                <a href="<?php echo $APP_ROOT . $sub['link'] ?>" class="kt-menu__link">
                                                    <?php if (isset($sub['icon'])) { ?>
                                                        <i style="color:#0e2a70;font-size:25px"
                                                           class="kt-menu__link-icon <?php echo $sub['icon'] ?>"></i>
                                                    <?php } ?>
                                                    <span class="kt-menu__link-text"><?php echo $sub['title'] ?></span>
                                                </a>
                                            </li>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    <?php } else {
                        $active_page = $menu_pages['link'] == $page ? 'kt-menu__item--active' : '';
                        if (in_array($menu_pages['link'], $current_role_pages)) {

                            ?>
                            <li class="kt-menu__item <?php echo $active_page ?>" aria-haspopup="true">
                                <a href="<?php echo $APP_ROOT . $menu_pages['link'] ?>" class="kt-menu__link ">
                                    <?php if (isset($menu_pages['icon'])) { ?>
                                        <i class="kt-menu__link-icon <?php echo $menu_pages['icon'] ?>"></i>
                                    <?php } ?>

                                    <span class="kt-menu__link-text"><?php echo $menu_pages['title'] ?></span>
                                </a>
                            </li>
                        <?php }
                    }
                } ?>
            </ul>
        </div>
    </div>

    <!-- END: Aside Menu -->
</div>
