<?php	require_once("/includes/functions.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	include("/includes/header-in.php");?>

<?php	$error = $_GET['error'];?>
			<div id="content" class="container">
				<?php
					global $error;
					if(isset($error))
						echo "<h3 style=\"text-align:center; color:red;\">PASSWORD or USERNAME not matched!!</h3>";
				?>
							
				<div class="row-fluid">
					<div class="col-md-4 col-sm-offset-4">
						<div style="margin-top: 96px;" class="panel panel-default panel-login">
							<div class="panel-heading"><h3 class="panel-title"><div class="badge">Login</div></h3></div>
							<div class="panel-body">
								<form method="post" action="loginprocess.php" class="form-login">
										<input type="hidden" name="_csrf" value="gQWMdjRc-Di11h23hqMYf2y8VcXsybNhc-sw">
										<div class="form-group">
											<label for="inputUsername" class="control-label">Username</label>
											<input id="inputUsername" type="username" name="username" required class="form-control">
										</div>
										<div class="form-group">
											<label for="inputPassword" class="control-label">Password</label>
											<input id="inputPassword" type="password" name="password" required class="form-control">
										</div>
										<br>
										 <div class="form-group">
											<button style="align:right" type="submit" data-loading-text="Logging in.." class="btn btn-primary">Login</button>
											<!-- <a href="reset" class="btn btn-link">Reset password</a> -->
										</div> 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php	include("/includes/footer-in.php");?>