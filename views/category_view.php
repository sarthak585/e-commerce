<?php
	include_once '../models/category_model.php';
	$categoryModel = new category_model();
	$categoryList = $categoryModel->viewCategory();
?>
<html>
	<head>
		<title>Admin Panel</title>	
		<link rel="stylesheet" href="../web/css/admin_style.css" />
		<script language="JavaScript" type="text/javascript">
			function checkDelete(CategoryId){
				if(confirm('Are you sure to delete?') == true) {
					window.location.href = "http://localhost/website/controllers/category.php?action=delete&id="+CategoryId;
				} 
			}
		</script>
	</head>	
	<body>
		<div id="header">
			<a href="../index.php"><h1>Welcome to the Admin Panel</h1></a>
		</div> 
			<div id="sidebar">
		<b><font size="5">Welcome:</font></b><h2>Admin</h2>
		<h2><a href="category_view.php">Categories</a></h2>
		<h2>Products</h2>
		<?php
				foreach ($categoryList as $value){	
					echo '<h2>';
						echo '<a href="product_view.php?CategoryId='.$value['CategoryId'].'">';
							echo $value['Name']; 
						echo '</a>';
					echo '</h2>';
				}
			?>
	</div>
		<div id="content">
		<?php include '../controllers/category.php'; ?>
			<h1>Manage Categories</h1>
			<form enctype="multipart/form-data" method="post" name="updateCategory" action="../controllers/category.php?action=update&id=<?php echo $id; ?>">
			<table id='formView' width="1000" border="0" align="center"> 
				
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name" value="<?php echo $id ? $categoryList[$id]['Name'] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="Description" value="<?php echo $id ? $categoryList[$id]['Description'] : ''; ?>"></td>
				</tr>
				<tr>
					<td>IsActive</td>
					<td><input type="checkbox" name="IsActive"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right" style="float:right;"><input type="submit" name="save" value="Save"></td>
				</tr>
			</table>
			</form>
			<table id='listView' width="1000" border="2" align="center"> 
				<tr>
					<th>CategoryId</th>
					<th>Name</th>
					<th>Description</th>
					<th>IsActive</th>
					<th>Actions</th>
				</tr>
				<?php					
					if ($categoryList!= NULL){
						foreach($categoryList as $categoryValue) {
							?>
							<tr>
								<td><?php echo $categoryValue['CategoryId'];?></td>
								<td><?php echo $categoryValue['Name'];?></td>
								<td><?php echo $categoryValue['Description'];?></td>
								<td><?php echo $categoryValue['IsActive'];?></td>
								<td>
									<a href="category_view.php?id=<?php echo $categoryValue['CategoryId']; ?>">
										<img src="../web/images/admin/Edit.png" height="25px" width="25px"></a>
									<a onclick="return checkDelete(<?php echo $categoryValue['CategoryId']; ?>);" style="cursor: pointer;">
										<img src="../web/images/admin/DeleteRed.png" height="25px" width="25px">
									</a>		
								</td>
							</tr>							
						<?php 	
						}
					}
				?>				
			</table>
			<br>
		</div>
	</body>
</html>