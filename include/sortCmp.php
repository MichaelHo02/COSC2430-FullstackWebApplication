<?php
    function cmpPhoto($a, $b) {
        return strcmp($a->publishedDate, $b->publishedDate);
    }

    function cmpUser($a, $b) {
        return strcmp($a->registeredTime, $b->registeredTime);
    }
?>