<?php include("includes/header-in - Copy.php"); ?>
<?php include("includes/connection.php"); ?>
<?php include("includes/functions.php"); ?>
<?php	
	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<div id="content" class="container">
		<div class="row">
			<?php include("includes/leftsidepanel.html"); ?>
		
		<div class="row">
		<div class="col-md-8">
		<div class="panel panel-default panel-problems">
			<div class="panel-heading"><h3 class="panel-title"><div class="badge">SUBMISSIONS</div></h3></div>
		
			<div class="table">
				<table  class="table">
					<thead>
					<tr>
						<th rowspan="2" style="vertical-align: middle;"><div class="badge\">ROLL</div></th>
						<th rowspan="2" style="vertical-align: middle;"><div class="badge\">FILE_NAME</div></th>
						<th rowspan="2" style="vertical-align: middle;"><div class="badge\">PROBLEM_ID</div></th>
						<th rowspan="2" style="vertical-align: middle;"><div class="badge\">LANGUAGE</div></th>
						<th rowspan="2" style="vertical-align: middle;"><div class="badge\">ACTION</div></th>
					</tr>
			  
				
				  <?php
						$sql = "SELECT * FROM SUBMISSTIONS ORDER BY submittedby ASC";
						$RES = mysql_query($sql,$connection);
						while($row = mysql_fetch_array($RES)){
							echo "<tbody><td>{$row[1]}</td><td>{$row[0]}</td><td>{$row[2]}</td><td>{$row[3]}</td>";
							echo "<td><form method=\"post\" action=\"fileopen.php?filename={$row[0]}\" class=\"form\"><div class=\"badge\"><div class=\"form-group\"><button style=\"align:right\" type=\"submit\" data-loading-text=\"Opening in..\" class=\"btn btn-primary\">OPEN</button></div></div></form></td></tbody>";
						}
				  ?>
				
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("includes/footer.php");?>
<?php include("includes/close.php");?>