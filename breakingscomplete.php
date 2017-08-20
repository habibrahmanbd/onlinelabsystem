<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/connection.php"); ?>
<?php include("/includes/header.php");?>
<?php include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<div id="content" class="container">
		<?php		
					$id=$_POST["id"];
					$head=$_POST["head"];
					$userName=$_SESSION["onlinelabsystemusername"];
					
					//echo "".$title." ".$des;
					if(isset($id)&isset($head))
					{
						
							$res = mysqli_query($connect_i,"INSERT into Breakings (`ID`, `HEADLINE`) VALUES(\"{$id}\",\"{$head}\")");
							if(isset($res))
							{
								echo "<h3 style =\"text-align:center; color:red;\" >HEADLINE Posted Successfully!!! <br></h3>";
							}
							else
							{
								echo "<h3 style =\"text-align:center; color:red;\" >HEADLINE Not successfully Inserted!!! <br></h3>";
							}
					
					}
					else
					{
						//echo "".$title." ".$des."".$userName;
						redirect_to("admin.php");
					}
					
					

		?>
</div>
<?php include("/includes/footer.php"); ?>
<?php include("/includes/close.php"); ?>