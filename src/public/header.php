<?php
if(!isset($_SESSION)) session_start();
?>
<style>
<!--
body {
	font-family: Arial;
	background-color:#f0f0ff;
	padding:12px;
}

-->
</style>

<div style="background-color:#BDF">
	<div style="float:left; padding:12px; display:block; height:95px">
	<img src="images/logo-rmp.jpg" height="105" width="200" />
	</div>
	<div style="padding:12px; display:block; height:70px">
		<span style="font-size:28px">"Ça roule ma poule"</span>
		<span style="font-size:20px; line-height:80px"> / Rent your car in France!</span>

		<div style="float:right; padding:12px; line-height:80px">
			<a href="/index.php">Home</a> - 

			<?php
			if (isset($_SESSION['user_logged'])) :
			?>
				<a href="action.php?do=showfrontuser">My Account</a> -
				<a href="action.php?do=logout">Logout</a>

			<?php
			if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) :
			?>
				<?php // acces admin uniquement si user > admin=1 ?>
				- <a href="indexadmin.php">Admin access</a> 
			<?php endif; ?>


			<?php else : ?>
				<a href="loginuser.php">Login</a>
			<?php endif; ?>
		</div>
	</div>
	<br />
	<hr>
</div>
