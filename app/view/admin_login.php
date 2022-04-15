<script src="../app/assets/js/login.js" defer></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <h1 class="display-3 col-12 text-center">Admin</h1>

        <form class="col-lg-6 col-sm-10 mt-4" method="post" action="?page=admin_login" onsubmit="return handleLoginForm()">
            <h5 class="mt-4 mb-4 border border-danger rounded  p-3 text-danger text-center fail-auth <?php echo $loginStatus; ?>">
                <?php echo $loginPasswordErr; ?>
            </h5>

            <div class="mb-3">
                <label for="adminName" class="form-label">Username</label>
                <input name="adminName" type="text" class="form-control" id="adminName">
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