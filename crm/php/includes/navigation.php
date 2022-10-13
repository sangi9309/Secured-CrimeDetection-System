<?php 

$current = basename($_SERVER['SCRIPT_NAME']);

?>

<div id="navcontainer">
	<ul id="navlist">
		<li <?php if($current == 'index.php') echo 'class="active"'?>><a href="index.php">HOME</a><span></li>
		<li <?php if($current == 'report.php') echo 'class="active"'?>><a href="report.php">REPORT CRIME</a><span></li>		
		<li <?php if($current == 'alerts.php') echo 'class="active"'?>><a href="alerts.php">ALERTS</a><span> </li>	
			<li <?php if($current == 'getinfo.php') echo 'class="active"'?>><a href="getinfo.php">Track Applications</a><span> </li>			
		<?php if(isset($_SESSION['email'])){ if($_SESSION['email']=="admin@admin.com"){?>   <li><a href="administrator/index.php">Dashboard</a></li>
				<?php } }?>
		<li style="float:right;<?php if(!isset($_SESSION['email'])) echo 'display:none;';?>"  ><a href="logout.php">Logout</a></li>
	</ul>
</div>