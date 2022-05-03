<script src="/assets/js/login.js" defer></script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <h1 class="display-3 col-12 text-center">Login</h1>

        <form class="col-lg-6 col-sm-10 mt-4" method="post" action="?page=login" onsubmit="return handleLoginForm()">
            <h5 class="mt-4 mb-4 border border-danger rounded  p-3 text-danger text-center fail-auth <?php echo $loginStatus; ?>">
                <?php echo $loginPasswordErr; ?>
            </h5>

            <div class="mb-3">
                <label for="loginEmailUsername" class="form-label">Email address / Username</label>
                <input name="email" type="text" class="form-control" id="loginEmailUsername">
                <div id="loginUserFeedback" class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="loginPassword">
                <div id="passwordUserFeedback" class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
                <p class="form-check-label">Don't have an account? <a href="?page=signup" class="link-primary">Sign up</a></p>
            </div>
            <div class="row align-items-start m-auto">
                <button name="submit" type="submit" class="col-md-2 col-sm-12 btn btn-primary login-submit">Submit</button>

            </div>
        </form>
    </div>
</div>