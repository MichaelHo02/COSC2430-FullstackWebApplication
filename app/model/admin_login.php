<?php
if (isset($_SESSION['user-id-cookie'])) {
    unset($_SESSION['user-id-cookie']);
}

$loginPasswordErr = '';

if (isset($_POST['submit'])) {
    $username = 'admin';
    $password = md5('yasuoroot');

    $emailUsername = $_POST['adminName'];
    $loginPassword = md5($_POST['adminPassword']);

    if ($loginPassword == $password) {
        $_SESSION['admin'] = 'admin' . md5('yasuoroot') . 'x'   ; 
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
