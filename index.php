<?php require_once 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="card my-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h3 class="mb-0">Contact App</h3>
                            <p class="mb-0 small text-black-50">Home</p>
                        </div>
                        <div class="">
                            <a href="create.php" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            if(isset($_POST['contactDelete'])){
                if(contactDelete()){
                    storeAlertMessage("contact","Contact is deleted");
                    echo redirect();
                }
            }

            echo showAlertMessage("contact");
            ?>
            <ul class="list-group">
                <?php foreach (contacts() as $contact): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="">
                        <p class="mb-0"><?= $contact->name ?></p>
                        <p class="mb-0 small text-black-50"><?= $contact->phone ?></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $contact->id ?>">
                        <button class="btn btn-sm btn-outline-danger" name="contactDelete">
                            <i class="fa-regular fa-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <?php endforeach; ?>

            </ul>

        </div>
    </div>
</div>

<?php require_once 'header.php'; ?>

