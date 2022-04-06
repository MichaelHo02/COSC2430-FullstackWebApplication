<?php
    include_once 'sortCmp.php';
    $userFile = '../accounts.db';
    $userDb = fopen($userFile, 'r');
    $userSrc = fread($userDb, filesize($userFile));
    $jsonObj = json_decode($userSrc);
    usort($jsonObj, "cmpUser");
    echo json_encode($jsonObj);
    fclose($userDb);
?>