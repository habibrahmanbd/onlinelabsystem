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
			 echo "<pre><code class=\"language-{$file_ext}\" style='font-size:20px;'>".htmlspecialchars($filetext)."</code></pre>";
		  ?>
		<div class="row" align="center">
			<div class="col-md-9">
				<form method="post" action="filetext.php?filename=<?php echo "{$file_name}"; ?>" class="form">
					<div class="form">
						<button type="submit" data-loading-text="Opening.." class="btn btn-primary">COPY TEXTS</button>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("includes/footer.php");?>
<?php include("includes/close.php");?>