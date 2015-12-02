<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/connection.php"); ?>
<?php include("/includes/header.php");?>
<?php include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<div id="content" class="container">
		<?php
					$username = $_POST['roll'];
					$name = $_POST['name'];
					$password = $_POST['password'];
					$confirmpassword = $_POST['confirmpassword'];
					$usertype = $_POST['usertype'];
					if($password==$confirmpassword)
					{
						if(strlen($password)<6)
						{
							redirect_to("registration.php?error=3");
						}
						else if($password==$username)
						{
							redirect_to("registration.php?error=2");
						}
						else
						{
							$password = md5($password);
						}
					}
					else
					{
						redirect_to("registration.php?error=1");
					}
					$res = mysqli_query($connect_i,"INSERT into userpass VALUES('{$username}','{$password}','{$name}','{$usertype}')");
					if(isset($res))
					{
						echo "<h3 style =\"text-align:center; color:red;\" >Registration Completed Successfully!!! <br></h3>";
					}
					else
					{
						echo "<h3 style =\"text-align:center; color:red;\" >Registration Not Completed!!! <br></h3>";
					}
					

		?>
</div>
<?php include("/includes/footer.php"); ?>
<?php include("/includes/close.php"); ?>