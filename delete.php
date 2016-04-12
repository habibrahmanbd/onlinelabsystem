<?php	include("/includes/header.php");?>
<?php	include("/includes/connection.php");?>
<?php	include("/includes/functions.php");?>
<?php include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
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
					
					<?php
						$x = $_GET['pro_num'];
						$pro_num=0;
						if(isset($x)&& $x>0)
						{
						
							$pro_num = $x;
							$sql = "DELETE FROM `problems` WHERE PROID='".$pro_num."' LIMIT 1";
							$retval = mysql_query( $sql, $connection );
							if(! $retval )
							{
							  die("Problem#{$pro_num} can not delete.");
							}
							echo "Problem#{$pro_num} deleted successfully\n";
							
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