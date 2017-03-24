<?php
    include_once '../controller/test.php';
    $controllerTest = new controllerTest();
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
                foreach ($controllerTest->viewTest() as $row) {
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
