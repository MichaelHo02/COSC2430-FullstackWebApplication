<?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        setcookie("user-cookie",$_POST['email'], time() + 7200, "/", "localhost");
        header('Location: ../index.php');
    }

?>