<?php	include("/includes/header.php");?>
<?php 	include("/includes/session.php"); ?>

<table	id="structure">
	<tr>
		<td id="navigation">
			&nbsp;
		</td>
		
		<td id="page">
			<h2>Administration Area</h2>
			<p>Welcome to Arena</p>
			<ul>
				<li> <a href="labprogress.php">Present Lab Situation</a></li>
				<li> <a href = "registration.php">Add New  Students to Dept. Database for Lab</a></li>
				<li> <a href = "logout.php">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
<?php
	include("/includes/footer.php");
?>