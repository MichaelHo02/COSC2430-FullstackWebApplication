<?php
    unset($_COOKIE['user-id-cookie']);
    setcookie('user-id-cookie', null, -1, '/', 'localhost');
    header("location: ../index.php");
?>  
