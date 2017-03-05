<?php

include_once "config/config.php";

if (isset($_SESSION['isAuthenticated']) && ($_SESSION['isAuthenticated']==true)) {
	$login_link_name='Logout';
	$login_link='controllers/logout.php';	
}
	
else{
	$login_link_name='Login';
	$login_link='views/registration_view.php';
}		
?>

<div id="header">

	<div class="loginlink"><a href="<?php echo BASE_URL.$login_link; ?>"><?php echo $login_link_name; ?></a></div>

	<h1><a class="welcome" href="<?php echo BASE_URL; ?>">Welcome to the Admin Panel</a></h1>
</div> 
