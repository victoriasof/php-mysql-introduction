<?php
class FrontController {
    public function render() {
        require 'View/includes/header.php';
        // Get all students
        $studentLoader = new StudentLoader();
        $students = $studentLoader->getStudents();
        if ($students) {
            // If there are students in the database show a table listing them
            require 'View/table.php';
        }
        require 'View/includes/footer.php';
    }
}