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
    <link rel="stylesheet" href="../assets/css/myaccount.css">
    <script src="../assets/js/gdpr.js" defer></script>
    <!-- <script src="../assets/js/renderMyAcc.js" defer></script> -->
</head>

<body>
    <?php
    include "./navbar.php";
    ?>

    <main>
        <!-- Idea: Show avatar, name, email, all posts, logout at the end -->
        <?php
        require_once "./user.php";

        if (isset($_FILES['formFile'])) {
            $avatar = $_FILES['formFile'];
            $file_ok = true;
            $extension = ['jpg', 'jpeg', 'png', 'gif'];
            $file_ext = strtolower(end(explode('.', $avatar['name'])));
            if (in_array($file_ext, $extension) === false) {
                $file_ok = false;
                $message = 'Wrong file extension! Only JPG, JPEG, PNG, and GIF';
            }
            if ($avatar['size'] > 20000000) {
                $file_ok = false;
                $message = 'File size is greater than 20MB';
            }
            if ($file_ok) {
                $fileNewName = uniqid() . '.' . $file_ext;
                $fileFullName = '../assets/img/avatar/' . $fileNewName;
                if (move_uploaded_file($avatar['tmp_name'], $fileFullName)) {
                    // echo 'success ' . $fileNewName;
                    $message = 'File is saved!';
                } else {
                    echo 'fail ' . $fileNewName;
                }
            }

            if ($file_ok) {
                $db = fopen('../accounts.db', 'r');
                if ($db) {
                    $rawContent = fread($db, filesize("../accounts.db"));
                    $objArray = json_decode($rawContent);
                    for ($i = 0; $i < count($objArray); $i++) {
                        if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                            $objArray[$i]->avatar = $fileNewName;
                            break;
                        }
                    }
                    $strSrc = json_encode($objArray);
                    fclose($db);

                    $in = fopen('../accounts.db', 'w');
                    if ($in) {
                        fwrite($in, $strSrc);
                    }
                    fclose($in);
                }
            }
        }

        if (isset($_COOKIE['user-id-cookie'])) {
            $db = fopen('../accounts.db', 'r');
            $user;

            if ($db) {
                $rawContent = fread($db, filesize("../accounts.db"));
                $objArray = json_decode($rawContent);

                for ($i = 0; $i < count($objArray); $i++) {
                    if ($objArray[$i]->id == $_COOKIE['user-id-cookie']) {
                        $avatar = '../assets/img/avatar/' . $objArray[$i]->avatar;
                        $email = $objArray[$i]->email;
                        $firstName = $objArray[$i]->firstName;
                        $lastName = $objArray[$i]->lastName;
                        $username = $objArray[$i]->username;
                        $registeredTime = $objArray[$i]->registeredTime;
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
                    <div class="bg-info rounded-circle w-75 avatar mx-auto">
                        <img src="<?php echo $avatar; ?>" class=" mx-auto d-block img-fluid" alt="avatar">
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12 ">
                    <h1 class="display-4 text-lg-start text-md-start text-center">
                        <?php
                        echo "@" . $username;
                        ?>
                    </h1>
                    <div class="row mt-lg-3 mt-md-0 mt-0">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <p for="" class="">Email: <span class=""><?php echo $email; ?></span></p>

                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <p for="" class="">Registered on: <span class="">
                                    <?php
                                    echo $registeredTime;
                                    ?>
                                </span></p>

                        </div>
                    </div>
                    <div class="row mt-lg-3 mt-md-0 mt-0">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <p for="" class="">First name: <span class=""><?php echo $firstName; ?></span> </p>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                            <p for="" class="">Last name: <span class=""><?php echo $lastName; ?></span></p>

                        </div>
                    </div>
                    <div class="row mt-lg-3 mt-md-0 mt-0">
                        <div class="d-grid gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                Change Avatar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Change Avatar</h5>
                                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                                            </button>
                                        </div>
                                        <form action="myaccount.php" name="form" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Profile picture</label>
                                                    <input class="form-control <?php
                                                                                if (isset($_FILES['formFile'])) {
                                                                                    if ($file_ok) {
                                                                                        echo 'is-valid';
                                                                                    } else {
                                                                                        echo 'is-invalid';
                                                                                    }
                                                                                }
                                                                                ?>" type="file" id="formFile" name="formFile">
                                                    <div id="" class="<?php
                                                                        if (isset($_FILES['formFile'])) {
                                                                            if ($file_ok) {
                                                                                echo 'valid-feedback';
                                                                            } else {
                                                                                echo 'invalid-feedback';
                                                                            }
                                                                        }
                                                                        ?>">
                                                        <?php
                                                        echo $message;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include './cardComponent.php';
        include_once './sortCmp.php';
        // if (isset($_POST)) {
        //     deleteCard('../posts.db', $_POST);
        // }
        ?>
        <?php
        configComponent('../posts.db', '../accounts.db', $_SERVER['PHP_SELF'], '../assets/img/');
        ?>
    </main>

    <footer>

    </footer>
    <?php
    include "./include/gdpr.php"
    ?>
    <script src="../assets/js/deleteCard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>