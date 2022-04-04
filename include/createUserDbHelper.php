<?php
    require_once "./user.php";
    $user = new User(
        "Truong Nhat Anh",
        "truongnhatanh@gmail.com",
        "truongnhatanh",
        "hash",
        "21-02-2022 12:34:49"
    );
    
    echo json_encode($user->jsonSerialize());
?>