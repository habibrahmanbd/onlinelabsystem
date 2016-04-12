<?php	include("/includes/header.php");?>
<?php	include("/includes/connection.php");?>
<?php	include("/includes/functions.php");?>
<?php 	include("/includes/session.php"); ?>
<?php	if(!isset($_SESSION["onlinelabsystemusertype"]))
					redirect_to("404.php");
?>
			<div id="content" class="container">
				<div class="row">
							<?php
								include("includes/leftsidepanel.html");
							?>
				
				
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
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>