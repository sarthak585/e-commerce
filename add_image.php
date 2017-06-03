<?php

    $conn = mysqli_connect('localhost', 'root', '');            
    $db = mysqli_select_db($conn, 'test');

    $sql = 'SELECT * FROM testing';
    $rs = mysqli_query($conn, $sql);
    $list = array();

    $name = '';
    $editId = '';
    while($row = mysqli_fetch_assoc($rs)) {
        $list[] = $row;
        if(isset($_POST['id']) && $_POST['id']==$row['id']){
            $name =  $row['name'];
            $editId =  $row['id'];
        }    
    }   
    if(!empty($_POST)) {
        switch ($_POST['action']) {
            
            case 'Add':

                /*
                * Upload file into folder.
                */
                $fileName = time()."_".basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"],"web/images/".$fileName);
                print_r($fileName);
                exit;
                $sql = "INSERT INTO testing(name,image) VALUES ('" . $_POST['name'] . "','" .$fileName. "')";
                $rs = mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);

                echo json_encode(array('id' => $id, 'name' => $_POST['name'], 'image' => $fileName));
                                
                break;
            
            case 'Edit':
                /*
                * Upload file into folder.
                */
                if($_FILES["image"]["name"] == '' && $_POST["editImage"] != ''){
                    $fileName = $_POST["editImage"];
                }
                else {
                    $fileName = time()."_".basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"],"web/images/".$fileName);
                }    
                $sql = "UPDATE testing SET name = '" . $_POST['name'] . "', image = '" .$fileName. "' WHERE id = ".$_POST['id'];
                
                $rs = mysqli_query($conn, $sql);

                echo json_encode(array('name' => $_POST['name'], 'image' => $fileName));
                
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
        <title>Add Image</title>
        <script src="http://localhost/website/web/js/JqueryLibrary.js"></script>
        <script>
            function ajaxPost(id,actionName){
                $('#action').val(actionName);
                $('.editId').val(id);
                $.ajax({
                  method: "POST",
                  url: "http://localhost/website/add_image.php",
                  dataType: 'json',
                  data: new FormData($('#testForm')[0]),
                  contentType: false,
                  cache:false,
                  processData: false,
                  success: function(response) {
                        if (actionName=='Add'){
                            $('.listTable').append('<tr><td class="list_'+response['id']+'">'+response['id']+'</td>'+
                                '<td class="list_name_'+response['id']+'">'+response['name']+'</td>'+
                                '<td class="list_image_'+response['id']+'">'+                                  '<img src="web/images/'+response['image']+'" alt="Smiley Face" height="70" width="70"/>'+
                                '</td>'+
                                '<td><input onclick="editClick('+response['id']+',\''+response['name']+'\',\''+response['image']+'\');" type="button" value="Edit">&nbsp;'+
                                    '<input onclick="ajaxPost('+response['id']+',\'Delete\');" type= "button" value="Delete">'+
                                    '</td>'+
                            '</tr>');
                            $('form#testForm').find('input#name').val('');
                            $('form#testForm').find('input#image').val('');
                        }    
                        else if (actionName=='Delete'){
                            $('.list_'+id).closest( 'tr').remove();
                            $('.addbutton').val('Add');
                            $('form#testForm').find('input#name').val('');
                            $('form#testForm').find('#editImage').html('');
                            $('#action').val('Add');
                            $('form#testForm').find('input#image').val('');

                        }
                        else if (actionName=='Edit') {
                            $('.list_name_'+id).html(response['name']);
                            $('.list_image_'+id).html('<img src="web/images/'+response['image']+'" alt="Smiley Face" height="70" width="70"/>');
                            $('.addbutton').val('Add');
                            $('form#testForm').find('input#name').val('');
                            $('form#testForm').find('#editImage').html('');
                            $('#action').val('Add');
                            $('form#testForm').find('input#image').val('');
                        }
                    },
                  error: function(response){
                        alert('Technical Error');
                    } 
                  
                });
            };
            function editClick(id,name,image){
                $('form#testForm').find('input#name').val(name);
                $('form#testForm').find('input.editImage').val(image);
                $('form#testForm').find('#editImage').html('<img src="web/images/'+image+'" alt="Smiley Face" height="70" width="70"/>');
                $('.addbutton').val('Save');
                $('#action').val('Edit');
                $('.editId').val(id);
            }
            $(document).ready(function (e) {          
                $('form#testForm').on('submit',(function(e) {
                    e.preventDefault();
                    ajaxPost($('.editId').val(),$('#action').val());
                }));    
            });    
        </script>
    </head>
    <body>
<!-- Insert and Update Form.-->
        <form  enctype="multipart/form-data" method="post" name="testForm" id="testForm">

            <input type="hidden" name="action" id="action" value="Add">
            <input type="hidden" name="id" class="editId" value="<?php echo $editId; ?>">
            <input type="hidden" name="editImage" class="editImage">

            <input name="name" id="name" type="text" value="<?php echo $name; ?>" placeholder="Enter the Category">

            <input name="image" id="image" type="file"  placeholder="Select the Image">

            <div id="editImage"></div>
            
            <input name="addbutton" class="addbutton" type="submit" value="Add" placeholder="Save">
               
        </form>

        <!-- List the Data -->
        <table border="1" cellpadding="0" cellspacing="0" class="listTable">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Action</th> 
            </tr>
            <?php
                foreach ($list as $row) {
                    ?>
                    <tr>
                        <td class="list_<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                        <td class="list_name_<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
                        <td class="list_image_<?php echo $row['id']; ?>">
                            <img src="web/images/<?php echo $row['image']; ?>" alt="Smiley Face" height="70" width="70"/>
                        </td>      
                        <td>
                            <input type="button" value="Edit" onclick="editClick(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>','<?php echo $row['image'];?>')">
                            <input type="button" value="Delete" onclick="ajaxPost(<?php echo ($row['id']); ?>, 'Delete')">
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>