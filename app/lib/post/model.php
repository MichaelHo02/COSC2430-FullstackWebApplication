<?php

require_once $config['LIB_PATH'] . "post.php";
require_once $config['LIB_PATH'] . "validation.php";
require_once $config['LIB_PATH'] . "io.php";

$isValidFile = false;
$message = '';
$fileNewName = '';

if ($_FILES['uploadImg'] ?? null) {
    $result = isValidFile($config, 'uploadImg', 'storage/');
    $isValidFile = $result[0];
    $message = $result[1];
    $fileNewName = $result[2];
    $fileExt = $result[3] ?? null;
}

if ($isValidFile && isset($_POST['submit'])) {
    // Create new post obj
    $post = new Post(
        $fileNewName,
        $_SESSION['user-id-cookie'],
        $_POST['postDesc'],
        $_POST['sharingLev'],
        $fileExt
    );

    // Add img to db
    $postFile =  $config['DATABASE_PATH'] . 'posts.db';
    $jsonPostSrc = getJson($postFile);
    array_push($jsonPostSrc, $post->jsonSerialize());
    $strJson = json_encode($jsonPostSrc);
    setJson($postFile, $strJson);
}

$inputClass = isset($_POST['submit']) ? isValidCSS($isValidFile) : '';
$messageClass = isset($_POST['submit']) ? isValidMessageCSS($isValidFile) : '';
$btnValidations = isset($_POST['submit']) ? isValidBtnCSS($isValidFile) : '';
