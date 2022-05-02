<?php
require_once $config['LIB_PATH'] . "user.php";
require_once $config['LIB_PATH'] . "signupValidation.php";
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
            $result = isValidFile($config);
            $isFileValid = $result[0];
            $message = $result[1];
            $fileNewName = $result[2];
        }
    } else {
        $message = 'No File was upload';
    }

    if ($isFileValid ?? null && $isEmailValid) {
        $user = new User(strtolower($email), $password, $firstName, $lastName, $fileNewName);

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

function isValidCSS($isValid)
{
    if (isset($_FILES['formFile'])) {
        if ($isValid) {
            return 'is-valid';
        } else {
            return 'is-invalid';
        }
    }
    return '';
}

function isValidMessageCSS($isValid)
{
    if (isset($_FILES['formFile'])) {
        if ($isValid) {
            return 'valid-feedback';
        } else {
            return 'invalid-feedback';
        }
    }
    return '';
}

$fileCSS = isValidCSS($isFileValid ?? null);
$fileMessageCSS = isValidMessageCSS($isFileValid ?? null);

$emailCSS = isValidCSS($isEmailValid ?? null);
$emailMessageCSS = isValidMessageCSS($isEmailValid ?? null);
