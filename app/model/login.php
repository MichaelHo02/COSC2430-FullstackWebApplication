<?php
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}

require_once $config['LIB_PATH'] . "user.php";
require_once $config['LIB_PATH'] . "io.php";

function validateLogin($config)
{
    $loginPasswordErr = '';
    $email_message = '';

    if (isset($_POST['submit'])) {
        $emailUsername = $_POST['email'];
        $loginPassword = $_POST['password'];

        $path = $config['DATABASE_PATH'] . 'users.db';
        $objArray = getJson($path);
        if ($objArray !== null) {
            for ($i = 0; $i < count($objArray); $i++) {
                if (
                    strtolower($objArray[$i]->email) == strtolower($emailUsername)
                    || strtolower($objArray[$i]->username) == strtolower($emailUsername)
                ) {
                    if (password_verify($loginPassword, $objArray[$i]->password)) {
                        $_GLOBAL[$objArray[$i]->id] = $objArray[$i];
                        $_SESSION['user-id-cookie'] = $objArray[$i]->id;
                        header('Location: ?page=home');
                    } else {
                        $loginPasswordErr = 'Wrong username or password!';
                    }
                } else {
                    $loginPasswordErr = 'Wrong username or password!';
                }
            }
        }
    }
    return $loginPasswordErr;
}

function getLoginStatus($loginPasswordErr)
{
    if ($loginPasswordErr == '') {
        return 'd-none';
    } else {
        return '';
    }
}

$loginPasswordErr = validateLogin($config);

$loginStatus = getLoginStatus($loginPasswordErr);