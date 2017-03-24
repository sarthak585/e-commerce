<?php

include_once 'Person.php';
include_once 'Employee.php';
include_once 'Manager.php';

//$personObj = new Person();
$employeeObj = new Employee();
$manager = new Manager();

// Person
//Person::setId(1);
//$personObj->setName('Archi'); //it's abstract


echo "<br>";
//echo Person::getId();
//echo $personObj->getName(); //it's abstract

// Employee and Person
Employee::setId(1);
$employeeObj->setName('Archi Parikh');
$employeeObj->setSalary(1000);

echo "<br>";
echo Employee::getId();
echo $employeeObj->getName();
echo $employeeObj->getSalary();


// Manager and Employee and Person
Manager::setId(3);
$manager->setName('Archi Shah');
//$manager->setSalary(2000);
$manager->setPosition('Manager');

echo "<br>";
echo $manager->getId();
echo $manager->getName();
//echo $manager->getSalary();
echo $manager->getPosition();