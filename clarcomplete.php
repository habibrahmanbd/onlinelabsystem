<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/connection.php"); ?>
<?php include("/includes/header.php");?>
<?php include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<div id="content" class="container">
		<?php		
					$proid=$_POST['proid'];
					$clarid=$_POST['clarid'];
					$clar=$_POST['clar'];
					
					if(isset($proid)&isset($clarid)&isset($clar))
					{
							// echo "{$proid} {$clarid} {$clar} <br>";
							$res = mysqli_query($connect_i,"INSERT INTO `clarifications`(`proid`, `clarid`, `clar`) VALUES ('{$proid}','{$clarid}','{$clar}')");
							if(isset($res))
							{
								echo "<h3 style =\"text-align:center; color:red;\" >New clarification inserted Successfully!!! <br></h3>";
							}
							else
							{
								echo "<h3 style =\"text-align:center; color:red;\" >Clarification Insertion Not Completed!!! <br></h3>";
							}
						
					
					}
					else
					{
						redirect_to("giveclars.php");
					}
					
					

		?>
</div>
<?php include("/includes/footer.php"); ?>
<?php include("/includes/close.php"); ?>