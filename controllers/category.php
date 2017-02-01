<?php
include_once '../models/category_model.php';

$categoryModel = new category_model();
	
$id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
	
if(isset($_GET['action'])) {	
	$postData = array('Name' =>$_POST['Name'],'Description' =>$_POST['Description'],'IsActive' => isset($_POST['IsActive'])?1:0);
	if ($_GET['action'] == 'update'){				
		if($id) {		
			$categoryModel->editCategory($id, $postData);			
		}
		else {		
			$categoryModel->addCategory($postData);			
		}
	} 
	else if ($_GET['action'] == 'delete') {				
		$categoryModel->deleteCategory($id);			
	}

	header('location: ../views/category_view.php');
}

$categoryList = $categoryModel->viewCategory();
// display view file's content.
//echo file_get_contents('http://localhost/website/views/saree_view.php');
	