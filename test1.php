<?php
if($_POST){
	$x=1;
	$f=1;
	while ($x<=$_POST['number']){
		$f=$f*$x;
		$x++;
	}
	echo json_encode($f);
} else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Factorial Value
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.submit').click(function(){
				$.ajax({
				  method: "POST",
				  url: "http://localhost/website/test1.php",
				  dataType: 'json',
				  data: { 'number': $('form#table').find('input#number').val()},
				  success: function(response) {
						$('#output').html(response);
					},
				  error: function(response)	{
				  		alert('Technical Error');
				  }
				});
			});
		});
	</script>
</head>
<body>
<form method="post" name="table" id="table">
	<input name="word" type="hidden" value="">
	<input name="number" id="number" type="number" value="">
	<input name="submit" class="submit" type="button" value="Factorial">
</form>
<div id="output"></div>
</body>
</html>
<?php
}
?>