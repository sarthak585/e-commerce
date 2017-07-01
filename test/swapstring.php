<!DOCTYPE html>
<html>
<head>
	<title>Swap String</title>
</head>
<body>
	<form method="GET">
		<label>Enter the First Value:</label>
			<input type="text" name="Value1"></br></br>
		<label>Enter the Second Value:</label>
			<input type="text" name="Value2"></br></br>
		<button>Swap</button>	
	</form>
</body>
</html>
<?php

$a=$_GET['Value1'];
$b=$_GET['Value2'];

$c = str_split($a);
$d = str_split($b);

$count = (count($c) > count($d)) ? count($c) : count($d);

echo "<h2>";
for ($i = 0; $i <= $count; ++$i) {
	if (array_key_exists($i, $c)) {
    	echo '<span style="color:red">'.$c[$i].'</span>';
	}
	if (array_key_exists($i, $d)) {
    	echo $d[$i];
	}
}

echo "</h2>";

?>

