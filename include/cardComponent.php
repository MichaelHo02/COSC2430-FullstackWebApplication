<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        require_once "./user.php";
        include_once 'sortCmp.php';
        $postFile = '../posts.db';
        $postDb = fopen($postFile, 'r');
        $postSrc = fread($postDb, filesize($postFile));
        $jsonObj = json_decode($postSrc);
        $result = array();
        usort($jsonObj, "cmpPost");

        if (isset($_COOKIE['user-id-cookie'])) { // Logged in -> internal and public
            for ($i = 0; $i < count($jsonObj); $i++) {
                if ($jsonObj[$i]->userId == $_COOKIE['user-id-cookie']) {
                    echo
                    '
                        <div class="col position-relative">
                            <div class="card h-100">
                                <button type="button" class="btn btn-danger rounded-circle position-absolute top-0 start-100 translate-middle px-2 py-1">
                                    <i class="bi bi-x"></i>
                                </button>
                                <div class="card-body">
                                    <link rel="stylesheet" href="./assets/css/myaccount.css">
                                    <div class="row px-3 align-items-center justify-content-start">
                                        <div class="col col-2 bg-info rounded-circle avatar">
                                            <img src="#" class="mx-auto d-block img-fluid" alt="avatar">
                                        </div>
                                        <div class="col col-8">
                                            <h5 class="card-title">Thach Ho</h5>
                                            <p class="card-text">
                                                <small class="text-muted">Last updated 3 mins ago</small>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row px-3 pt-2">
                                        <p class="card-text p-0">
                                            This is a wider card with supporting text below as a natural lead-in to additional
                                            content. This content is a little bit longer.
                                        </p>
                                    </div>
                                </div>
                                <img src="../assets/img/storage/'. $jsonObj[$i]->postId . '.' . $jsonObj[$i]->postExt .'" class="card-img-bottom cap" alt="Camera" />
                            </div>
                        </div>
                    ';
                }
            }
        }
        ?>
    </div>
</div>
<!-- 
                    <div class="col position-relative">
                        <div class="card h-100">
                            <button type="button" class="btn btn-danger rounded-circle position-absolute top-0 start-100 translate-middle px-2 py-1">
                                <i class="bi bi-x"></i>
                            </button>
                            <div class="card-body">
                                <link rel="stylesheet" href="./assets/css/myaccount.css">
                                <div class="row px-3 align-items-center justify-content-start">
                                    <div class="col col-2 bg-info rounded-circle avatar">
                                        <img src="./assets/img/avatar/624edb6ded866.jpg" class="mx-auto d-block img-fluid" alt="avatar">
                                    </div>
                                    <div class="col col-8">
                                        <h5 class="card-title">Thach Ho</h5>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="row px-3 pt-2">
                                    <p class="card-text p-0">
                                        This is a wider card with supporting text below as a natural lead-in to additional
                                        content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                            <img src="./assets/img/stock/noimg.jpeg" class="card-img-bottom cap" alt="Camera" />
                        </div>
                    </div>
 -->