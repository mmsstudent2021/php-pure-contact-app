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

            if(isset($_POST['bulk_delete_button'])){
//                foreach ($_POST['bulk_delete_ids'] as $id){
//                    echo "delete from contacts where id='$id' <br>";
//                }
//                echo join(",",$_POST["bulk_delete_ids"]);
                if(contactBulkDelete()){
                    storeAlertMessage("contact","Contact is deleted");
                    echo redirect();
                }
            }

//            if(isset($_GET['keyword'])){
//                print_r($_GET);
//            }

            echo showAlertMessage("contact");
            echo showAlertMessage("update");

            ?>

            <form action="" method="post" id="bulk_delete"></form>

            <ul class="list-group">
                <?php foreach (contacts() as $contact): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="contact<?= $contact->id ?>" form="bulk_delete" name="bulk_delete_ids[]" value="<?= $contact->id ?>">
                        <label class="form-check-label" for="contact<?= $contact->id ?>">
                            <?= $contact->name ?>
                            <br>
                            <span class="text-black-50 small"><?= $contact->phone ?></span>
                        </label>
                    </div>
                    <div class="">
                        <a href="edit.php?id=<?= $contact->id ?>" class="btn btn-sm btn-outline-primary">
                            <i class="fa-solid fa-fw fa-pencil-alt"></i>
                        </a>
                        <form action="" class="d-inline-block" method="post">
                            <input type="hidden" name="id" value="<?= $contact->id ?>">
                            <button class="btn btn-sm btn-outline-danger" name="contactDelete">
                                <i class="fa-regular fa-fw fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-outline-danger" name="bulk_delete_button" form="bulk_delete">
                    Delete Selected
                </button>
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Contact" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once 'header.php'; ?>

