<?php
include_once 'connect_db.php';

class category_model {
	function viewCategory() {
		$sql = 'SELECT * FROM category';
		$result = mysql_query($sql);
		
		if (mysql_num_rows($result) > 0) {
			$rows = array();

			// output data of each row
			while($row = mysql_fetch_assoc($result)) {
				$rows[$row['CategoryId']] = $row;
			}

			return $rows;
		} else {
			return 0;
		}
	}
	
	function addCategory($categoryAray) {
		$sql = "INSERT INTO category (Name, Description, IsActive) VALUES('".$categoryAray['Name']."', '".$categoryAray['Description']."', '".$categoryAray['IsActive']."')";
		$result = mysql_query($sql);
		
		return mysql_affected_rows();
	}
	
	function editCategory($id, $categoryAray) {
		$sql = "UPDATE category SET Name = '".$categoryAray['Name']."', Description = '".$categoryAray['Description']."', IsActive = '".$categoryAray['IsActive']."' WHERE CategoryId= ".$id;
		$result = mysql_query($sql);
		
		return mysql_affected_rows();
	}
	
	function deleteCategory($id) {
		$sql = "DELETE FROM category WHERE CategoryId=".$id;
		$result = mysql_query($sql);
		
		return mysql_affected_rows();
	}
}

?>