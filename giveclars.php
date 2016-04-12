<?php	include("/includes/header.php");?>
<?php	include("/includes/functions.php");?>
<?php	include("/includes/connection.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
		<div id="content" class="container">

				<?php
					$proid="";
					$clarid="";
					$clar="";	
					
						// $pro_num = $_GET['pro_num'];
						// $query = "SELECT * FROM PROBLEMS WHERE PROID = {$pro_num}";
						// $result = mysql_query($query,$connection);
						// $row = mysql_fetch_array($result);
						// $proid .= $row[0];
						// $memlmt=$row[1];
						// $timelmt=$row[2];
						// $proname.=$row[3];
						// $prodes.=$row[4];
						// $proincon.=$row[5];
						// $prooutcon.=$row[6];
						// $proinsam.=$row[7];
						// $prooutsam.=$row[8];
					
				?>
			<div class="row">
							
							<!-- LEFT side of the web pages-->
							<?php
								include("includes/leftsidepanel.html");
							?>
				
							<!--the right side of the web pages ends here.. -->
					<div class="col-md-9 col-md-pull-0">
					<h2 style = 'color:red;'>Make sure that your problem descriptions are in HTML Format. <br>All " is started with a '\'(Backslash).</h2>

						<div style="margin-top: 50px;" class="panel panel-default">
							<div class="panel-heading"><h3 class="panel-title"><div class="badge">Insert Clarifications</div></h3></div>
							<div class="panel-body">
								<form method="post" action="clarcomplete.php" class="form-login">
									<?php echo "".clar_fields($proid, $clarid, $clar); ?>
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>