<?php
function isValidFile($config)
{
    $avatar = $_FILES['formFile'];
    $file_ok = true;
    $extension = ['jpg', 'jpeg', 'png', 'gif'];
    $explore = explode('.', $avatar['name']);
    $file_ext = strtolower(end($explore));
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
        $fileFullName = $config['IMG_PATH'] . 'avatar/' . $fileNewName;
        if (move_uploaded_file($avatar['tmp_name'], $fileFullName)) {
            $message = 'File is saved!';
        } else {
            echo 'fail ' . $fileNewName;
            $message = 'File is not saved!';
        }
    }
    return [$file_ok, $message, $fileNewName ?? ''];
}

function isValidEmail($config, $emailInput)
{
    $email_ok = true;
    $path = $config['DATABASE_PATH'] . 'users.db';
    $message_email = 'Email is saved';
    $objArray = getJson($path);
    if ($objArray !== null) {
        for ($i = 0; $i < count($objArray); $i++) {
            if (strtolower($objArray[$i]->email) == strtolower($emailInput)) {
                $email_ok = false;
                $message_email = 'This email has been used before !';
                break;
            }
        }
    }
    return [$email_ok, $message_email];
}
