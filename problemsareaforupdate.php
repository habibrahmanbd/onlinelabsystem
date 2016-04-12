<?php	include("/includes/header.php");?>
<?php	include("/includes/connection.php");?>
<?php	include("/includes/functions.php");?>
<?php 	include("/includes/session.php"); ?>

<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
		<div id="content" class="container">
			<div class="row">
			
				<!-- LEFT side of the web pages-->
				<?php include("includes/leftsidepanel.html"); ?>
				<!--the right side of the web pages ends here.. -->
				
				<div class="col-md-9 col-md-pull-0">
					<div id="main">
						<div class="panel panel-default panel-problems">
							<div class="panel-heading">
								<h3 class="panel-title"><div class="badge">Problems</div></h3>
							</div>
							<div class="list-group">
							
								<!--  -----------those are the links of the problems------    -->
								<?php
									$query = "SELECT * FROM PROBLEMS";
									$result = mysql_query($query, $connection);
									while($row = mysql_fetch_array($result))
									{
										$pro_num = $row[0];
										$pro_name = $row[3];
										$ret  = pro_link_update($pro_num, $pro_name);
										echo "{$ret}";
									}
								?>
								
							</div>
						</div>
						<!-- Clarifications panel goes here -->
						<!-- 
						<div class="panel panel-default panel-clarifications">
							<div class="panel-heading">
								<div class="pull-right small"></div>
								<h3 class="panel-title">Clarifications<small> (<a href="/contests/icpcdhaka2015mock/clarifications">See all..</a>)</small></h3>
							</div>
							<div class="list-group"></div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
<?php	include("/includes/footer-in.php"); ?>
<?php	include("/includes/close.php"); ?>