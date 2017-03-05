<?php
include_once 'config/config.php';
include_once 'models/category_model.php';
$categoryModel = new category_model();
$categoryList = $categoryModel->viewCategory();
?>
<div id="sidebar">
	<b><font size="5">Welcome:</font></b><h2>Admin</h2>
	<h2><a href="<?php echo BASE_URL; ?>views/category_view.php">Categories</a></h2>
	<h2>Products</h2>
	<?php
			foreach ($categoryList as $value){	
				echo '<h2>';
					echo '<a href="'.BASE_URL.'views/product_view.php?CategoryId='.$value['CategoryId'].'">';
						echo $value['Name']; 
					echo '</a>';
				echo '</h2>';
			}
		?>
</div>
