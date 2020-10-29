
<?php

class Auth {
    public $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function emailValidation(string $email): string
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function nameValidation(string $name): string
    {
        return preg_match("/^[a-zA-Z ]*$/", $name);
    }

    public function passwordConfirmedValidation(string $password, string $confirmPassword): string
    {
        return $password === $confirmPassword;
    }

    public function redirectToRegister() {
        Header("Location: /?page=register");
        die();
    }

    public function redirectToLogin() {
        Header("Location: /?page=login");
        die();
    }

    public function redirectToProfile(int $id) {
        Header("Location: /?user=$id");
        die();
    }

    public function redirectToHome() {
        Header("Location: /");
        die();
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getStudent(string $email) {
        $pdo = Connection::openConnection();
        $statement = $pdo->prepare("
                    SELECT id, password FROM students
                    WHERE email = :email
                ");
        $statement->bindValue(":email", $email);
        $statement->execute();
        return $statement->fetch();
    }

    public function logout() {
        session_unset();
        $this->redirectToLogin();
    }

//    public function checkPassword(string $password, string $email)
//    {
//        $hash = $this->connection->getHash($email);
//        return password_verify($password, $hash['password']);
//    }

}