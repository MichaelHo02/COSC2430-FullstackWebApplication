<?php
    function cmpPost($a, $b) {
        return  $b->publishedDate - $a->publishedDate;
    }

    function cmpUser($a, $b) {
        return $b->registeredTime - $a->registeredTime;
    }
?>