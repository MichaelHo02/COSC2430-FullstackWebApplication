<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/gdpr.css">
    <script src="../assets/js/gdpr.js" defer></script>
</head>
<body>
    <?php
        include "./navbar.php";
    ?>

    <main>
        <!-- Idea: Show avatar, name, email, all photos, logout at the end -->
        <?php 
            require_once "./user.php";
            $db = fopen('../accounts.db', 'r');
            $user;

            if ($db) {
                $rawContent = fread($db, filesize("../accounts.db"));
                $objArray = json_decode($rawContent);

                for ($i = 0; $i < count($objArray); $i++) {
                    if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                        $user = new User(
            
                            $objArray[$i]->email,
                            "hidden",
                            "test",
                            "fuck you"
                        );
                        break;
                    }
                }
                fclose($db);
            }
        ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="display-1"><?php echo $user->getName(); ?></h1>
                    <h1 class="display-2"><?php echo "@" . $user->getEmail(); ?></h1>
                </div>
            </div>
            <form action="./logout.php" method="post">
                <button class="btn btn-outline-danger">Log out</button>
            </form>
        </div>

    </main>

    <footer>

    </footer>
    <?php
            include "./include/gdpr.php"
    ?>
</body>
</html>