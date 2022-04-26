<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0 ");
?>
<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light position-relative">
        <!-- Bug when clicking at 1nstagram at index.php -->
        <a href="<?php
                    if (str_contains($_SERVER['PHP_SELF'], 'index.php')) {
                        echo "./index.php";
                    } else {
                        echo "../index.php";
                    }
                    ?>" class="navbar-brand display-1 font-weight-bold position-absolute">
            1nstagram
        </a>
        <div class="ms-auto me-auto w-50">
            <form class="">
                <input class="form-control modal-xl" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <a class="btn <?php
                        if (isset($_COOKIE['user-id-cookie']) && str_contains($_SERVER['PHP_SELF'], 'myaccount.php')) {
                            echo 'btn-outline-danger';
                        } else {
                            echo "btn-primary";
                        }
                        ?> position-absolute end-0" href="
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

    </nav>
</header>
