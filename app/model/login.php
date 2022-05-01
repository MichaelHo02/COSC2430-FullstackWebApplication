<?php
require_once $config['LIB_PATH'] . "user.php";
require_once $config['LIB_PATH'] . "io.php";

function validateLogin($config)
{
    $loginPasswordErr = '';
    $email_message = '';

    if (isset($_POST['submit'])) {
        $emailUsername = $_POST['email'];
        $loginPassword = md5($_POST['password']);

        $path = $config['DATABASE_PATH'] . 'users.db';
        $objArray = getJson($path);
        if ($objArray !== null) {
            for ($i = 0; $i < count($objArray); $i++) {
                if (
                    $objArray[$i]->email == $emailUsername
                    || $objArray[$i]->username == $emailUsername
                ) {
                    if ($objArray[$i]->password == $loginPassword) {
                        $_GLOBAL[$objArray[$i]->id] = $objArray[$i];
                        setcookie('user-id-cookie', $objArray[$i]->id, time() + 7200, "/", "localhost");
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