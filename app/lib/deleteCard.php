<?php
function getJson($name)
{
    $file = fopen($name, 'r');
    $src = fread($file, filesize($name));
    $json = json_decode($src);
    fclose($file);
    return $json;
}

$postFile = '../database/posts.db';
$id = $_POST['id'];
// echo $id;
$jsonRead = getJson($postFile);
for ($i = 0; $i < count($jsonRead); $i++) {
    if ($id == $jsonRead[$i]->postId) {
        unset($jsonRead[$i]);
        break;
    }
}
$jsonWrite = array_values($jsonRead);
$jsonWrite = json_encode($jsonWrite);
if ($in = fopen($postFile, 'w')) {
    fwrite($in, $jsonWrite);
    fclose($in);
    echo $id;
} else {
    echo '';
}
