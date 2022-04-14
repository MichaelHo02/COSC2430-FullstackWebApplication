<?php
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
const DS = DIRECTORY_SEPARATOR;
require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

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

include $config['VIEW_PATH'] . 'layout.php';
