<?php	include("/includes/header.php");?>
<?php	include("/includes/functions.php");?>
<?php	include("/includes/connection.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<?php	
	$action = $_GET['action'];
?>
		<div id="content" class="container">

				<?php
					$proid="";
					$memlmt=0.0;
					$timelmt=0.0;
					$proname="";
					$prodes="";
					$proincon="";
					$prooutcon="";
					$proinsam="";
					$prooutsam="";	
					if($action==1){
					}
					else if($action==2)
					{
						$pro_num = $_GET['pro_num'];
						$query = "SELECT * FROM PROBLEMS WHERE PROID = {$pro_num}";
						$result = mysql_query($query,$connection);
						$row = mysql_fetch_array($result);
						$proid .= $row[0];
						$memlmt=$row[1];
						$timelmt=$row[2];
						$proname.=$row[3];
						$prodes.=$row[4];
						$proincon.=$row[5];
						$prooutcon.=$row[6];
						$proinsam.=$row[7];
						$prooutsam.=$row[8];
					}
					else
						redirect_to("404.php");
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
							<div class="panel-heading"><h3 class="panel-title"><div class="badge">Insert/Update Problems</div></h3></div>
							<div class="panel-body">
								<form method="post" action="insertupdatecomplete.php?action=<?php echo "{$action}"; ?>" class="form-login">
									<?php echo "".insert_update_fields($proid, $memlmt, $timelmt, $proname, $prodes, $proincon, $prooutcon, $proinsam, $prooutsam,$action); ?>
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>