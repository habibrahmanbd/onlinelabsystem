<?php	include("/includes/header.php");?>
<?php	include("/includes/functions.php");?>
<?php	include("/includes/connection.php");?>
	<div id="content" class="container">
		<div class="row">
		
			<!-- LEFT side of the web pages-->
			<?php
				include("includes/leftsidepanel.html");
			?>

				<!--the right side of the web pages ends here.. -->
		
			<div class="col-md-9 col-md-pull-0">
				<marquee style:\"color:red;\"> <h4 >
					<?php
						$query = "SELECT *FROM BREAKINGS order by ID DESC";
						$RES =  mysql_query($query,$connection);
		
						while($row=mysql_fetch_array($RES))
							echo "<b style=\"color:red;\">{$row[1]}. </b>";
					?>
				<h4></marquee>
				<div id="main">
					<?php
						$query = "SELECT *FROM blog order by postNo DESC";
						$RES =  mysql_query($query,$connection);
		
						while($row=mysql_fetch_array($RES))
						echo "<table> <td><tr><h1><b><a href =\"\">{$row[3]}</a></b></h1>by, <b><i style=\"color:blue;\">{$row[0]}</i></b><h3>{$row[2]}</tr></td></table>";
					?>
				</div>
			</div>
		</div>
	</div>
	
<?php	include("/includes/footer.php");?>
<?php	include("/includes/close.php");?>