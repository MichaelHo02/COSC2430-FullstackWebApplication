<?php
if (!isset($_SESSION['admin'])) {
    header('Location: ?page=admin_login');
}
if ($_SESSION['admin'] != ('admin' . md5('yasuoroot') . 'x')) {
    header('Location: ?page=admin_login');
}

include_once $config['LIB_PATH'] . 'card' . DS . 'model.php';
$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
