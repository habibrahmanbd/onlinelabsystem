<?php require_once("/includes/functions.php"); ?>
<?php include("/includes/connection.php"); ?>
<?php include("/includes/header.php");?>
<?php include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<?php $action= $_GET['action'];?>
<div id="content" class="container">
		<?php		
					$proid=$_POST['proid'];
					$memlmt=$_POST['memlmt'];
					$timelmt=$_POST['timelmt'];
					$proname=$_POST['proname'];
					$prodes=$_POST['prodes'];
					$proincon=$_POST['proincon'];
					$prooutcon=$_POST['prooutcon'];
					$proinsam=$_POST['proinsam'];
					$prooutsam=$_POST['prooutsam'];
					
					if(isset($proid)&isset($memlmt)&isset($timelmt)&isset($proname)&isset($prodes)&isset($proincon)&isset($prooutcon) & isset($proinsam) & isset($prooutsam))
					{
						if($action==1){
							$res = mysqli_query($connect_i,"INSERT into problems VALUES('{$proid}',{$memlmt},{$timelmt},'{$proname}','{$prodes}','{$proincon}','{$prooutcon}','{$proinsam}','{$prooutsam}')");
							if(isset($res))
							{
								echo "<h3 style =\"text-align:center; color:red;\" >New Problem inserted Successfully!!! <br></h3>";
							}
							else
							{
								echo "<h3 style =\"text-align:center; color:red;\" >Problem Insertion Not Completed!!! <br></h3>";
							}
						}
						else if($action==2)
						{
								$res = mysqli_query($connect_i,"UPDATE `problems` SET `MEMLMT`={$memlmt},`TIMELMT`={$timelmt},`PRONAME`='{$proname}',`PRODES`='{$prodes}',`PROINCON`='{$proincon}',`PROOUTCON`='{$prooutcon}',`PROINSAM`='{$proinsam}',`PROOUTSAM`='{$prooutsam}' WHERE proid='{$proid}'");
							if(isset($res))
							{
								echo "<h3 style =\"text-align:center; color:red;\" >Problem Updated Successfully!!! <br></h3>";
							}
							else
							{
								echo "<h3 style =\"text-align:center; color:red;\" >Problem Updating Not Completed!!! <br></h3>";
							}
						}
					
					}
					else
					{
						redirect_to("admin.php");
					}
					
					

		?>
</div>
<?php include("/includes/footer.php"); ?>
<?php include("/includes/close.php"); ?>