<?php
class LoginController {
    public function render() {
        $email = $password = "";
        $emailErrorMessage = $passwordErrorMessage = $loginError = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Auth();
            $email = $auth->test_input($_POST['email']);
            $password = $auth->test_input($_POST['password']);
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            if (empty($email)) {
                $emailErrorMessage = 'Email is required';
            }else if (!$auth->emailValidation($email)) {
                $emailErrorMessage = 'Invalid email format';
            }

            if (empty($password)) {
                $passwordErrorMessage = 'Password is required';
            }

            if (empty($emailErrorMessage) && empty($passwordErrorMessage)) {
                $currentUser = $auth->getStudent($email);
                $isAuthenticated = password_verify($password, $currentUser['password']);

                if ($isAuthenticated) {
                    $_SESSION['id'] = $currentUser['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $hashedPassword;
                    $_SESSION['isAuthenticated'] = $isAuthenticated;
                    $auth->redirectToHome();
                }else {
                    $loginError = "Invalid credentials";
                }
            }
        }

        require 'View/login.php';
    }
}