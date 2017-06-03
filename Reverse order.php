<!DOCTYPE html>
<html>
<head>
	<title>
		Reverse Order
	</title>
</head>
<body>
<form method="post" name="table">
	<input name="word" type="hidden" value="">
	<input name="number" type="number" value="">
	<input name="submit" type="submit" value="Reverse the Number">
</form>	
</body>
</html>

<?php
if($_POST){
$x=$_POST['number'];
/*$r=0;
while ($x != 0)
{
$r = $r * 10 + $x % 10;
//below cast is essential to round remainder towards zero
$x = (int)($x / 10); 
}*/
$r=strrev($x);
 
echo "Reverse number: $r";
}
?>