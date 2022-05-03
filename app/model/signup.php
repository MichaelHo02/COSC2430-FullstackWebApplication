<?php
require_once $config['LIB_PATH'] . "user.php";
require_once $config['LIB_PATH'] . "validation.php";
require_once $config['LIB_PATH'] . "io.php";

$emailMessage = '';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);


    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];


    // avatar validation
    if (isset($_FILES['formFile'])) {
        $result1 = isValidEmail($config, $email);
        $isEmailValid = $result1[0];
        $emailMessage = $result1[1];

        if ($isEmailValid) {
            $result = isValidFile($config, 'formFile', 'avatar/');
            $isFileValid = $result[0];
            $message = $result[1];
            $fileNewName = $result[2];
            $fileExt = $result[3];
        }
    } else {
        $message = 'No File was upload';
    }

    if ($isFileValid ?? null && $isEmailValid) {
        $user = new User(strtolower($email), $password, $firstName, $lastName, $fileNewName, $fileExt);

        $file = $config['DATABASE_PATH'] . 'users.db';
        if ($out = fopen($file, 'r')) {
            $jsonSrc = json_decode(fread($out, filesize($file)));
            array_push($jsonSrc, $user->jsonSerialize());
            $strSrc = json_encode($jsonSrc);
            fclose($out);

            setJson($file, $strSrc);

            header('Location: ?page=login');
        }
    }
}


$emailCSS = isset($_FILES['formFile']) ? isValidCSS($isEmailValid ?? null) : '';
$emailMessageCSS = isset($_FILES['formFile']) ? isValidMessageCSS($isEmailValid ?? null) : '';

if ($isEmailValid ?? null) {
    $fileCSS = isset($_FILES['formFile']) ? isValidCSS($isFileValid ?? null) : '';
    $fileMessageCSS = isset($_FILES['formFile']) ? isValidMessageCSS($isFileValid ?? null) : '';
} else {
    $fileCSS = '';
    $fileMessageCSS = '';
}
