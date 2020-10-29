<?php require 'View/includes/header.php' ?>

<div class="container">
    <h1>Profile</h1>
    <img src="<?php echo $img ?>" style="width: 200px;">

    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName">Firstname</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $currentStudent->getFirstName() ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastName">Lastname</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $currentStudent->getLastName() ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $currentStudent->getEmail() ?>">
                </div>
            </div>
        </div>
        <?php
        if ($canEdit) {
            if ($editMode) {
                echo "
                <div class=\"profile-actions\">
                    <button type='submit' class='btn btn-primary'>Update profile</button>
                    <a class=\"btn btn-danger\" href=\"?user=$id&edit=1&delete\">Delete profile</a>
                </div>
            ";
            }else {
                echo "
                <div class=\"profile-actions\">
                    <a href=\"?user=$id&edit=1\" class=\"btn btn-primary\">Edit profile</a>
                </div>
            ";
            }

        }
        ?>
    </form>
</div>

<?php require 'View/includes/footer.php' ?>
