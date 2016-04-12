<?php	include("/includes/header.php"); ?>
<?php	include("/includes/connection.php"); ?>
<?php	require_once("/includes/functions.php"); ?>
<?php include("/includes/session.php"); ?>
<?php	if($_SESSION["onlinelabsystemusertype"]!="admin")
					redirect_to("404.php");
?>
<div id="content" class="container">
	<div class="row">
			
				<!-- LEFT side of the web pages-->
					<?php
						include("includes/leftsidepanel.html");
					?>			
				
				<div class="col-md-9 col-md-pull-0">
					<div id="main">
						<div class="panel panel-default panel-problems">
							<div class="panel-heading">
								<h3 class="panel-title">SELECT AN ACTION FOR PERFORM</h3>
							</div>
							<div class="list-group">
							
								<!--  -----------those are the links of the actions------    -->
								<?php
									$query = "SELECT * FROM ADMINACTIONS";
									$result = mysql_query($query, $connection);
									while($row = mysql_fetch_array($result))
									{
										$ACTIONID = $row[0];
										$ACTIONS = $row[1];
										$ret  = AD_AC($ACTIONID, $ACTIONS);
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
<?php	include("/includes/footer.php"); ?>
<?php	include("/includes/close.php"); ?>