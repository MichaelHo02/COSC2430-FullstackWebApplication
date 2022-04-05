<?php

    include "./photo.php";

    $file_name = $_FILES['uploadImg']['name'];
    $file_size =$_FILES['uploadImg']['size'];
    $file_tmp =$_FILES['uploadImg']['tmp_name'];
    $file_type=$_FILES['uploadImg']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['uploadImg']['name'])));
    $extensions= array("jpeg","jpg","png");
    $file_ok = true;

    if(isset($_POST["submit"])) {
        if (in_array($file_ext,$extensions) === false){ // Check extensions
            $file_ok = false;
        } 

        if ($file_size > 20000000) { // > 20mb
            $file_ok = false;
        }

        // print_r($_POST);


        if ($file_ok) {
            // Create new photo obj
            $photo = new Photo(
                $_COOKIE['user-id-cookie'],
                $_POST['photoDesc'],
                $_POST['sharingLev'],
                $file_ext
            );

            // Add img to user
            $currentUserId = $_COOKIE['user-id-cookie'];
            $userFile = '../accounts.db';
            $userDb = fopen($userFile, 'r');
            $jsonUserSrc = json_decode(fread($userDb, filesize($userFile)));
            $jsonUserSrcLength = count($jsonUserSrc);
            $strJsonUser = "";
        
            for ($i = 0; $i < $jsonUserSrcLength; $i++) {
                if ($jsonUserSrc[$i]->id == $currentUserId) {
                    array_push($jsonUserSrc[$i]->photoIdList, $photo->getPhotoId());
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
            $photoFile = '../photos.db';
            $photoDb = fopen($photoFile, 'r');
            $jsonPhotoSrc = json_decode(fread($photoDb, filesize($photoFile)));
            array_push($jsonPhotoSrc, $photo->jsonSerialize());
            fclose($photoDb);

            $photoDb = fopen($photoFile, 'w');
            fwrite($photoDb, json_encode($jsonPhotoSrc));
            fclose($photoDb);

            // Move img to storage
            move_uploaded_file($file_tmp, "../assets/img/storage/" . $photo->getPhotoId() . "." . $file_ext);
            header('location: ../index.php');
        }
    }
?>