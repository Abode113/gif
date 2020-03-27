<?php require_once "includes/config.php"; ?>
<?php require_once "includes/layout/header.php"; ?>
<?php if (!($page ==  'register' || $page == 'login' || $page == '404')){ ?>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="<?php echo $APP_ROOT ?>">
            <img class="sys-icon" alt="Logo" src="<?php echo $APP_ROOT . 'assets/images/sys-icon.gif' ?>"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
            <i class="fa fa-ellipsis-v"></i></button>
    </div>
</div>

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="fa fa-times"></i></button>
        <?php require_once "includes/layout/side_menu.php"; ?>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <?php require_once "includes/layout/top_menu.php"; ?>
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                <?php require_once "includes/layout/breadcrumbs.php"; ?>
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php require_once "includes/pages/{$page}.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php }
require_once "includes/pages/{$page}.php";
require_once "includes/layout/footer.php";
?>
</body>
</html>

