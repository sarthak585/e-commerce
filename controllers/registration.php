<?php
	/*
	* Include necessary files.
	*/
	include_once '../models/registration_model.php';

	/*
	* Initialize objects.
	*/
	$userModel = new registration_model();

	// Prepare an array for insert and update.
    $userData = array('FirstName' =>$_POST['firstname'],'LastName' =>$_POST['lastname'],'Phone' =>$_POST['phone'],'UserName' =>$_POST['usernamesignup'],'Password' =>$_POST['passwordsignup'],'Email' =>$_POST['emailsignup']);
	$userModel->addUser($userData);
	
	// Redirect back to view.
	header('location: ../views/registration_view.php');
?>