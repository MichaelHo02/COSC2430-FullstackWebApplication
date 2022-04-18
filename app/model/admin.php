<?php
if ($_COOKIE['admin'] != ('admin' . md5('yasuoroot') . 'x')) {
    header('Location: ?page=home');
}

include_once $config['LIB_PATH'] . 'card' . DS . 'model.php';
$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
