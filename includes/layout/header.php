<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>" dir="<?php echo $_SESSION[SESSION]['lang'] == 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $page_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <?php
    foreach ($shared_css as $css) {
        if (isset($css)) echo "<link href=\"{$APP_ROOT}{$css}\" rel=\"stylesheet\" />";
    }

    foreach ($page_css as $css) {
        if (isset($css)) echo "<link href=\"{$APP_ROOT}{$css}\" rel=\"stylesheet\" />";
    }
    ?>
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
