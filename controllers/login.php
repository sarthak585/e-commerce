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
		header('location: '.BASE_URL.'../index.php');
	}
	else {
		$error = "Username or Password Invalid";
		header('location: '.BASE_URL.'views/registration_view.php');
	}	
?>