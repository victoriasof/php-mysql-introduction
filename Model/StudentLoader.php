<?php


class StudentLoader extends Connection {

    private array $students = [];


    public function __construct(array $students)
    {
        //$this->students = $students;

        $handle = $this->openConnection()->prepare("INSERT * FROM student");
        $handle->execute();
        foreach ($handle->fetchAll() as $student) {

            $this->students[$student['id']] = new $student($student['firstname'], $student['lastname'], $student['email']);

        }
    }


    public function getStudents(): array
    {
        return $this->students;
    }



}