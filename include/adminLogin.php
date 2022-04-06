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
        $username = 'admin';
        $password = md5('yasuoroot');

        $emailUsername = $_POST['adminName'];
        $loginPassword = md5($_POST['adminPassword']);

        if ($loginPassword == $password) {
            setcookie('admin', $username . $password . "x" , time() + 7200,"/", "localhost");
            header('Location: ./adminDashboard.php');
        }

    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1 class="display-3 col-12 text-center">Admin</h1>

            <form class="col-lg-6 col-sm-10 mt-4" method="post" action="adminLogin.php" onsubmit="return handleLoginForm()">
                <h5 class="mt-4 mb-4 border border-danger rounded  p-3 text-danger text-center fail-auth <?php 
                    if ($loginPasswordErr == '') {
                        echo 'd-none';
                    }
                ?>">
                    <?php echo $loginPasswordErr; ?>
                </h5>

                <div class="mb-3">
                    <label for="adminName" class="form-label">Username</label>
                    <input name="adminName" type="text" class="form-control" id="adminName" >
                    <div id="loginUserFeedback" class="invalid-feedback">
                        
                    </div>
                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Password</label>
                    <input name="adminPassword" type="password" class="form-control" id="adminPassword">
                    <div id="passwordUserFeedback" class="invalid-feedback">

                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary login-submit">Login</button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>