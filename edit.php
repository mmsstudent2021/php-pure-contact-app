<?php require_once 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="card my-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h3 class="mb-0">Contact App</h3>
                            <p class="mb-0 small text-black-50">Home / Edit</p>
                        </div>
                        <div class="">
                            <a href="index.php" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-home"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php

//            if(isset($_POST['contactCreate'])){
//                if(contactCreate()){
//                    storeAlertMessage("create","Contact is created");
//                    echo redirect('create.php');
//                }
//            }

            $contact = contact($_GET['id']);

            echo showAlertMessage("create");


            ?>

            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Contact Name</label>
                            <input type="text" name="name" value="<?= old('name') ?>" class="form-control form-control-lg" >
                            <?= showErrorMessage('name'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" name="phone" value="<?= old('phone') ?>" class="form-control form-control-lg" >
                            <?= showErrorMessage('phone'); ?>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-lg btn-primary d-block w-100" name="contactCreate">
                                Save Contact
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'header.php'; ?>

