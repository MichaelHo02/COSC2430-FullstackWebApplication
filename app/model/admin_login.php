<?php
if (isset($_POST['submit'])) {
    $username = 'admin';
    $password = md5('yasuoroot');

    $emailUsername = $_POST['adminName'];
    $loginPassword = md5($_POST['adminPassword']);

    if ($loginPassword == $password) {
        setcookie('admin', $username . $password . "x", time() + 7200, "/", "localhost");
        header('Location: ?page=admin');
    } else {
        $loginPasswordErr = 'Wrong username or password!';
    }

}

if ($loginPasswordErr == '') {
    if ($loginPasswordErr == '') {
        $loginStatus = 'd-none';
    } else {
        $loginStatus = '';
    }
}