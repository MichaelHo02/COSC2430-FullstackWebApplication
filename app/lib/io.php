<?php
function getJson($filePath)
{
    clearstatcache();
    $db = fopen($filePath, "r");
    if ($db) {
        $rawContent = fread($db, filesize($filePath));
        fclose($db);
        return json_decode($rawContent);
    }
    return null;
}

function setJson($file, $json)
{
    $in = fopen($file, 'w');
    if ($in) {
        fwrite($in, $json);
        fclose($in);
    }
}
