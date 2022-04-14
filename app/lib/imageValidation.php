<?php
function isValidFile($config)
{
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
            $message = 'File is not saved!';
        }
    }

    return [$file_ok, $message, $fileNewName];
}
