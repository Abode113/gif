<?php

$standalone_pages = array(
    $pages['404'],
    $pages['login'],
    $pages['register'],
);
$admin_pages = array_merge(
    $standalone_pages,
    array(
        $pages['gifs'],
        $pages['favorite'],
        $pages['gifdetails'],
        $pages['history'],
    )
);

$admin_actions = $actions;

if (isset($_SESSION[SESSION]['session_id']) && !empty($_SESSION[SESSION]['session_id'])) {
    $current_role_pages = $admin_pages;
    $current_actions = $admin_actions;
    $landing_page = $pages['gifs'];
} else {
    $current_role_pages = $admin_pages;
    $current_actions = $admin_actions;
    $landing_page = $pages['gifs'];
}
$page = isset($_GET['page']) ? $_GET['page'] : null;
$page = empty($page) ? (isset($_SESSION[SESSION]['session_id']) ? $landing_page : $pages['login']) : make_safe($page);
$page = in_array($page, $current_role_pages) ? $page : $pages['404'];

