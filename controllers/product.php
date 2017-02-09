<?php
include_once '../models/product_model.php';

$productModel = new product_model();
	
$id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
$categoryid = (isset($_GET['CategoryId']) && $_GET['CategoryId'] > 0) ? $_GET['CategoryId'] :0;

//If action, then process(insert, update & delete) data with DB.
if(isset($_GET['action'])) {	
	//Upload file into folder.
	$fileName=time()."_".basename($_FILES["image"]["name"]);
	move_uploaded_file($_FILES["image"]["tmp_name"],"../web/images/".$fileName);
	
	//Prepare an array for insert and update.
	$postData = array('SKU' =>$_POST['sku'],'Type' =>$_POST['type'],'Price' =>$_POST['price'],'Name' => $_POST['name'],'Image' => $fileName,'CategoryId' => $categoryid);
	
	if ($_GET['action'] == 'update'){				
		if($id) {
			if($_FILES["image"]["name"] == '' && $_POST["hiddenimage"] != ''){	
				$postData['Image'] = $_POST["hiddenimage"];
			}
			$productModel->editProduct($id, $postData);			
		}
		else {		
			$productModel->addProduct($postData);			
		}
	} 
	else if ($_GET['action'] == 'delete') {				
		$productModel->deleteProduct($id);			
	}

	//Redirect back to view.
	header('location: ../views/product_view.php?CategoryId='.$categoryid);
}

//Get the list of products for view.
$productList = $productModel->viewProduct($categoryid);

// display view file's content.
//echo file_get_contents('http://localhost/website/views/product_view.php');
	