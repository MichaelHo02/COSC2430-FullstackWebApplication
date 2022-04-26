<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    include "./navbar.php"
    ?>

    <?php
    require_once "./user.php";
    require_once "../app/lib/io.php";
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);


        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        // email validation
        if(isset($_POST['email'])){
            $email_ok = true;
            // $path = '../app/database/users.db';
            $path = '../accounts.db';
            $message_email = 'Email is saved';
            $objArray = getJson($path);
            if ($objArray !== null) {
                for ($i = 0; $i < count($objArray); $i++) {
                    if (strcmp($objArray[$i]->email, $email) == 0) {
                        $email_ok = false;
                        $message_email = 'This email has been used before !';
                        break;
                    }
                }
            }
        }
        $message_email = 'Enter valid email !';
        

        // avatar validation
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
                    echo 'success ' . $fileNewName;
                    $message = 'File is saved!';
                } else {
                    echo 'fail ' . $fileNewName;
                }
            }
        }
        $message = 'No File was uploaded!';

        if ($file_ok && $email_ok) {
            $user = new User($email, $password, $firstName, $lastName, $fileNewName);

            $file = '../accounts.db';
            if ($out = fopen($file, 'r')) {
                $jsonSrc = json_decode(fread($out, filesize($file)));
                array_push($jsonSrc, $user->jsonSerialize());
                $strSrc = json_encode($jsonSrc);
                fclose($out);

                $in = fopen($file, 'w');
                if ($in) {
                    fwrite($in, $strSrc);
                }
                fclose($in);

                header('Location: ./login.php');
            }
        }
    }
    ?>

    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <h1 class="display-3 col-12 text-center">Sign Up</h1>
            <form name="form" class="col-lg-6 col-sm-10 mt-4 form" method="post" action="signup.php"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control <?php ?>" id="email" autocomplete="off">
                    <div id="emailFeedback" class="<?php
                                                        if ($email) {
                                                            if ($email_ok) {
                                                                echo 'valid-feedback';
                                                            } else {
                                                                echo 'invalid-feedback';
                                                            }
                                                        } 
                                                    ?>">
                    <?php echo $message_email ?></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">Password must be from 8 to 20 characters</li>
                        <li class="list-group-item">Password must contain at least 1 lower case letter</li>
                        <li class="list-group-item">Password must contain at least 1 upper case letter</li>
                        <li class="list-group-item">Password must contain at least 1 digit</li>
                        <li class="list-group-item">Password requires to have no space</li>
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="retypePassword" class="form-label">Retype Password</label>
                    <input name="retypePassword" type="password" class="form-control" id="retypePassword">
                    <div id="retypePasswordFeedback" class=""></div>
                </div>

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
                        // echo $message;
                        ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="firstName" class="form-label">First name</label>
                    <input name="firstName" type="text" class="form-control" id="firstName">
                    <div id="firstNameFeedback" class=""></div>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last name</label>
                    <input name="lastName" type="text" class="form-control" id="lastName">
                    <div id="lastNameFeedback" class=""></div>
                </div>

                <input type="reset" onclick='Reset();' value="Reset" class="btn btn-secondary" id="reset">
                <input name="submit" type="submit" value="Register" class="btn btn-primary" id="submit" disabled>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../assets/js/form.js"></script>
    </script>
</body>

</html>