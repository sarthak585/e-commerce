<?php
	/*
	* Include necessary files.
	*/
	include_once BASE_URL.'models/registration_model.php';

	/*
	* Initialize objects.
	*/
	$userModel = new registration_model();

	// Prepare an array for insert and update.
	$userData = array('UserName' =>$_POST['usernamesignup'],'Password' =>$_POST['passwordsignup'],'Email' =>$_POST['emailsignup']);
	$userModel->addUser($userData);
	
	// Redirect back to view.
	header('location: '.BASE_URL.'views/registration_view.php');
?>