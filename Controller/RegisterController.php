<?php
class RegisterController {
    public function render() {
        // Initialize variables with empty strings not to get error in PHP if not set
        $firstName = $lastName = $email = "";
        $firstNameErrorMessage = $lastNameErrorMessage = $emailErrorMessage = $passwordErrorMessage = $passwordConfirmErrorMessage = $passwordsMatchError = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Auth();
            // Runs when the user submits the register form
            $firstName = $auth->test_input($_POST['firstName']);
            $lastName = $auth->test_input($_POST['lastName']);
            $email = $auth->test_input($_POST['email']);
            $password = $auth->test_input($_POST['password']);
            $passwordConfirm = $auth->test_input($_POST['passwordConfirm']);
            // Converts the passwork in bcrypt crypto pass
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Validation of the user input for empty
            if (empty($firstName)) {
                $firstNameErrorMessage = 'First name is required';
            }

            if (empty($lastName)) {
                $lastNameErrorMessage = 'Last name is required';
            }

            if (empty($email)) {
                $emailErrorMessage = 'Email is required';
            }else if (!$auth->emailValidation($email)) {
                $emailErrorMessage = 'Invalid email format';
            }

            if (empty($password)) {
                $passwordErrorMessage = 'Password is required';
            }

            if (empty($passwordConfirm)) {
                $passwordConfirmErrorMessage = 'Password confirmation is required';
            }

            // Check if the password is equal to password confirm
            if (!$auth->passwordConfirmedValidation($password, $passwordConfirm)) {
                $passwordsMatchError = "Password with confirm are not equal";
            }

            if (empty($firstNameErrorMessage) && empty($lastNameErrorMessage) && empty($emailErrorMessage) && empty($passwordErrorMessage)
                && empty($passwordConfirmErrorMessage) && empty($passwordsMatchError)) {
                // If the register form is valid and no errors insert a new Student
                // in the students table
                $pdo = Connection::openConnection();
                $statement = $pdo->prepare("
                    INSERT INTO student(first_name, last_name, email, password) 
                    VALUES (:firstName, :lastName, :email, :password)
                ");
                $statement->bindValue(":firstName", $firstName);
                $statement->bindValue(":lastName", $lastName);
                $statement->bindValue(":email", $email);
                $statement->bindValue(":password", $hashedPassword);
                $statement->execute();
                // Get an integer of how many students got inserted (1 always)
                $rowsChanged = $statement->rowCount();
                // Get the id of the new student created
                $id = $pdo->lastInsertId();

                // Save the student's details to be used later in authentication
                $_SESSION['id'] = $id;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $hashedPassword;
                $_SESSION['isAuthenticated'] = true;
                // Redirect user to his new profile page using his ID
                $auth->redirectToProfile($id);

            }
        }

        // Require the register form
        require 'View/register.php';
    }
}
