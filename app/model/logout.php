<?php
unset($_SESSION['user-id-cookie']);

header("location: ?page=home");

if ($_SESSION['admin']) {
    unset($_SESSION['admin']);
    header("location: ?page=home");
}
