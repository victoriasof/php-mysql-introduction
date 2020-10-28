<?php require 'View/includes/header.php'; ?>

<div class="container">


    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $firstName ?>">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Last name:</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" value="<?php echo $lastName ?>">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="passwordConfirm">Password Confirm:</label>
                    <input class="form-control" type="password" id="passwordConfirm" name="passwordConfirm">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $email ?>">

                </div>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
</div>

<?php require 'View/includes/footer.php' ?>