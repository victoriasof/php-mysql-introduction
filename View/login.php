<?php require 'View/includes/header.php' ?>

    <div class="container my-5">
        <?php
        if (!empty($loginError)) {
            echo "
                <div class=\"alert alert-danger\">
                    Invalid credentials
                </div>
            ";
        }elseif (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated']) {
            echo "
                <div class=\"alert alert-success\">
                    Logged in successfully
                </div>
            ";
        }
        ?>

        <h1>Login form</h1>
        <div id="form">
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $email ?>">
                    <p class="form-error-message"><?php echo $emailErrorMessage ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input class="form-control" type="password" name="password" id="password">
                    <p class="form-error-message"><?php echo $passwordErrorMessage ?></p>
                </div>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </div>

<?php require 'View/includes/footer.php' ?>