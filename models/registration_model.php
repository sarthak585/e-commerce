<?php
/*
 * Include necessary files.
 */
include_once 'connect_db.php';

class registration_model{
    /*
     * Run Insert Query to insert data into table.
     * @param array $productArray.
     * @return status of affected rows.
     */
	function addUser($userAray) {
		$sql = "INSERT INTO user(UserName, Password, Email) VALUES ('".$userAray['UserName']."','".$userAray['Password']."','".$userAray['Email']."')";
	 	$result = mysql_query($sql);

		return mysql_affected_rows();
	}
}

?>