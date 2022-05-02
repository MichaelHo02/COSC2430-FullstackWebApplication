<?php
include_once $config['LIB_PATH'] . 'io.php';

$postFile = $config['DATABASE_PATH'] . 'posts.db';
$id = $_POST['id'];
$jsonRead = getJson($postFile);
for ($i = 0; $i < count($jsonRead); $i++) {
    if ($id == $jsonRead[$i]->postId) {
        unlink('./assets/img/storage/' . $jsonRead[$i]->postId . '.' . $jsonRead[$i]->postExt);
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
