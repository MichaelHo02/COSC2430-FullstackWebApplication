<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light position-relative">
        <a href="<?php echo $navBrandLink; ?>" class="navbar-brand display-1 font-weight-bold position-absolute">
            Dashboard
        </a>
        <div class="ms-auto me-auto w-50">
            <form class="">
                <input class="form-control modal-xl" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <a class="btn <?php echo $btnClass; ?> position-absolute end-0" href=" <?php echo $btnLink; ?>">
            <?php echo $btnInnerText; ?>
        </a>
    </nav>
</header>