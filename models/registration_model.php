<?php
/*
 * Include necessary files.
 */
include_once 'connect_db.php';

class registration_model{

    /**
     * Run Insert Query to insert data into table.
     * @param $userData
     * @return int
     */
    function addUser($userData) {
		$sql = "INSERT INTO user(FirstName, LastName, Phone, Username, Password, Email) 
                VALUES ('".$userData['FirstName']."','".$userData['LastName']."','".$userData['Phone']."','".$userData['UserName']."','".$userData['Password']."','".$userData['Email']."')";
	 	mysql_query($sql);

		return mysql_affected_rows();
	}
}

?>