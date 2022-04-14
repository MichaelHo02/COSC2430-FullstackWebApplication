<!-- Idea: Show avatar, name, email, all posts, logout at the end -->
<?php
if (isset($_FILES['formFile'])) {
    $avatar = $_FILES['formFile'];
    $file_ok = true;
    $extension = ['jpg', 'jpeg', 'png', 'gif'];
    $file_ext = strtolower(end(explode('.', $avatar['name'])));
    if (in_array($file_ext, $extension) === false) {
        $file_ok = false;
        $message = 'Wrong file extension! Only JPG, JPEG, PNG, and GIF';
    }
    if ($avatar['size'] > 20000000) {
        $file_ok = false;
        $message = 'File size is greater than 20MB';
    }
    if ($file_ok) {
        $fileNewName = uniqid() . '.' . $file_ext;
        $fileFullName = $config['DATABASE_PATH'] . 'img/avatar/' . $fileNewName;
        if (move_uploaded_file($avatar['tmp_name'], $fileFullName)) {
            // echo 'success ' . $fileNewName;
            $message = 'File is saved!';
        } else {
            echo 'fail ' . $fileNewName;
        }
    }

    if ($file_ok) {
        $file = $config['DATABASE_PATH'] . 'users.db';

        $db = fopen($file, 'r');
        if ($db) {
            $rawContent = fread($db, filesize($file));
            $objArray = json_decode($rawContent);
            for ($i = 0; $i < count($objArray); $i++) {
                if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                    $objArray[$i]->avatar = $fileNewName;
                    break;
                }
            }
            $strSrc = json_encode($objArray);
            fclose($db);

            $in = fopen($file, 'w');
            if ($in) {
                fwrite($in, $strSrc);
            }
            fclose($in);
        }
    }
}

$file = $config['DATABASE_PATH'] . 'users.db';

if (isset($_COOKIE['user-id-cookie'])) {
    $db = fopen($file, 'r');
    $user;

    if ($db) {
        $rawContent = fread($db, filesize($file));
        $objArray = json_decode($rawContent);

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
        fclose($db);
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

include $config['LIB_PATH'] . 'card' . DS . 'model.php';
include_once $config['LIB_PATH'] . 'sortCmp.php';

$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
?>