<?php
require $pathPostHandler;
require $pathRenderPostFactory;
?>

<script src="../app/assets/js/home.js" defer></script>
<script src="../app/assets/js/deleteCard.js" defer></script>
<link rel="stylesheet" href="../app/assets/css/avatar.css">

<div class="container mt-4">
    <button class="btn btn-primary create-post-btn 
    <?php echo $btnVisibility; ?> ">Create new post</button>

    <div class="row justify-content-center mt-4 new-feed-wrapper"></div>
</div>

<?php
configComponent($postDB, $userDB, $page, '../app/database/img/');
?>