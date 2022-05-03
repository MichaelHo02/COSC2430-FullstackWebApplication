<script src="/assets/js/signup.js" defer></script>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <h1 class="display-3 col-12 text-center">Sign Up</h1>
        <form name="form" class="col-lg-6 col-sm-10 mt-4 mb-5 pb-5 form" method="post" action="?page=signup" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control <?php echo $emailCSS; ?>" id="email" autocomplete="off">
                <div id="emailFeedback" class="<?php echo $emailMessageCSS; ?>">
                    <?php echo $emailMessage; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <ul class="list-group">
                    <li class="list-group-item pe-none">From 8 to 20 characters</li>
                    <li class="list-group-item pe-none">Contain at least 1 lower case letter</li>
                    <li class="list-group-item pe-none">Contain at least 1 upper case letter</li>
                    <li class="list-group-item pe-none">Contain at least 1 digit</li>
                    <li class="list-group-item pe-none">Have no space</li>
                </ul>
            </div>

            <div class="mb-3">
                <label for="retypePassword" class="form-label">Retype Password</label>
                <input name="retypePassword" type="password" class="form-control" id="retypePassword">
                <div id="retypePasswordFeedback" class=""></div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Profile picture</label>
                <input class="form-control <?php echo $fileCSS; ?>" type="file" id="formFile" name="formFile">
                <div class="<?php echo $fileMessageCSS; ?>">
                    <?php
                    echo $message ?? null;
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

            <div class="row align-items-start m-auto">
                <input type="reset" value="Reset" class="col-md-3 col-lg-2 col-sm-12 me-md-2 btn btn-secondary">
                <input name="submit" type="submit" value="Register" class="col-md-3 col-lg-3 col-sm-12 mt-sm-2 mt-md-0 mt-2 btn btn-primary" id="submit" disabled>
            </div>
        </form>
    </div>
</div>