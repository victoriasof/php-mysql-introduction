<?php require 'View/includes/header.php' ?>

<div class="container">
    <div id="form">
<!--        <div class="alert alert-danger">-->
<!--            Invalid credentials-->
<!--        </div>-->
        <form method="post" action="">
            <label for="email">Email</label><br>
            <input class="form-control" type="text" name="email" id="email" value="<?php echo $email ?>">

            <label for="password">Password</label><br>
            <input class="form-control" type="password" name="password" id="password">

            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</div>

<?php require 'View/includes/footer.php' ?>