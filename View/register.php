<?php require 'View/includes/header.php'; ?>

<div class="container">

    <?php

    if(!empty($passwordMatchError)){
        echo "<div class=\"alert alert-danger\">$passwordMatchError</div>";
    } elseif (isset($rowsChanged)&& $rowsChanged){
        echo "<div class=\"alert alert-success\">Student created successfully</div>";
    }
    ?>

    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $firstName ?>">
                    <p class = "form-error-message"> <?php echo $firstNameErrorMessage ?> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Last name:</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" value="<?php echo $lastName ?>">
                    <p class = "form-error-message"> <?php echo $lastNameErrorMessage ?> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                    <p class = "form-error-message"> <?php echo $passwordErrorMessage ?> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="passwordConfirm">Password Confirm:</label>
                    <input class="form-control" type="password" id="passwordConfirm" name="passwordConfirm">
                    <p class = "form-error-message"> <?php echo $passwordConfirmErrorMessage ?> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $email ?>">
                    <p class = "form-error-message"> <?php echo $emailErrorMessage ?> </p>
                </div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
</div>

<?php require 'View/includes/footer.php' ?>