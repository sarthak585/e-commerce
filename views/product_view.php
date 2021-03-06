<?php
include_once '../config/config.php';
include_once '../controllers/product.php';
?>
<html>
    <!--HTML Header-->
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../web/css/admin_style.css" />
		<script language="JavaScript" type="text/javascript">
			function checkDelete(productId,CategoryId){
			if(confirm('Are you sure to delete?') == true) {
			window.location.href = "http://localhost/website/controllers/product.php?action=delete&id="+productId+"&CategoryId="+CategoryId;
			}
			}
		</script>
	</head>
    <!--HTML Body-->
	<body>
    <?php
    include_once '../header.php';
    include_once '../sidebar.php';
    ?>

        <!--main content on the page-->
		<div id="content">
            <!--Heading - Display Category Name-->
            <h1>Manage <?php echo $categoryList[$categoryid]['Name'];?></h1>

            <!--Add/Update form-->
            <form enctype="multipart/form-data" method="post" name="updateProduct" action="../controllers/product.php?action=update&id=<?php echo $id; ?>&CategoryId=<?php echo $categoryid;?>">
                <table id='formView' width="1000" border="0" align="center">
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="image" id="fileToUpload" value="<?php echo $id ? $productList[$id]['Image'] : ''; ?>">
                            <input type="hidden" name="hiddenimage" value="<?php echo $id ? $productList[$id]['Image'] : ''; ?>">
                            <?php
                                if($id){
                            ?>
                                    <img src="../web/images/<?php echo $productList[$id]['Image']; ?>" alt="Smiley face" height="100" width="135" />
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php echo $id ? $productList[$id]['Name'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>SKU</td>
                        <td><input type="text" name="sku" value="<?php echo $id ? $productList[$id]['SKU'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><input type="text" name="type" value="<?php echo $id ? $productList[$id]['Type'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" value="<?php echo $id ? $productList[$id]['Price'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right" style="float:right;"><input type="submit" name="save" value="Save"></td>
                    </tr>
                </table>
			</form>

            <!--Listing - products-->
			<table id='listView' width="1000" border="2" align="center">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>SKU</th>
					<th>Type</th>
					<th>Price</th>
					<th>Actions</th>
				</tr>
                <!--loop through product data-->
				<?php					
					if ($productList){
						foreach($productList as $productValue) {
				?>
							<tr>
								<td><img src="../web/images/<?php echo $productValue['Image']; ?>" alt="Smiley face" height="100" width="135"></td>
								<td><?php echo $productValue['Name'];?></td>
								<td><?php echo $productValue['SKU'];?></td>
								<td><?php echo $productValue['Type'];?></td>
								<td><?php echo $productValue['Price'];?></td>
								<td>
									<a href="product_view.php?CategoryId=<?php echo $categoryid;?>&id=<?php echo $productValue['ProductId'];?>">
										<img src="../web/images/admin/Edit.png" height="25px" width="25px"></a>
									<a onclick="return checkDelete(<?php echo $productValue['ProductId']; ?>,<?php echo $categoryid; ?>);" style="cursor: pointer;">
										<img src="../web/images/admin/DeleteRed.png" height="25px" width="25px"></a>		
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