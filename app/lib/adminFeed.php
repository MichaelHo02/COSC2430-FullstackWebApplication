<?php
require_once $config['LIB_PATH'] . 'sortCmp.php';
$userFile = $config['DATABASE_PATH'] . 'users.db';
$userDb = fopen($userFile, 'r');
$userSrc = fread($userDb, filesize($userFile));
$jsonObj = json_decode($userSrc);
usort($jsonObj, 'cmpUser');
fclose($userDb);
echo json_encode($jsonObj);