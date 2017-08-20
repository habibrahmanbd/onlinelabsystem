<?php	include("/includes/header.php");?>
<?php	include("/includes/functions.php");?>
<?php	include("/includes/connection.php");?>

<?php //include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<?php	$error = $_GET['error'];?>
		<div id="content" class="container">
				<?php
					global $error;
					if(isset($error)){
							echo "".reg_errors($error);
						}
						
				?>
				<!-- LEFT side of the web pages-->
							<?php
								include("includes/leftsidepanel.html");
							?>
				
				<!--the right side of the web pages ends here.. -->
			<div class="col-md-4">
					<div class="col-md-10 col-sm-offset-10">
						<div style="margin-top: 0px;" class="panel panel-default panel-login">
							<div class="panel-heading"><h3 class="panel-title"><div class="badge">Add new students</div></h3></div>
							<div class="panel-body">
								<form method="post" action="registrationcomplete.php" class="form-login">
									<?php echo "".reg_fields(); ?>
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>