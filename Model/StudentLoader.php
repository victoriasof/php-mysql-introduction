<?php

class StudentLoader extends Connection {

    private array $students = [];

    public function __construct()
    {
        //$this->students = $students;

        $handle = $this->openConnection()->prepare("SELECT * FROM student");
        $handle->execute();
        foreach ($handle->fetchAll() as $student) {

            $this->students[$student['id']] = new Student($student['id'], $student['first_name'], $student['last_name'], $student['email'], $student['created_at']);

        }
    }


    public function getStudents(): array
    {
        return $this->students;
    }



}