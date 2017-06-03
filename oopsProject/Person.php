<?php

namespace Person;
abstract class Person {
    private static $id;

    public $name;
    protected $number;

    /**
     * Person constructor.
     */
    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public static function getId()
    {
        return Person::$id;
    }

    /**
     * @param mixed $id
     */
    public static function setId($id)
    {
        Person::$id = $id;
    }

    /**
     * @return mixed
     */
    abstract public function getName();

    /**
     * @param mixed $name
     */
    abstract public function setName($name);

    /**
     * @return mixed
     */
    protected function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    protected function setNumber($number)
    {
        $this->number = $number;
    }

}