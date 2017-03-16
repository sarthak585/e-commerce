<?php

class modelTest
{
    private $conn;

    public function __construct()
    {
        //connect db.
        $this->conn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($this->conn, 'test');
    }

    /**
     *
     */
    public function selectTest()
    {
        //select query and create list.
        $sql = 'SELECT * FROM testing';
        $rs = mysqli_query($this->conn, $sql);

        $list = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $list[] = $row;
        }

        return $list;
    }

    /**
     * @return bool|mysqli_result
     */
    public function addTest($testData) {
        //insert query.
        $sql = "INSERT INTO testing(name) VALUES ('" . $testData['name'] . "')";
        $rs = mysqli_query($this->conn, $sql);

        return $rs;
    }

    /**
     *
     */
    public function editTest($testData)
    {
        $sql = "UPDATE testing SET name = '" . $testData['name'] . "' WHERE id = " . $testData['id'];
        $rs = mysqli_query($this->conn, $sql);

        return $rs;
    }

    /**
     *
     */
    public function deleteTest($testData) {
        $sql = "DELETE FROM testing WHERE id = " . $testData['id'];
        $rs = mysqli_query($this->conn, $sql);

        return $rs;
    }
}
?>