<!DOCTYPE html>
<html>
<head>
	<title>
		Fibonacci Series
	</title>
</head>
<body>
<form method="post" name="table">
	<input name="word" type="hidden" value="">
	<input name="number" type="number" value="">
	<input name="submit" type="submit" value="Fibonacci Series">
</form>	
</body>
</html>

<?php
if($_POST){
$n=$_POST['number'];
  function Fibonacci($n)
   {
   
    $first = 0;
    $second = 1;
   
    echo "Fibonacci Series \n";
   
    echo $first.' '.$second.' ';
   
    for($i = 2; $i < $n; $i++){
   
      $third = $first + $second;
   
      echo $third.' ';
   
      $first = $second;
      $second = $third;
   
      }
  }

  Fibonacci($n);
}
?>
