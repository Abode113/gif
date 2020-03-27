
<?php

    $split = explode("/", $_SERVER['REQUEST_URI']);
    $length = sizeof($split);
    $gifId = $split[$length - 1];

?>
<div data-url="<?php echo $gifId;?>" id="minifiedUrl" hidden></div>

<button type="button" class="btn btn-success"><a id="realLink" href="" target="_blank">Go To your link</a></button>