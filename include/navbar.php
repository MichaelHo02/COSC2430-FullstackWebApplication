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
        <a class="btn btn-primary position-absolute end-0" href="
        <?php 
            if (str_contains($_SERVER['PHP_SELF'], 'index.php')) {
                echo "./include/login.php";
            } else {
                echo "./login.php";
            }
        ?>" >Login</a>

    </nav>
</header>