<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="<?php echo $navBrandLink; ?>" class="navbar-brand mx-0 px-0 display-1 font-weight-bold col-4">
            1nstaKilogram
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-8" id="navbarSupportedContent">
            <div class="py-2 col-lg-6">
                <input class="form-control modal-xl w-100 search-user-input" type="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-lg-6 col-12 text-lg-end">
                <a class="btn <?php echo $btnClass; ?> d-lg-inline-block d-grid" href="<?php echo $btnLink; ?>">
                    <?php echo $btnInnerText; ?>
                </a>
            </div>
        </div>
    </nav>
</header>