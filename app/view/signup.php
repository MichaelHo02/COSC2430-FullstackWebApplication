<script src="../app/assets/js/signup.js" defer></script>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <h1 class="display-3 col-12 text-center">Sign Up</h1>
        <form name="form" class="col-lg-6 col-sm-10 mt-4 form" method="post" action="?page=signup" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="email" autocomplete="off">
                <div id="emailFeedback" class=""></div>
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
                    echo $message;
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

            <input type="reset" value="Reset" class="btn btn-secondary">
            <input name="submit" type="submit" value="Register" class="btn btn-primary" id="submit" disabled>
        </form>
    </div>
</div>