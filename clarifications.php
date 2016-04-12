<?php include("includes/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php include("includes/connection.php"); ?>
<div id="content" class="container">
	<div class="row">
		<!-- LEFT side of the web pages-->
		<?php include("includes/leftsidepanel.html"); ?>
		<!--the right side of the web pages ends here.. -->
		<div class="col-md-9 col-md-pull-0">
			<div id="main">
				<div class="panel panel-default panel-problems">
					<div class="panel-heading">
						<h3 class="panel-title"><div class="badge"><?php if(!isset($_GET['pro_num'])) echo "SELECT THE PROBLEM TO SEE THE CLARIFATION OF THAT PROBLEM."; else echo "CLARIFICATIONS"; ?></div></h3>
					</div>
					<div class="list-group">
					<?php
						if(!isset($_GET['pro_num']))
						{
						// <!--  -----------those are the links of the problems------    -->
							$query = "SELECT * FROM PROBLEMS";
							$result = mysql_query($query, $connection);
							while($row = mysql_fetch_array($result))
							{
								$pro_num = $row[0];
								$pro_name = $row[3];
								$ret  = pro_clar($pro_num, $pro_name);
								echo "{$ret}";
							}
						}	
						else
						{
							$proid = $_GET['pro_num'];
							$query = "SELECT *FROM CLARIFICATIONS";
							$result = mysql_query($query, $connection);
							while($row = mysql_fetch_array($result))
							{
								if($proid==$row[0]){
								$pro_num = $row[1];
								$pro_name = $row[2];
								
								$ret  = pro_clar_show($pro_num, $pro_name);
								echo "{$ret}";
								}
							}
						}
					?>
							
					
					<?php
						
					?>
								
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("includes/footer.php"); ?>
<?php include("includes/close.php"); ?>