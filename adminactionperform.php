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
					
					<?php
						$x = $_GET['actionid'];
						$x = urldecode($x);
						if(isset($x)&& $x>0)
						{
							$actionid = $x;
							
							
							
							switch($actionid)
							{
							
							
							
								case 1:
									redirect_to("insertupdatepage.php?action=1");
									break;
									
									
									
									
								case 2:
								{
									$query = "SELECT * FROM PROBLEMS";
									$result = mysql_query($query, $connection);
									while($row = mysql_fetch_array($result))
									{
										$pro_num = $row[0];
										$pro_name = $row[3];
										$ret  = pro_del_link($pro_num, $pro_name);
										echo "{$ret}";
									}
									break;
								}
								
								
								
								
								
								case 3:
									redirect_to("problemsareaforupdate.php");
									break;
									
									
									
								case 4:
									redirect_to("registration.php");
									break;
									
									
									
								case 5:
									redirect_to("checksubs.php");
									break;
									
									
									
								case 6:
									redirect_to("giveclars.php");
									break;
									
								case 7:
									redirect_to("problemsarea.php");
									break;
									
								default:
									redirect_to("404.php");
									break;
							}
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