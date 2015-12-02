<?php include("includes/header-in - Copy.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php	
	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<?php
	$file_name = $_GET['filename'];
?>
<div id="content" class="container">
	<div class="row">
		<?php include("includes/leftsidepanel.html"); ?>
		
		  <?php
			 $filename = "submitted_codes/{$file_name}";
			 echo "<br><div class=\"badge\" style='color:black;'>{$file_name}</div><br>";
			 $file_ext=strtolower(end(explode('.',$filename)));
			 $file = fopen( $filename, "r" );
			 
			 if( $file == false )
			 {
				echo ( "Error in opening file" );
				exit();
			 }
			 
			 $filesize = filesize( $filename );
			 $filetext = fread( $file, $filesize );
			 fclose( $file );
			 
			 // echo ( "File size : $filesize bytes" );
			 echo "<pre><textarea rows=\"50\" cols=\"120\" style:'color:black;'>".htmlspecialchars($filetext)."</textarea></pre>";
		  ?>
	</div>
</div>
<?php include("includes/footer.php");?>
<?php include("includes/close.php");?>