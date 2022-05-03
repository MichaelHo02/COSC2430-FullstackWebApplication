<?php
require $pathPostHandler;
require $pathRenderPostFactory;
?>

<script src="/assets/js/home.js" defer></script>
<link rel="stylesheet" href="/assets/css/avatar.css">

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <div class="col w-75 ms-auto me-auto position-relative">
            <button class="btn btn-primary create-post-btn 
            <?php echo $btnVisibility;
            echo $btnValidations; ?>"><i class=" bi bi-plus-lg"></i> Create new post</button>
        </div>

    </div>

    <div class="row justify-content-center mt-4 new-feed-wrapper"></div>
</div>

<?php
configComponent($postDB, $userDB, $page, './assets/img/');
?>