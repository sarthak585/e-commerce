<?php
    //connect db.
    $conn = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($conn, 'test');

    //select query and create list.
    $sql = 'SELECT * FROM testing';
    $rs = mysqli_query($conn, $sql);

    $list = array();
    while($row = mysqli_fetch_assoc($rs)) {
        $list[] = $row;
    }

    //insert query.
    if(!empty($_POST)) {
        if($_POST['submit'] == 'Add') {
            $sql = "INSERT INTO testing(name) VALUES ('" . $_POST['name'] . "')";
            $rs = mysqli_query($conn, $sql);
        } else if($_POST['submit'] == 'Edit') {
            $sql = "UPDATE testing SET name = '" . $_POST['name'] . "' WHERE id = ".$_POST['id'];
            $rs = mysqli_query($conn, $sql);
        } else if($_POST['submit'] == 'Delete') {
            $sql = "DELETE FROM testing WHERE id = ". $_POST['id'];
            $rs = mysqli_query($conn, $sql);
        }
        header('location: test.php');
    }
?>
<html>
    <head>
        <title>Test Site</title>
    </head>
    <body>
        <!-- Insert and Update Form.-->
        <form method="post" name="testForm">
            <input name="name" type="text" value="" placeholder="Enter Name">
            <input name="id" type="number" value="" placeholder="Enter this value for edit and delete">
            <input name="submit" type="submit" value="Add" placeholder="Save">
            <input name="submit" type="submit" value="Edit" placeholder="Save">
            <input name="submit" type="submit" value="Delete" placeholder="Save">
        </form>

        <!-- List the Data -->
        <table border="1" cellpadding="0" cellspacing="0">
            <tr>
                <th>Id</th>
                <th>Name</th>
<!--                <th>Actions</th>-->
            </tr>
            <?php
                foreach ($list as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
<!--                        <td><input type="button" value="Edit"><input type="button" value="Delete"></td>-->
                    </tr>
                    <?php
                }
            ?>
        </table>

    </body>
</html>
