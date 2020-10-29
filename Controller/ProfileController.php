<?php

Class ProfileController{
    public function render() {
        $id = $_GET['user'];
        $studentLoader = new StudentLoader();
        $currentStudent = $studentLoader->getStudents()[$id];
        $data = @file_get_contents('https://api.thecatapi.com/v1/images/search');
        $dataDecode = json_decode($data, true);
        $img = $dataDecode[0]['url'];
        $canEdit = false;
        $editMode = false;

        if (isset($_SESSION['id']) && ($_SESSION['id'] === $id)) {
            $canEdit = true;
        }

        if (isset($_GET['edit']) && ($_GET['edit'] === '1')) {
            if ($canEdit) {
                $editMode = true;
                $auth = new Auth();

                if (isset($_GET['delete'])) {
                    $pdo = Connection::openConnection();
                    $statement = $pdo->prepare("
                        DELETE FROM student 
                        WHERE id = :id
                    ");
                    $statement->bindValue(":id", $id);
                    $statement->execute();
                    $auth->logout();
                    Header("Location: /?page=register");
                    die();
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $firstName = $auth->test_input($_POST['firstName']);
                    $lastName = $auth->test_input($_POST['lastName']);
                    $email = $auth->test_input($_POST['email']);

                    $pdo = Connection::openConnection();
                    $statement = $pdo->prepare("
                        UPDATE student 
                        SET first_name = :firstName, last_name = :lastName, email = :email 
                        WHERE id = :id
                    ");
                    $statement->bindValue(":firstName", $firstName);
                    $statement->bindValue(":lastName", $lastName);
                    $statement->bindValue(":email", $email);
                    $statement->bindValue(":id", $id);
                    $statement->execute();

                    Header("Location: /?user=$id");
                    die();
                }

                require 'View/profileEdit.php';
            }else {
                Header("Location: /?login");
            }
        }else {
            require 'View/profile.php';
        }

    }
}
