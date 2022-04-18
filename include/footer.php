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
        <div class="row justify-content-between">
            <div class="col-md-7 text-center">
                <!-- <div class="col-lg-12 footer__title h1 ">1nstagram.com</div> -->
                <div class="footer__menu col-lg-12">
                    <a href="<?php echo "./include/about.php"; ?>" class="menu__item"><span>About</span></a>
                    <a href="<?php echo "./include/privacy.php"; ?>" class="menu__item"><span>Privacy</span></a>
                    <a href="<?php echo "./include/help.php"; ?>" class="menu__item"><span>Support</span></a>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <?php
                if (isset($_COOKIE['user-id-cookie'])) {
                    $db = fopen('../accounts.db', 'r');

                    if ($db) {
                        $rawContent = fread($db, filesize("../accounts.db"));
                        $objArray = json_decode($rawContent);
                        for ($i = 0; $i < count($objArray); $i++) {
                            if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                                $avatar = '../assets/img/avatar/' . $objArray[$i]->avatar;
                                $username = $objArray[$i]->username;
                            }
                        }
                    }
                    echo '
                        <div class="user__card">
                            <img src="' . $avatar . '" alt="" class="user__card-image">
                            <div class="user__card-name">' . $username . '</div>
                        </div>
                    ';
                } else echo '
                        <div class = "footer__user-title h1">Join us now</div>
                ';
                ?>
                <!-- <div class="user__card">
                    <img src="https://picsum.photos/id/1025/4951/3301" alt="" class="user__card-image">
                    <div class="user__card-name h3">tamwilltry</div>
                </div> -->
                <a class="btn <?php
                                if (isset($_COOKIE['user-id-cookie']) && str_contains($_SERVER['PHP_SELF'], 'myaccount.php')) {
                                    echo 'btn-outline-danger';
                                } else {
                                    echo "btn btn-primary";
                                }
                                ?>" href="
                                <?php
                                if (isset($_COOKIE['user-id-cookie']) && str_contains($_SERVER['PHP_SELF'], 'index.php')) {
                                    echo "./include/myaccount.php";
                                } else if (isset($_COOKIE['user-id-cookie']) && str_contains($_SERVER['PHP_SELF'], 'myaccount.php')) {
                                    echo './logout.php';
                                } else if (isset($_COOKIE['user-id-cookie']) && !str_contains($_SERVER['PHP_SELF'], 'index.php')) {
                                    echo "./myaccount.php";
                                } else {
                                    if (str_contains($_SERVER['PHP_SELF'], 'index.php')) {
                                        echo "./include/login.php";
                                    } else {
                                        echo "./login.php";
                                    }
                                }
                                ?>">
                    <?php
                    if (isset($_COOKIE['user-id-cookie'])) {
                        $path = strtolower(end(explode('/', $_SERVER['PHP_SELF'])));
                        if ($path === 'myaccount.php') {
                            echo 'Log out';
                        } else {
                            echo "My account";
                        }
                    } else {
                        echo "Login";
                    }
                    ?>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center copyright__wrapper">
                <p class="copyright__content">
                    Copyright @2022 All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>