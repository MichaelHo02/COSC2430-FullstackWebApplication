<?php
    //Fetch all Photo
    $photoFile = '../photos.db';

    if (isset($_COOKIE['user-id-cookie'])) { // Logged in -> internal and public
        $photoDb = fopen($photoFile, 'r');
        $photoSrc = fread($photoDb, filesize($photoFile));
        echo $photoSrc;
        fclose($photoDb);
    } else { // Not logged in -> Only public

    }
?>