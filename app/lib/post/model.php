<?php

include $config['LIB_PATH'] . "post.php";

$file_name = $_FILES['uploadImg']['name'];
$file_size = $_FILES['uploadImg']['size'];
$file_tmp = $_FILES['uploadImg']['tmp_name'];
$file_type = $_FILES['uploadImg']['type'];
$file_ext = strtolower(end(explode('.', $_FILES['uploadImg']['name'])));
$extensions = array("jpeg", "jpg", "png");
$file_ok = true;

if (isset($_POST["submit"])) {
    if (in_array($file_ext, $extensions) === false) { // Check extensions
        $file_ok = false;
    }

    if ($file_size > 20000000) { // > 20mb
        $file_ok = false;
    }

    if ($file_ok) {
        // Create new post obj
        $post = new Post(
            $_COOKIE['user-id-cookie'],
            $_POST['postDesc'],
            $_POST['sharingLev'],
            $file_ext
        );

        // Add img to user
        $currentUserId = $_COOKIE['user-id-cookie'];
        $userFile = $config['DATABASE_PATH'] . 'users.db';
        $userDb = fopen($userFile, 'r');
        $jsonUserSrc = json_decode(fread($userDb, filesize($userFile)));
        $jsonUserSrcLength = count($jsonUserSrc);
        $strJsonUser = "";

        for ($i = 0; $i < $jsonUserSrcLength; $i++) {
            if ($jsonUserSrc[$i]->id == $currentUserId) {
                // array_push($jsonUserSrc[$i]->postIdList, $post->getPostId());
                $strJsonUser = json_encode($jsonUserSrc);
                break;
            }
        }
        fclose($userDb);

        // Write to db
        $userDb = fopen($userFile, 'w');
        fwrite($userDb, $strJsonUser);
        fclose($userDb);

        // Add img to db
        $postFile =  $config['DATABASE_PATH'] . 'posts.db';
        $postDb = fopen($postFile, 'r');
        $jsonPostSrc = json_decode(fread($postDb, filesize($postFile)));
        array_push($jsonPostSrc, $post->jsonSerialize());
        fclose($postDb);

        $postDb = fopen($postFile, 'w');
        fwrite($postDb, json_encode($jsonPostSrc));
        fclose($postDb);

        // Move img to storage
        move_uploaded_file($file_tmp, $config['DATABASE_PATH'] . "img/storage/" . $post->getPostId() . "." . $file_ext);
        header('location: ?page=home');
    }
}
