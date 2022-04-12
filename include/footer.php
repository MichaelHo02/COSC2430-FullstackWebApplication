<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>

<footer class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="footer__title h1 badge bg-primary text-fluid">1nstagram.com</div>
                <div class="footer__menu">
                    <a href="#" class="menu__item">About</a>
                    <a href="#" class="menu__item">Privacy</a>
                    <a href="#" class="menu__item">Support</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center copyright__wrapper">
                <p class="copyright__content">
                    Copyright @2022 All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>