<?php
$config = [
    'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,
    'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
    'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS,
    'DATABASE_PATH' => APPLICATION_PATH . DS . 'database' . DS,
    'ASSETS_PATH' => APPLICATION_PATH . DS . 'assets' . DS,
];

require $config['LIB_PATH'] . 'function.php';