<?php
function cmpPost($a, $b)
{
    return  $b->publishedDate - $a->publishedDate;
}

function cmpUser($a, $b)
{
    return strtotime($a->registeredTime) - strtotime($b->registeredTime);
}
