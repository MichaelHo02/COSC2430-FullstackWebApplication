<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1nstaKilogram</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../app/assets/css/avatar.css">
    <link rel="stylesheet" href="../app/assets/css/dashboard.css">
    <link rel="stylesheet" href="../app/assets/css/gdpr.css">
</head>

<body>
    <?php
    if (!str_contains($page, 'admin')) {
        if ($_COOKIE['admin']) {
            unset($_COOKIE['admin']);
            setcookie('admin', null, -1, '/', 'localhost');
        }
    }
    if ($_COOKIE['admin'] != ('admin' . md5('yasuoroot') . 'x')) {
        require $config['MODEL_PATH'] . 'nav.php';
        require $config['VIEW_PATH'] . 'nav.php';
    } else {
        require $config['MODEL_PATH'] . 'nav_admin.php';
        require $config['VIEW_PATH'] . 'nav_admin.php';
    }
    ?>

    <main>
        <?php
        require $content;
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>