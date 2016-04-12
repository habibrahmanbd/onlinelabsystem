<?php	include("/includes/header-in.php");?>
<?php include("/includes/session.php"); ?>
<?php include("/includes/functions.php"); ?>

<div id="content" class="container">
<div class="row-fluid">
	<?php 
		//session_start();
		$_SESSION["onlinelabsystemusername"]=NULL;
		$_SESSION["onlinelabsystempassword"]=NULL;
		$_SESSION["onlinelabsystemusertype"]=NULL;
	?>
	<pre><h3 style='color:red;text-align:center;'>Logout Successful... You are welcome!!</h3></pre>
	<?php
		echo "<pre><h3 style='color:red;text-align:center;'><a href=\"login.php\">To LOGIN Click Here</a></h3></pre>";
		// sleep(3);
		// redirect_to("/onlinelabsystem/index.php");
	?>
	</div>
</div>
<?php
	include("/includes/footer.php");
?>
