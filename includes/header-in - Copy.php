<?php include("/includes/session.php"); ?>

<html>
	<html>
	<head>
		<title> ONLINE LAB SYSTEM </title>
		<link rel="stylesheet" href="stylesheets/googlefont.css">
		<link href="stylesheets/prism.css" rel="stylesheet" />
		<link rel="stylesheet" href="stylesheets/design.css" />
		<script src="javascripts/marshall.js"></script>
	</head>
	<body >
	<script src="javascripts/prism.js"></script>
	<div id="wrap">
		<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
				<div class="container_header">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target="#navbar" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
						</button>
						<a href="/onlinelabsystem/index.php" class="navbar-brand">Online Lab System<sup>&trade;</sup></a>
					</div>
					<!-- those code for the options in the name-panel option -->
					<div id="navbar" class="collapse navbar-collapse">
						<!--
						<ul class="nav navbar-nav">
							<p class="navbar-text"></p>
							<li>
								<a href="/contests">Contests</a>
							</li>
							<p class="navbar-text"></p>
							<li><a href="/contests/icpcdhaka2015mock">Dashboard</a></li>
							<li class="navbar-nav-clarifications">
								<a href="/contests/icpcdhaka2015mock/clarifications"> 
									Clarifications<span style="display:none;">&nbsp;<i class="fa fa-exclamation-circle"></i></span>
								</a>
							</li>
							<li>
								<a href="/contests/icpcdhaka2015mock/standings">Standings</a>
							</li>
							<li>
								<a href="/contests/icpcdhaka2015mock/submissions">Submissions</a>
							</li>
						</ul> -->
						<ul class="nav navbar-nav navbar-right">
							<?php 
							 if(isset($_SESSION["onlinelabsystemusername"])&isset($_SESSION["onlinelabsystempassword"])){
								echo "<li><a href=\"/index.html\" style=\"color:#fff;\"><strong><h5>Hello, {$_SESSION["onlinelabsystemusername"]}</h5></strong></a></li>";
								echo "<li><a href=\"logout.php\" style=\"color:#fff;\"><strong><h5>LOGOUT</h5></strong></a></li>";
							}
							else{
								echo "<li><a href=\"login.php\" style=\"color:#fff;\"><strong><h4>Login</h4></strong></a></li>";
							}
							?>
						</ul>
					</div>
				</div>
		</nav>
		<div id="alerts"></div>
		<br>