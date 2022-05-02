<?php
$config = [
    'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,
    'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
    'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS,
    'DATABASE_PATH' => APPLICATION_PATH . DS . 'database' . DS,
    'ASSETS_PATH' => PUBLIC_PATH . DS . 'assets' . DS,
    'CSS_PATH' => PUBLIC_PATH . DS . 'assets' . DS . 'css' . DS,
    'JS_PATH' => PUBLIC_PATH . DS . 'assets' . DS . 'js' . DS,
    'IMG_PATH' => PUBLIC_PATH . DS . 'assets' . DS . 'img' . DS
];

require $config['LIB_PATH'] . 'function.php';