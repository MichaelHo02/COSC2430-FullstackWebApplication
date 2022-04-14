<?php
function getJson($filePath)
{
    if ($db = fopen($filePath, 'r')) {
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
    }
    fclose($in);
}
