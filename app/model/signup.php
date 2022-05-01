<?php
require_once $config['LIB_PATH'] . "user.php";
require_once $config['LIB_PATH'] . "imageValidation.php";
require_once $config['LIB_PATH'] . "io.php";

$emailMessage = '';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);


    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    
    // avatar validation
    if (isset($_FILES['formFile'])) {
        $result = isValidFile($config);
        $file_ok = $result[0];
        $message = $result[1];
        $fileNewName = $result[2];
        $result1 = isValidEmail($config, $email);
        $isEmailValid = $result1[0];
        $emailMessage = $result1[1];
    } else {
        $message = 'No File was uploa!';
    }

    if ($file_ok && $isEmailValid) {
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

