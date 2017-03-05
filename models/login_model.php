<?php
/*
 * Include necessary files.
 */
include_once 'connect_db.php';

class login_model{
    /*
     * Run Select Query to fetch data from user table matching username and password.
     * @param var $username.
     * @param var @password.
     * @return object $user.
     */
	function getUserByUsernameAndPassword ($username, $password) {
		$sql = 'SELECT * FROM `user` WHERE UserName="'.$username.'" AND Password="'.$password.'"';
	 	//echo $sql; exit;
	 	$result = mysql_query($sql);

		return mysql_fetch_assoc($result);

	}
}

?>