<?php
    function cmpPhoto($a, $b) {
        return  $b->publishedDate - $a->publishedDate;
    }

    function cmpUser($a, $b) {
        return strcmp($a->registeredTime, $b->registeredTime);
    }
?>