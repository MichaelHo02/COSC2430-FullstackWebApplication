<?php
require $pathPostHandler;
require $pathRenderPostFactory;
?>

<script src="/assets/js/home.js" defer></script>
<link rel="stylesheet" href="/assets/css/avatar.css">

<div class="container mt-4">
    <button class="btn btn-primary create-post-btn 
    <?php echo $btnVisibility; ?> ">Create new post</button>

    <div class="row justify-content-center mt-4 new-feed-wrapper"></div>
</div>

<?php
configComponent($postDB, $userDB, $page, 'assets/img/');
?>