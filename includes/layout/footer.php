<?php

foreach ($shared_js as $js) {
    if (isset($js)) echo "<script src=\"{$APP_ROOT}{$js}{$assets_version}\"></script>";
}

foreach ($page_js as $js) {
    if (isset($js)) echo "<script src=\"{$APP_ROOT}{$js}{$assets_version}\"></script>";
}
echo "<script src=\"{$APP_ROOT}assets/js/pages/{$page}.js\"></script>";
echo CSRF::getFooterHtml();
?>
