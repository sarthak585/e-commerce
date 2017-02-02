<?php
include_once 'models/category_model.php';
$categoryModel = new category_model();
$categoryList = $categoryModel->viewCategory();
?>
<html>
	<head>
		<title>Admin Panel</title>	
		<link rel="stylesheet" href="web/css/admin_style.css" />
	</head>	
<body>
	<div id="header">
		<a href="index.php"><h1>Welcome to the Admin Panel</h1></a>
	</div> 
	<div id="sidebar">
		<b><font size="5">Welcome:</font></b><h2>Admin</h2>
		<h2><a href="views/category_view.php">Categories</a></h2>
		<h2>Products</h2>
		<?php
				foreach ($categoryList as $value){	
					echo '<h2>';
						echo '<a href="views/product_view.php?CategoryId='.$value['CategoryId'].'">';
							echo $value['Name']; 
						echo '</a>';
					echo '</h2>';
				}
			?>
	</div>
	<div id="welcome"> 
		<h1>Welcome to your Admin Panel</h1>
		<p>This is your admin panel, where you can manage your website files and content</p>
	</div>
</body>
</html>