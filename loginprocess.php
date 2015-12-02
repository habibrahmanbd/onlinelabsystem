<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/connection.php"); ?>
<?php include("/includes/header.php"); echo'<br>'; ?>
<?php include("/includes/session.php"); ?>


<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//echo "{$username} : {$password} </br>";
?><?php
	//session_start();
	$_SESSION["onlinelabsystemusername"] = $username;
	$_SESSION["olsusername"] = $username;
	$_SESSION["onlinelabsystempassword"] = $password;
	
	//echo "{$username} : {$password} </br>";
?>
<?php
			$password = md5($password);
			$result = mysql_query("SELECT *FROM userpass WHERE Username=\"{$username}\" AND Password = \"{$password}\"",$connection);
			$row = mysql_fetch_array($result);
			$_SESSION["onlinelabsystemusername"] = $row[2];
			$_SESSION["onlinelabsystemusertype"] = $row[3];
			//echo " USERNAME: ".$row[0]." PASSWORD: ".$row[1]." TYPE: ".$row[2]."<br>";
			echo '<br><br><br>';
			if($row[3]=="admin")
			{
				echo 'Hello <br>';
				redirect_to("index.php");
			}
			else if($row[3]=="user")
			{
				echo 'Usertype: >>'.$row[2].'<br>';
				redirect_to("index.php");
			}
			else
			{
				redirect_to("login.php?error=1");
			}
?>
</div>

<?php include("/includes/footer.php"); ?>
<?php include("/includes/close.php"); ?>