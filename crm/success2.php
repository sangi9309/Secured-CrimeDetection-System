<?php 
	include 'php/includes/header.php'; 
	
	
	$dbh = new PDO("mysql:host=localhost;dbname=crmdata", "root", "");

	
?>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="logo"><img src="images/lg.jpg" width="60px" height="50px"/><span>Crime Report</span> System</div>
		</div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>
		<div id="main">
			<div class="row">
				<div class="col-sm-12">
					<p>Registered succesfully. You can now now <a href="login.php">Login</a></p>
				</div>
			</div>
		</div>
	
<div style="" id="lfooter"> 
		<p style="margin-top:5px;">Copyright &copy; Crime Report System <a href="#" title="email"> </a>  </p>
		<div style="float:right; margin-top:-35px;margin-right:5px;">
			<a href="#"><img src="images/facebook_32.png" alt="" /></a>&nbsp;<a href="#"><img src="images/twitter_32.png" alt="" /></a>
		</div>
		</div>
		</div>