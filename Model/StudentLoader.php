<?php

class StudentLoader extends Connection {

    private array $students = [];

    public function __construct()
    {
        //$this->students = $students;

        $handle = $this->openConnection()->prepare("SELECT * FROM students");
        $handle->execute();
        foreach ($handle->fetchAll() as $student) {

            $this->students[$student['id']] = new Student($student['id'], $student['firstname'], $student['lastname'], $student['email'], $student['created_at']);

        }
    }


    public function getStudents(): array
    {
        return $this->students;
    }



}