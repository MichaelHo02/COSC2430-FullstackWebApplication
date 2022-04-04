<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../assets/js/login.js" defer></script>
</head>
<body>
    <?php 
        include "./navbar.php";
    ?>

    <?php 
        
        $loginPasswordErr = '';
        if (isset($_POST['submit'])) {
            $emailUsername = $_POST['email'];
            $loginPassword = $_POST['password'];
            
            $db = fopen('../accounts.db', 'r');

            if ($db) { 
                while (($line = fgets($db)) !== false) { 
                    $tempUserArray = explode(",", $line);
                    $tempUserId = $tempUserArray[0];
                    $tempUserUsername = $tempUserArray[3];
                    $tempUserEmail = $tempUserArray[2];
                    $tempUserPassword = $tempUserArray[4];
                    
                    if ($_POST['email'] == $tempUserEmail || $_POST['email'] == $tempUserUsername) {
                        if ($_POST['password'] == $tempUserPassword) {
                            setcookie('user-id-cookie', $tempUserId, time() + 7200,"/", "localhost");
                            header('Location: ../index.php');
                        } else {
                            $loginPasswordErr = 'Wrong username or password!';
                        }
                    } else {
                        $loginPasswordErr = 'Wrong username or password!';
                    }
                }
                fclose($db);
            }

            
        }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1 class="display-3 col-12 text-center">Login</h1>
            <h5 class="mt-4 border border-danger rounded col-6 p-3 text-danger text-center fail-auth <?php 
                if ($loginPasswordErr == '') {
                    echo 'd-none';
                }
            ?>">
                <?php echo $loginPasswordErr; ?>
            </h5>
            <form class="col-lg-6 col-sm-10 mt-4" method="post" action="login.php" onsubmit="return handleLoginForm()">
                <div class="mb-3">
                    <label for="loginEmailUsername" class="form-label">Email address / Username</label>
                    <input name="email" type="text" class="form-control" id="loginEmailUsername" >
                    <div id="loginUserFeedback" class="invalid-feedback">
                        
                    </div>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="loginPassword">
                    <div id="passwordUserFeedback" class="invalid-feedback">

                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMeCheck">
                    <label class="form-check-label" for="rememberMeCheck">Remember me</label>
                </div>
                <button name="submit" type="submit" class="btn btn-primary login-submit">Submit</button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>