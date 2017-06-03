<!DOCTYPE html>
<html>
<head>
	<title>
		Prime Number Check
	</title>
</head>
<body>
<form method="post" name="table">
	<input name="word" type="hidden" value="">
	<input name="number" type="number" value="">
	<input name="submit" type="submit" value="Prime?">
</form>	
</body>
</html>

<?php
if($_POST){
$n=$_POST['number'];
function IsPrime($n)  
{  
 for($x=2; $x<$n; $x++)  
   {  
      if($n%$x ==0)  
          {  
           return 0;  
          }  
    }  
  return 1;  
   }  
$a = IsPrime($n);  
if ($a==0)  
echo 'This is not a Prime Number.....'."\n";  
else  
echo 'This is a Prime Number..'."\n";  
}
?>