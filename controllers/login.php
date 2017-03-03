<?php
	/*
	* Include necessary files.
	*/
	//include_once('../config/config.php');
	include_once '../models/login_model.php';

	/*
	* Initialize objects.
	*/
	$error = '';
	$userModel = new login_model();

	// Prepare an array for insert and update.
	
    $user=$userModel->getUserByUsernameAndPassword($_POST['username'],$_POST['password']);

	// Redirect back to view.
	if ($user){
		session_start();
		$_SESSION['username']=$user['UserName'];
		$_SESSION['isAuthenticated']=true;
		
		header('location: ../index.php');
	}
	else {
		$error = "Username or Password Invalid";
		header('location: ../views/registration_view.php?iserror=true');
	}	
?>