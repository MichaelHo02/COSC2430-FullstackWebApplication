<?php
if ($_COOKIE['admin'] != ('admin' . md5('yasuoroot') . 'x')) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <script src="../assets/js/dashboard.js" defer></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Dashboard</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search user" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10 col-sm-12 mt-4">
                    <h2>User list</h2>
                    <ul class="list-group user-list">
                        <li class="list-group-item"><span class="pe-1 border-end">user_624d5f75c50cb</span> test@gmail.com</li>


                    </ul>
                </div>
                <div aria-label="Page navigation" class="d-flex mt-2 mb-3 justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>