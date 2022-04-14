<?php
require_once $config['LIB_PATH'] . "user.php";
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);


    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];


    // avatar validation
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
                echo 'success ' . $fileNewName;
                $message = 'File is saved!';
            } else {
                echo 'fail ' . $fileNewName;
            }
        }
    } else {
        $message = 'No File was uploaded!';
    }

    if ($file_ok) {
        $user = new User($email, $password, $firstName, $lastName, $fileNewName);

        $file = $config['DATABASE_PATH'] . 'users.db';
        if ($out = fopen($file, 'r')) {
            $jsonSrc = json_decode(fread($out, filesize($file)));
            array_push($jsonSrc, $user->jsonSerialize());
            $strSrc = json_encode($jsonSrc);
            fclose($out);

            $in = fopen($file, 'w');
            if ($in) {
                fwrite($in, $strSrc);
            }
            fclose($in);

            header('Location: ?page=login');
        }
    }
}
