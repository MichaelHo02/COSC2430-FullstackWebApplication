<?php
if (!isset($_COOKIE['user-id-cookie']) && !isset($_COOKIE['admin'])) {
    header("location: ?page=home");
}

require_once $config['LIB_PATH'] . "io.php";
require_once $config['LIB_PATH'] . "imageValidation.php";

if (isset($_COOKIE['user-id-cookie'])) {
    $id = $_COOKIE['user-id-cookie'];
} else {
    $id = $_REQUEST['id'];
}

if (isset($_FILES['formFile'])) {
    $result = isValidFile($config);
    $file_ok = $result[0];
    $message = $result[1];
    $fileNewName = $result[2];

    if ($file_ok) {
        $file = $config['DATABASE_PATH'] . 'users.db';
        $objArray = getJson($file);
        if ($objArray !== null) {
            for ($i = 0; $i < count($objArray); $i++) {
                if ($objArray[$i]->id == $id) {
                    unlink('../app/database/img/avatar/' . $objArray[$i]->avatar);
                    $objArray[$i]->avatar = $fileNewName;
                    break;
                }
            }
            $strSrc = json_encode($objArray);
            setJson($file, $strSrc);
        }
    }

    function isValidAvatarBtn($file_ok)
    {
        if (isset($_FILES['formFile'])) {
            if ($file_ok) {
                return 'is-valid btn-success';
            } else {
                return 'is-invalid btn-danger';
            }
        } else {
            return '';
        }
    }

    function isValidAvatarMessage($file_ok)
    {
        if (isset($_FILES['formFile'])) {
            if ($file_ok) {
                return 'valid-feedback';
            } else {
                return 'invalid-feedback';
            }
        }
        return '';
    }

    $avtBtn = isValidAvatarBtn($file_ok);
    $messageClass = isValidAvatarMessage($file_ok);

    function isValidAvatarInput($file_ok)
    {
        if (isset($_FILES['formFile'])) {
            if ($file_ok) {
                return 'is-valid';
            } else {
                return 'is-invalid';
            }
        }
        return '';
    }
    $inputAvt = isValidAvatarInput($file_ok);
}

$file = $config['DATABASE_PATH'] . 'users.db';

$objArray = getJson($file);


if (isset($_POST['password'])) {
    for ($i = 0; $i < count($objArray); $i++) {
        if ($objArray[$i]->id == $id) {
            $objArray[$i]->password = md5($_POST['password']);
            break;
        }
    }
    setJson($file, json_encode($objArray));
}

$objArray = getJson($file);

if ($objArray !== null) {
    for ($i = 0; $i < count($objArray); $i++) {
        if ($objArray[$i]->id == $id) {
            $avatar = '../app/database/img/avatar/' . $objArray[$i]->avatar;
            $email = $objArray[$i]->email;
            $firstName = $objArray[$i]->firstName;
            $lastName = $objArray[$i]->lastName;
            $username = "@" . $objArray[$i]->username;
            $registeredTime = $objArray[$i]->registeredTime;
            break;
        }
    }
}

$typeOfBtn = isset($_COOKIE['user-id-cookie']) ? '
    <button type="button" class="btn btn-primary ' . $avtBtn . '" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Change Avatar
    </button>
    <div id="" class="' . $messageClass . '">
        ' . $message . '
    </div>
' : '
    <button type="button" class="btn btn-primary ' . $avtBtn . '" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Change Password
    </button>
    <div id="" class="' . $messageClass . '">
        ' . $message . '
    </div>
';

$typeOfModal = isset($_COOKIE['user-id-cookie']) ? '
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Avatar</h5>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </button>
            </div>
            <form action="?page=' . $_REQUEST["page"] . '" name="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Profile picture</label>
                        <input class="form-control ' . $inputAvt . '" type="file" id="formFile" name="formFile">
                        <div id="" class="' . $messageClass . '">
                            ' . $message . '
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" value="Submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
' : '
<script src="../app/assets/js/signup.js" defer></script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </button>
            </div>
            <form class="form" action="?page=' . $_REQUEST['page'] . '&&id=' . $_REQUEST['id'] . '" name="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="submit" type="submit" name="submit" class="btn btn-primary" value="Submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
';

include_once $config['LIB_PATH'] . 'card' . DS . 'model.php';
$postDB = $config['DATABASE_PATH'] . 'posts.db';
$userDB = $config['DATABASE_PATH'] . 'users.db';
