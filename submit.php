<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php	
	if(!isset($_SESSION["onlinelabsystemusertype"]))
					redirect_to("login.php");
?>
<?php
	$max_file_size=1024;
?>
<div id="content" class="container">
	<div class="row">
		<?php include("includes/leftsidepanel.html"); ?>
		
		<div class="col-md-9 col-md-pull-0">
			
				<?php include("/includes/submitoptions.html"); ?>
			
		</div>
	</div>
</div>


<?php include("includes/footer.php"); ?>
<?php include("includes/close.php"); ?>