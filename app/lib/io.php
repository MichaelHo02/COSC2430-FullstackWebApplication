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
