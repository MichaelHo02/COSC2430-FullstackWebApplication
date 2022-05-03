<?php
unset($_COOKIE['user-id-cookie']);
setcookie('user-id-cookie');
header("location: ?page=home");

if ($_COOKIE['admin']) {
    unset($_COOKIE['admin']);
    setcookie('admin');
    header("location: ?page=home");
}
