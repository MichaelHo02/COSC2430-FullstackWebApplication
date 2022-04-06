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
        // echo $_SERVER["HTTP_REFERER"];
        // header('Location: ' . $_SERVER["HTTP_REFERER"]);
        if (isset($_COOKIE['user-id-cookie'])) {
            $db = fopen('../accounts.db', 'r');
            $user;

            if ($db) {
                $rawContent = fread($db, filesize("../accounts.db"));
                $objArray = json_decode($rawContent);

                for ($i = 0; $i < count($objArray); $i++) {
                    if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                        $firstName = $objArray[$i]->firstName;
                        $lastName = $objArray[$i]->lastName;
                        $user = new User(
                            $objArray[$i]->email,
                            "hidden",
                            $firstName,
                            $lastName,
                            $objArray[$i]->avatar
                        );
                        break;
                    }
                }
                fclose($db);
            }
        }
        ?>

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="<?php echo $user->getAvatar(); ?>" class="rounded-circle mx-auto d-block" alt="avatar" width="80%">
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12 ">
                    <h1 class="display-4 text-lg-start text-md-start text-center">username</h1>
                    <div class="row mt-lg-3 mt-md-0 mt-0">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <label for="" class="form-label fs-3">Email: </label>
                            <span class=" fs-3"><?php echo $user->getEmail(); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <label for="" class="form-label fs-3">Registered time: </label>
                            <span class="fs-3 text-muted">07/04/2002</span>
                        </div>
                    </div>
                    <div class="row mt-lg-3 mt-md-0 mt-0">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <label for="" class="form-label fs-3">First name: </label>
                            <span class=" fs-3"><?php echo $user->getFirstName(); ?></span>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <label for="" class="form-label fs-3">Last name: </label>
                            <span class="fs-3"><?php echo $user->getLastName(); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>
    <?php
    include "./include/gdpr.php"
    ?>
</body>

</html>