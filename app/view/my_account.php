<link rel="stylesheet" href="../app/assets/css/myaccount.css">
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
                    <p for="" class="">Email: <span class=""><?php echo $email; ?></span></p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p for="" class="">Registered on: <span class="">
                            <?php echo $registeredTime; ?>
                        </span></p>
                </div>
            </div>
            <div class="row mt-lg-3 mt-md-0 mt-0">
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p for="" class="">First name: <span class=""><?php echo $firstName; ?></span> </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-md-start text-center">
                    <p for="" class="">Last name: <span class=""><?php echo $lastName; ?></span></p>
                </div>
            </div>
            <div class="row mt-lg-3 mt-md-0 mt-0">
                <div class="d-grid gap-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary <?php echo $avtBtn; ?>" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        Change Avatar
                    </button>
                    <div id="" class="<?php echo $messageClass; ?>">
                        <?php echo $message; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Avatar</h5>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </button>
                </div>
                <form action="?page=my_account" name="form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile picture</label>
                            <input class="form-control <?php echo $inputAvt; ?>" type="file" id="formFile" name="formFile">
                            <div id="" class="<?php echo $messageClass; ?>">
                                <?php echo $message; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>