<?php

    $conn = mysqli_connect('localhost', 'root', '');			
    $db = mysqli_select_db($conn, 'test');

    $sql = 'SELECT * FROM testing';
    $rs = mysqli_query($conn, $sql);
    $list = array();

    $name = '';
    while($row = mysqli_fetch_assoc($rs)) {
        $list[] = $row;
        if(isset($_GET['id']) && $_GET['id']==$row['id']){
            $name =  $row['name'];
        }    
    }   
    if(!empty($_POST) || isset($_GET['id'])) {
        if(array_key_exists('addbutton', $_POST) && $_POST['addbutton'] == 'Add') {
            $sql = "INSERT INTO testing(name) VALUES ('" . $_POST['name'] . "')";

            $rs = mysqli_query($conn, $sql);
			
			$id = mysqli_insert_id($conn);
			
			echo json_encode(array('id' => $id, 'name' => $_POST['name']));
            exit;

        } else if(isset($_GET['id'],$_GET['action']) && $_GET['action']=='Edit') {
            if(array_key_exists('savebutton', $_POST) && $_POST['savebutton'] == 'Save'){           
                $sql = "UPDATE testing SET name = '" . $_POST['name'] . "' WHERE id = ".$_GET['id'];
                $rs = mysqli_query($conn, $sql);
                header('location: add_category.php');
            }

        } else if(isset($_GET['id'],$_GET['action']) && $_GET['action']=='Delete'){
                $data = $_GET['id'];
                $sql = "DELETE FROM testing WHERE id=".$data;
                $rs = mysqli_query($conn, $sql);
                header('location: add_category.php');
            }           
        
        /*header('location: add_category.php');*/
    }
?>
<html>
    <head>
        <title>Add Category</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.addbutton').click(function(){
				$.ajax({
				  method: "POST",
				  url: "http://localhost/website/add_category.php",
				  dataType: 'json',
				  data: { 'name': $('form#testForm').find('input#name').val(), 'addbutton': 'Add' },
				  success: function(response) {

						$('.listTable').append("<tr><td>"+response['id']+"</td>"+
                            "<td>"+response['name']+"</td>"+
                            "<td><a href='add_category.php?id="+response['id']+"'>Edit</a>&nbsp;"+
                                "<a href='add_category.php?id="+response['id']+"'>Delete</a>"+
                                "</td>"+
                        "</tr>");
				    },
                  error: function(response){
                        alert('Technical Error');
                  } 
				  
				});
			});
		});
		</script>
    </head>
    <body>
<!-- Insert and Update Form.-->
        <form method="post" name="testForm" id="testForm">
            <input name="name" id="name" type="text" value="<?php echo $name; ?>" placeholder="Enter the Category">
            
            <?php
                if(isset($_GET['id']) && $_GET['id']){ ?>
                    <input name="savebutton"  type="submit" value="Save" placeholder="Save">
                <?php }
                else { ?>
                    <input name="addbutton" class="addbutton" type="button" value="Add" placeholder="Save">
                <?php
                }
                ?>

        </form>

        <!-- List the Data -->
        <table border="1" cellpadding="0" cellspacing="0" class="listTable">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            <?php
                foreach ($list as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                            <a href='add_category.php?id=<?php echo $row['id']; ?>&action=Edit'>Edit</a>
                            <a href='add_category.php?id=<?php echo $row['id']; ?>&action=Delete'>Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>
