<?php	include("/includes/header.php");?>
<?php	include("/includes/connection.php");?>
<?php	include("/includes/functions.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	if(!isset($_SESSION["onlinelabsystemusertype"]))
					redirect_to("404.php");
?>
			<br>
			<br>
			<div id="content" class="container">
				<div class="row">
							<!-- LEFT side of the web pages-->
							<?php
								include("includes/leftsidepanel.html");
							?>
				
							<!--the right side of the web pages ends here.. -->
					<!--this is for the right panel of the problem (such submissions, submit panel) -->
					<!--
					<div class="col-md-3 col-md-push-9">
						<div id="side">
							<div class="panel panel-default panel-contest-timer">
								<div class="panel-heading">
									<h3 class="panel-title text-center">ACM ICPC Dhaka Regional Mock Contest 2015 </h3>
								</div>
								<div class="panel-body">
									<div class="text-center">
										<div class="h2">Finished</div>
									</div>
								</div>
								<div class="panel-footer small">The contest has ended.</div>
							</div>
						</div>
					</div>
					-->
					<!--the right panel of the problem ends here-->
					
					<?php
						$x = $_GET['pro_num'];
						$x = urldecode($x);
						if(isset($x)&& $x>0)
						{
							$pro_num = $x;
						$query = "SELECT * FROM PROBLEMS WHERE PROID = {$pro_num}";
						
						$result = mysql_query($query,$connection);
						$row = mysql_fetch_array($result);
						$pro_name = $row[0].". ".$row[3]."";
						$ml = $row[1];
						$tl = $row[2];
						$des = $row[4];
						$inc = $row[5];
						$outc = $row[6];
						$samin = $row[7];
						$samout = $row[8];
						$ret = "";
						$ret.=fpro($pro_name,$tl,$ml,$des,$inc,$outc,$samin,$samout );
						echo "{$ret}";
						}
						else
						{
							redirect_to("404.php");
						}
					?>
				</div>
			</div>
<?php	include("/includes/footer-in.php");?>
<?php	include("/includes/close.php");?>