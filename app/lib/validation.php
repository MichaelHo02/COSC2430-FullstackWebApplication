<?php
function isValidFile($config, $key, $path)
{
    $avatar = $_FILES[$key];
    $file_ok = true;
    $extension = ['jpg', 'jpeg', 'png', 'gif'];
    $explore = explode('.', $avatar['name']);
    $fileExt    = strtolower(end($explore));
    if ($avatar['error']) {
        return [false, 'File size is greater than expected!', ''];
    }
    if (in_array($fileExt  , $extension) === false) {
        $file_ok = false;
        $message = 'Wrong file extension! Only JPG, JPEG, PNG, and GIF';
    }
    if ($avatar['size'] > 20000000) {
        $file_ok = false;
        $message = 'File size is greater than 20MB';
    }
    if ($file_ok) {
        $fileNewName = 'img_' . uniqid();
        $fileFullName = $config['IMG_PATH'] . $path . $fileNewName . '.' . $fileExt;
        if (move_uploaded_file($avatar['tmp_name'], $fileFullName)) {
            $message = '';
        } else {
            echo 'fail ' . $fileNewName;
            $message = 'File is not saved!';
        }
    }
    return [$file_ok, $message, $fileNewName ?? '', $fileExt ?? ''];
}

function isValidEmail($config, $emailInput)
{
    $email_ok = true;
    $path = $config['DATABASE_PATH'] . 'users.db';
    $message_email = '';
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

function isValidBtnCSS($isValid)
{
    if ($isValid) {
        return '';
    } else {
        return 'is-invalid btn-danger';
    }
}

function isValidCSS($isValid)
{
    if ($isValid) {
        return '';
    } else {
        return 'is-invalid';
    }
}

function isValidMessageCSS($isValid)
{
    if ($isValid) {
        return '';
    } else {
        return 'invalid-feedback';
    }
}
