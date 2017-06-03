<?php

    $conn = mysqli_connect('localhost', 'root', '');            
    $db = mysqli_select_db($conn, 'test');

    $sql = 'SELECT * FROM testing';
    $rs = mysqli_query($conn, $sql);
    $list = array();

    $name = '';
    while($row = mysqli_fetch_assoc($rs)) {
        $list[] = $row;
        if(isset($_POST['id']) && $_POST['id']==$row['id']){
            $name =  $row['name'];
        }    
    }   
    if(!empty($_POST)) {
        switch ($_POST['action']) {
            
            case 'Add':
                
                $sql = "INSERT INTO testing(name) VALUES ('" . $_POST['name'] . "')";

                $rs = mysqli_query($conn, $sql);
                
                $id = mysqli_insert_id($conn);
                
                echo json_encode(array('id' => $id, 'name' => $_POST['name']));
                
                break;
            
            case 'Edit':

                $sql = "UPDATE testing SET name = '" . $_POST['name'] . "' WHERE id = ".$_POST['id'];
                
                $rs = mysqli_query($conn, $sql);

                echo json_encode(array('name' => $_POST['name']));
                
                break;

            case 'Delete':

                $data = $_POST['id'];

                $sql = "DELETE FROM testing WHERE id=".$data;
                
                $rs = mysqli_query($conn, $sql);

                echo json_encode(array('success'=> true));
                    
                break;
        }
        exit;
    }
?>
<html>
    <head>
        <title>Add Category</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			function ajaxPost(id,actionName){
				$.ajax({
				  method: "POST",
				  url: "http://localhost/website/add_category.php",
				  dataType: 'json',
				  data: { 'id': id, 'name': $('form#testForm').find('input#name').val(), 'action': actionName },
				  success: function(response) {
                        if (actionName=='Add'){
    						$('.listTable').append('<tr><td class="list_'+response['id']+'">'+response['id']+'</td>'+
                                '<td class="list_name_'+response['id']+'">'+response['name']+'</td>'+
                                '<td><a onclick="editClick('+response['id']+',\''+response['name']+'\');" style="cursor:pointer; text-decoration: underline; color: blue;">Edit</a>&nbsp;'+
                                    '<a onclick="ajaxPost('+response['id']+',\'Delete\');" style="cursor:pointer; text-decoration: underline; color: blue;">Delete</a>'+
                                    '</td>'+
                            '</tr>');
                            $('form#testForm').find('input#name').val('');
                        }    
                        else if (actionName=='Delete'){
                            $('.list_'+id).closest( 'tr').remove();
                        }
                        else if (actionName=='Edit') {
                            $('.list_name_'+id).html(response['name']);
                            $('.addbutton').val('Add');
                            $('form#testForm').find('input#name').val('');
                            $('.addbutton').attr('onclick',"ajaxPost(0,\'Add\')");
                        }
				    },
                  error: function(response){
                        alert('Technical Error');
                    } 
				  
				});
			};
            function editClick(id,name){
                $('form#testForm').find('input#name').val(name);
                $('.addbutton').val('Save');
                $('.addbutton').attr('onclick',"ajaxPost("+id+",\'Edit\')");
            }
		</script>
    </head>
    <body>
<!-- Insert and Update Form.-->
        <form method="post" name="testForm" id="testForm">
            <input name="name" id="name" type="text" value="<?php echo $name; ?>" placeholder="Enter the Category">
            
            <input onclick="ajaxPost(0, 'Add')" name="addbutton" class="addbutton" type="button" value="Add" placeholder="Save">
               
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
                        <td class="list_<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                        <td class="list_name_<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
                        <td>
                            <a onclick="editClick(<?php echo ($row['id']); ?>, '<?php echo ($row['name']); ?>')" style="cursor:pointer; text-decoration: underline; color: blue;">Edit</a>
                            <a onclick="ajaxPost(<?php echo ($row['id']); ?>, 'Delete')" style="cursor:pointer; text-decoration: underline; color: blue;">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>