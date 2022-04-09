<link rel="stylesheet" href="./assets/css/myaccount.css">

<?php
function renderCard($avatar, $username, $lastUpdate, $content, $image, $sharingLev)
{
    echo '
        <div class="col position-relative">
            <div class="card h-100">
                <button type="button" class="btn btn-danger rounded-circle position-absolute top-0 start-100 translate-middle px-2 py-1">
                    <i class="bi bi-x"></i>
                </button>
                <div class="card-body">
                    <div class="row px-3 align-items-center justify-content-start">
                        <div class="col col-2 bg-info rounded-circle avatar">
                            <img src="' . $avatar . '" class="mx-auto d-block img-fluid" alt="avatar">
                        </div>
                        <div class="col col-8">
                            <h5 class="card-title">' . $username . '</h5>
                            <p class="card-text">
                                <small class="text-muted">Last updated ' . $lastUpdate . ' ago</small>
                                <small class="text-muted"> | ' . $sharingLev . '</small>
                            </p>
                        </div>
                    </div>
                    <div class="row px-3 pt-2">
                        <p class="card-text p-0">' . $content . '</p>
                    </div>
                </div>
                <img src="' . $image . '" class="card-img-bottom cap" alt="Post Image" />
            </div>
        </div>
        ';
}

function getUser($id, $userJson) {
    for ($i = 0; $i < count($userJson); $i++) {
        if ($userJson[$i]->id == $id) {
            return $userJson[$i];
        }
    }
}

function configCard($post, $userJson, $pathToImage)
{
    $user = getUser($post->userId, $userJson);
    $avatar = $pathToImage . 'avatar/' . $user->avatar;
    $username = $user->username;
    $lastUpdate = $post->lastUpdate;
    $content = $post->postDesc;
    $image = $pathToImage . 'storage/' . $post->postId . '.' . $post->postExt;
    $sharingLev = $post->sharingLev;
    renderCard($avatar, $username, $lastUpdate, $content, $image, $sharingLev);
}

function isValidPostForUser($sharingLev)
{
    return $sharingLev == 'public' || $sharingLev == 'internal';
}

function isValidPostForGuest($sharingLev)
{
    return $sharingLev == 'public';
}

function isValidPostMyAccount($id)
{
    return $id == $_COOKIE['user-id-cookie'];
}

function getJson($name)
{
    $file = fopen($name, 'r');
    $src = fread($file, filesize($name));
    $json = json_decode($src);
    return $json;
}

function configComponent($postFile, $userFile, $currentPath, $pathToImage)
{
    $postJson = getJson($postFile);
    usort($postJson, "cmpPost");
    $userJson = getJson($userFile);

    echo '
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
    ';

    if (str_contains($currentPath, 'index.php')) {
        if (isset($_COOKIE['user-id-cookie'])) {
            for ($i = 0; $i < count($postJson); $i++) {
                if (isValidPostForUser($postJson[$i]->sharingLev)) {
                    configCard($postJson[$i], $userJson, $pathToImage);
                }
            }
        } else {
            for ($i = 0; $i < count($postJson); $i++) {
                if (isValidPostForGuest($postJson[$i]->sharingLev)) {
                    configCard($postJson[$i], $userJson, $pathToImage);
                }
            }
        }
    } else if (str_contains($currentPath, 'myaccount.php') && isset($_COOKIE['user-id-cookie'])) {
        for ($i = 0; $i < count($postJson); $i++) {
            if (isValidPostMyAccount($postJson[$i]->userId)) {
                configCard($postJson[$i], $userJson, $pathToImage);
            }
        }
    }

    echo '
        </div>
    </div>';
}
?>
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