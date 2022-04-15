<?php
$pathPostHandler = $config['LIB_PATH'] . 'post' . DS . 'model.php';
$pathRenderPostFactory = $config['LIB_PATH'] . 'post' . DS . 'view.php';

function setBtnVisibility()
{
    if (isset($_COOKIE['user-id-cookie'])) {
        return "";
    } else {
        return "d-none";
    }
}

$btnVisibility = setBtnVisibility();

include_once $config['LIB_PATH'] . 'card' . DS . 'model.php';
$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
