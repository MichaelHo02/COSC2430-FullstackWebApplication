<?php
    //Fetch all Photo
    include_once 'sortCmp.php';
    $photoFile = '../photos.db';
    $photoDb = fopen($photoFile, 'r');
    $photoSrc = fread($photoDb, filesize($photoFile));
    $jsonObj = json_decode($photoSrc);
    $result = array();
    usort($jsonObj, "cmpPhoto");

    if (isset($_COOKIE['user-id-cookie'])) { // Logged in -> internal and public
        for ($i = 0; $i < count($jsonObj); $i++) {
            if ($jsonObj[$i]->sharingLev == 'public' || $jsonObj[$i]->sharingLev == 'internal') {
                $result[] = $jsonObj[$i];
            }
        }
    } else { // Not logged in -> Only public
        for ($i = 0; $i < count($jsonObj); $i++) {
            if ($jsonObj[$i]->sharingLev == 'public') {
                $result[] = $jsonObj[$i];
            }
        }
    }
    echo json_encode($result);
    fclose($photoDb);
    
?>