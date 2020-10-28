<?php

Class ProfileController{
    public function render() {
        $id = $_GET['user'];
        $studentLoader = new StudentLoader();
        $currentStudent = $studentLoader->getStudents()[$id];
        $data = @file_get_contents('https://api.thecatapi.com/v1/images/search');
        $dataDecode = json_decode($data, true);
        $img = $dataDecode[0]['url'];

        require 'View/profile.php';
    }
}