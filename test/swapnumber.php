<!DOCTYPE html>
<html>
<head>
	<title>Swap Numbers</title>
</head>
<body>
	<form method="GET">
		<label>Enter the First Value:</label>
			<input type="Numbers" name="Value1"></br></br>
		<label>Enter the Second Value:</label>
			<input type="Numbers" name="Value2"></br></br>
		<button>Swap Numbers</button>	
	</form>
</body>
</html>
<?php

$a=$_GET['Value1'];
$b=$_GET['Value2'];

$temp=$a;
$a=$b;
$b=$temp;

echo nl2br("First Value is:".$a."\n\nSecond Value is:".$b);


?>

