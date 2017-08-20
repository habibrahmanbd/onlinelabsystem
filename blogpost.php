<?php	include("/includes/header.php");?>
<?php	include("/includes/functions.php");?>
<?php	include("/includes/connection.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>

		<div id="content" class="container">

				<?php
				?>
			<div class="row">
							
							<!-- LEFT side of the web pages-->
							<?php
								include("includes/leftsidepanel.html");
							?>
				
							<!--the right side of the web pages ends here.. -->
					<div class="col-md-9 col-md-pull-0">
					<h2 style = 'color:red;'>Make sure that your Blog are in HTML Format. <br>All " is started with a '\'(Backslash).</h2>

						<div style="margin-top: 50px;" class="panel panel-default">
							<div class="panel-heading"><h3 class="panel-title"><div class="badge">Blog Post</div></h3></div>
							<div class="panel-body">
								<form method="post" action="blogcomplete.php" class="form-login">
									<?php echo "".blog_fields("",""); ?>
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>