<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
defined('PUBLIC_PATH') || define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/'));

const DS = DIRECTORY_SEPARATOR;
require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

if ($funcRequest = get('func', '')) {
    include $config['LIB_PATH'] . $funcRequest . '.php';
} else {
    $page = get('page', 'home');
    $model = $config['MODEL_PATH'] . $page . '.php';
    $view = $config['VIEW_PATH'] . $page . '.php';
    $_404 = $config['VIEW_PATH'] . '404.php';

    $content = $_404;

    if (file_exists($model)) {
        require $model;
    }

    if (file_exists($view)) {
        $content = $view;
    }

    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0 ");

    require_once $config['VIEW_PATH'] . 'layout.php';
}
