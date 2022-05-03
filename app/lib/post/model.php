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
    $explore = explode('.', $_FILES['uploadImg']['name']);
    $file_ext = strtolower(end($explore));
}

if ($isValidFile && isset($_POST['submit'])) {
    // Create new post obj
    $post = new Post(
        $fileNewName,
        $_COOKIE['user-id-cookie'],
        $_POST['postDesc'],
        $_POST['sharingLev'],
        $file_ext
    );

    // Add img to db
    $postFile =  $config['DATABASE_PATH'] . 'posts.db';
    $jsonPostSrc = getJson($postFile);
    array_push($jsonPostSrc, $post->jsonSerialize());
    $strJson = json_encode($jsonPostSrc);
    setJson($postFile, $strJson);

    header('location: ?page=home');
}

$inputClass = isset($_POST['submit']) ? isValidCSS($isValidFile) : '';
$messageClass = isset($_POST['submit']) ? isValidMessageCSS($isValidFile) : '';
$btnValidations = isset($_POST['submit']) ? isValidBtnCSS($isValidFile) : '';
