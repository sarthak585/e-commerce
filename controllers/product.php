<?php
/*
 * Include necessary files.
 */
include_once '../models/product_model.php';
include_once '../models/category_model.php';

/*
 * Initialize objects.
 */
$productModel = new product_model();
$categoryModel = new category_model();

/*
 * Initialize variables.
 */
$id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
$categoryid = (isset($_GET['CategoryId']) && $_GET['CategoryId'] > 0) ? $_GET['CategoryId'] :0;

/*
 * If action is set, process data in db.
 */
if(isset($_GET['action'])) {
    /*
    * Upload file into folder.
    */
	$fileName=time()."_".basename($_FILES["image"]["name"]);
	move_uploaded_file($_FILES["image"]["tmp_name"],"../web/images/".$fileName);
	
	// Prepare an array for insert and update.
	$postData = array('SKU' =>$_POST['sku'],'Type' =>$_POST['type'],'Price' =>$_POST['price'],'Name' => $_POST['name'],'Image' => $fileName,'CategoryId' => $categoryid);
	
	if ($_GET['action'] == 'update'){
        // If action is update and product id is there, update data into db using model function.
		if($id) {
            // If image has not been updated, then update existing image from hidden input.
			if($_FILES["image"]["name"] == '' && $_POST["hiddenimage"] != ''){	
				$postData['Image'] = $_POST["hiddenimage"];
			}
			$productModel->editProduct($id, $postData);			
		}
        // If action is insert, insert data into db using model function.
		else {		
			$productModel->addProduct($postData);			
		}
	}
    // If action is delete, delete data into db using model function.
	else if ($_GET['action'] == 'delete') {				
		$productModel->deleteProduct($id);			
	}

	// Redirect back to view.
	header('location: ../views/product_view.php?CategoryId='.$categoryid);
}

/*
 * collect data form db and create product list array.
 */
$productList = $productModel->viewProduct($categoryid);
$categoryList = $categoryModel->viewCategory();