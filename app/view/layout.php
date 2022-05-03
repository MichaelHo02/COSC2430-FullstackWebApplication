<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1nstaKilogram</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/avatar.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <script src="assets/js/deleteCard.js" defer></script>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <?php
        if (!str_contains($page, 'admin') && !str_contains($page, 'my_account')) {
            if ($_COOKIE['admin'] ?? null) {
                unset($_COOKIE['admin']);
                setcookie('admin');
            }
        }
        if ($_COOKIE['admin'] ?? null == ('admin' . md5('yasuoroot') . 'x')) {
            require $config['MODEL_PATH'] . 'nav_admin.php';
            require $config['VIEW_PATH'] . 'nav_admin.php';
        } else {
            require $config['MODEL_PATH'] . 'nav.php';
            require $config['VIEW_PATH'] . 'nav.php';
        }
        ?>
        <main class="flex-grow-1">
            <?php
            require $content;
            ?>
        </main>

        <?php
        require $config['VIEW_PATH'] . 'footer.php';
        ?>
    </div>
    <?php
    if (!str_contains($page, 'admin')) {
        require $config['VIEW_PATH'] . 'gdpr.php';
        echo '<link rel="stylesheet" href="/assets/css/gdpr.css">';
        echo '<script src="assets/js/gdpr.js" defer></script>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


<script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
</script>

</html>