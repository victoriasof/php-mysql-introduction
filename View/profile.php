<?php require 'View/includes/header.php' ?>

    <div class="container">
        <h1>Profile</h1>
        <img src="<?php echo $img ?>" style="width: 200px;">
        <p>Firstname: <?php echo $currentStudent->getFirstName() ?></p>
        <p>Lastname: <?php echo $currentStudent->getLastName() ?></p>
        <p>Email: <?php echo $currentStudent->getEmail() ?></p>
        <p>Created At: <?php echo $currentStudent->getCreatedAt() ?></p>
        <?php
        if ($canEdit) {
            echo "
            <div class=\"profile-actions\">
                <a href=\"?user=$id&edit=1\" class=\"btn btn-primary\">Edit profile</a>
            </div>
        ";
        }
        ?>
    </div>

<?php require 'View/includes/footer.php' ?>