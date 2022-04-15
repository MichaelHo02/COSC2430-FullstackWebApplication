<?php

include_once $config['LIB_PATH'] . 'sortCmp.php';
include_once $config['LIB_PATH'] . 'io.php';

function renderCard($id, $avatar, $username, $lastUpdate, $content, $image, $sharingLev, $currentPath)
{
    echo '
        <div class="col position-relative" id="' . $id . '">
            <div class="card h-100">
                    <button name="' . $id . '" type="submit" value="submit" class="delBtn btn btn-danger rounded-circle position-absolute top-0 start-100 translate-middle px-2 py-1 delete-img-btn">
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
                                <small class="text-muted">' . $lastUpdate . '</small>
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

function getUser($id, $userJson)
{
    for ($i = 0; $i < count($userJson); $i++) {
        if ($userJson[$i]->id == $id) {
            return $userJson[$i];
        }
    }
}

function configCard($post, $userJson, $pathToImage, $currentPath)
{
    $user = getUser($post->userId, $userJson);
    $avatar = $pathToImage . 'avatar/' . $user->avatar;
    $username = $user->username;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $lastUpdate = date('Y-m-d', $post->publishedDate);
    $content = $post->postDesc;
    $image = $pathToImage . 'storage/' . $post->postId . '.' . $post->postExt;
    $sharingLev = $post->sharingLev;
    renderCard($post->postId, $avatar, $username, $lastUpdate, $content, $image, $sharingLev, $currentPath);
}

function isValidPostForGuest($sharingLev)
{
    return $sharingLev == 'public';
}

function isValidPostMyAccount($id)
{
    return $id == $_COOKIE['user-id-cookie'];
}

function isValidPostForUser($sharingLev, $id)
{
    return $sharingLev == 'public' || $sharingLev == 'internal'
        || ($sharingLev == 'private' && isValidPostMyAccount($id));
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
    if (str_contains($currentPath, 'home')) {
        if (isset($_COOKIE['user-id-cookie'])) {
            for ($i = 0; $i < count($postJson); $i++) {
                if (isValidPostForUser($postJson[$i]->sharingLev, $postJson[$i]->userId)) {
                    configCard($postJson[$i], $userJson, $pathToImage, $currentPath);
                }
            }
        } else {
            for ($i = 0; $i < count($postJson); $i++) {
                if (isValidPostForGuest($postJson[$i]->sharingLev)) {
                    configCard($postJson[$i], $userJson, $pathToImage, $currentPath);
                }
            }
        }
    } else if (str_contains($currentPath, 'my_account') && isset($_COOKIE['user-id-cookie'])) {
        for ($i = 0; $i < count($postJson); $i++) {
            if (isValidPostMyAccount($postJson[$i]->userId)) {
                configCard($postJson[$i], $userJson, $pathToImage, $currentPath);
            }
        }
    } else if (str_contains($currentPath, 'adminDashboard.php')) {
        for ($i = 0; $i < count($postJson); $i++) {
            configCard($postJson[$i], $userJson, $pathToImage, $currentPath);
        }
    }

    echo '
        </div>
    </div>';
}
