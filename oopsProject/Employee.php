<?php

namespace Employee;
use Person;

class Employee extends Person {
    public $salary;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = 'Person is an Employee, Name - '.$name;
    }


    /**
     * @return mixed
     */
    public function getSalary()
    {
        $this->name;
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}