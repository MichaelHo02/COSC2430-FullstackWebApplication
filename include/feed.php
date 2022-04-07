<?php
//Fetch all Post
include_once 'sortCmp.php';
$postFile = '../posts.db';
$postDb = fopen($postFile, 'r');
$postSrc = fread($postDb, filesize($postFile));
$jsonObj = json_decode($postSrc);
$result = array();
usort($jsonObj, "cmpPost");
if (isset($_COOKIE['user-id-cookie'])) { // Logged in -> internal and public
    for ($i = 0; $i < count($jsonObj); $i++) {
        if (
            $jsonObj[$i]->sharingLev == 'public' ||
            $jsonObj[$i]->sharingLev == 'internal'
        ) {
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
fclose($postDb);
