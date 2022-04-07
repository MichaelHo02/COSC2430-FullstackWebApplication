<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1nstagram</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/gdpr.css">
    <script src="./assets/js/gdpr.js" defer></script>
    <script src="./assets/js/index.js" defer></script>
    <script src="./assets/js/render.js" defer></script>
</head>

<body>
        <?php
            include "./include/navbar.php";
        ?>

    <main>

        <?php
            include "./include/postFactory.php";
        ?>


        <div class="container mt-4">
            <button class="btn btn-primary create-post-btn 
            <?php 
                if (isset($_COOKIE['user-id-cookie'])) {
                    echo "";
                } else {
                    echo "d-none";
                }
            ?> ">Create new post</button>

            <div class="row justify-content-center mt-4 new-feed-wrapper">
                <?php
                ?>
            </div>
        </div>

        <?php
            include './include/cardComponent.php';
        ?>
    </main>
    <footer>
    </footer>
        <?php
            include "./include/gdpr.php"
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>