<?php include("includes/header.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php	if(!isset($_SESSION["onlinelabsystemusertype"]))
					redirect_to("404.php");
?>
<?php 
	$proid = $_POST['proNum'];
	$lang = $_POST['lang'];
	$username=$_SESSION["olsusername"];
?>
<div id="content" class="container">
	<div class="row">
		<?php include("includes/leftsidepanel.html"); ?>
		<div class="col-md-9 col-md-pull-0">
			<h1 style="color:green;">
				<?php
					   if(isset($_FILES['codes'])){
						  $errors= array();
						  $file_name = $_FILES['codes']['name'];
						  $file_size =$_FILES['codes']['size'];
						  $file_tmp =$_FILES['codes']['tmp_name'];
						  $file_type=$_FILES['codes']['type'];
						  $file_ext=strtolower(end(explode('.',$_FILES['codes']['name'])));
						  
						  $expensions= array("c","cpp","java","asm");
						  
						  if(in_array($file_ext,$expensions)=== false){
							 $errors[]="extension not allowed, please choose a VALID file type.";
						  }
						  
						  if($file_size > 102400){
							 $errors[]='File size must not be larger than 100 KB';
						  }
						  
						  if(empty($errors)==true){
							 move_uploaded_file($file_tmp,"submitted_codes/".$file_name);
							 //echo "you have submitted ".$file_ext."<br>";
							 echo "Your solution submission successful. ";
							 // echo "<br> {$proid} {$lang} {$username}";
							 $sql = "INSERT into submisstions VALUES('{$file_name}','{$username}','{$proid}','{$lang}')";
							 $res = mysqli_query($connect_i, $sql);
							 // if(isset($res))
							// {
								// echo "<h3 style =\"text-align:center; color:red;\" >Problem Updated Successfully!!! <br></h3>";
							// }
							// else
							// {
								// echo "<h3 style =\"text-align:center; color:red;\" >Problem Updating Not Completed!!! <br></h3>";
							// }
						  }
						  else{
							 print_r($errors);
						  }
					   }
					   else{
						echo "FILE CAN NOT BE SUBMITTED!!";
					   }
				?>
			</h1>
			
		</div>
	</div>
</div>


<?php include("includes/footer.php"); ?>
<?php include("includes/close.php"); ?>