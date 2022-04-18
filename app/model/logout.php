<?php
unset($_COOKIE['user-id-cookie']);
setcookie('user-id-cookie', null, -1, '/', 'localhost');
header("location: ?page=home");

if ($_COOKIE['admin']) {
    unset($_COOKIE['admin']);
    setcookie('admin', null, -1, '/', 'localhost');
    header("location: ?page=home");
}
