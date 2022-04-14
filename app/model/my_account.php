<?php
require_once $config['LIB_PATH'] . "io.php";
require_once $config['LIB_PATH'] . "imageValidation.php";

if (isset($_FILES['formFile'])) {
    $result = isValidFile($config);
    $file_ok = $result[0];
    $message = $result[1];
    $fileNewName = $result[2];

    if ($file_ok) {
        $file = $config['DATABASE_PATH'] . 'users.db';
        $objArray = getJson($file);
        if ($objArray !== null) {
            for ($i = 0; $i < count($objArray); $i++) {
                if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                    $objArray[$i]->avatar = $fileNewName;
                    break;
                }
            }
            $strSrc = json_encode($objArray);
            setJson($file, $strSrc);
        }
    }
}

$file = $config['DATABASE_PATH'] . 'users.db';

if (isset($_COOKIE['user-id-cookie'])) {
    $objArray = getJson($file);

    if ($objArray !== null) {
        for ($i = 0; $i < count($objArray); $i++) {
            if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                $avatar = '../app/database/img/avatar/' . $objArray[$i]->avatar;
                $email = $objArray[$i]->email;
                $firstName = $objArray[$i]->firstName;
                $lastName = $objArray[$i]->lastName;
                $username = "@" . $objArray[$i]->username;
                $registeredTime = $objArray[$i]->registeredTime;
                break;
            }
        }
    }
}

function isValidAvatarBtn($file_ok)
{
    if (isset($_FILES['formFile'])) {
        if ($file_ok) {
            return 'is-valid btn-success';
        } else {
            return 'is-invalid btn-danger';
        }
    } else {
        return '';
    }
}

function isValidAvatarMessage($file_ok)
{
    if (isset($_FILES['formFile'])) {
        if ($file_ok) {
            return 'valid-feedback';
        } else {
            return 'invalid-feedback';
        }
    }
    return '';
}

$avtBtn = isValidAvatarBtn($file_ok);
$messageClass = isValidAvatarMessage($file_ok);

function isValidAvatarInput($file_ok)
{
    if (isset($_FILES['formFile'])) {
        if ($file_ok) {
            return 'is-valid';
        } else {
            return 'is-invalid';
        }
    }
    return '';
}
$inputAvt = isValidAvatarInput($file_ok);

include_once $config['LIB_PATH'] . 'card' . DS . 'model.php';
include_once $config['LIB_PATH'] . 'sortCmp.php';

$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
