<link rel="stylesheet" href="assets/css/avatar.css">

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="bg-info rounded-circle w-75 avatar mx-auto">
                <img src="<?php echo $avatar; ?>" class=" mx-auto d-block img-fluid" alt="avatar">
            </div>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-12 ">
            <h1 class="display-4 text-lg-start text-md-start text-center">
                <?php echo $username; ?>
            </h1>
            <div class="row mt-lg-3 mt-md-0 mt-0">
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p>Email: <span><?php echo $email; ?></span></p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p>Registered on: <span>
                            <?php echo $registeredTime; ?>
                        </span></p>
                </div>
            </div>
            <div class="row mt-lg-3 mt-md-0 mt-0">
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p>First name: <span><?php echo $firstName; ?></span> </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p>Last name: <span><?php echo $lastName; ?></span></p>
                </div>
            </div>
            <div class="row mt-lg-3 mt-md-0 mt-0">
                <div class="d-grid gap-2">
                    <!-- Button -->
                    <?php echo $typeOfBtn; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
configComponent($postDB, $userDB, $page, './assets/img/');
?>

<!-- Modal -->
<?php echo $typeOfModal; ?>