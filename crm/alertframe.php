<?php 
	include 'php/includes/header.php'; 
	
	 if(!isset($_SESSION['email'])){
		Header('Location:logout.php');
	}


?>
<center><h3 style="margin-top:-30px;">Missing Vehicles</h3></center>
				<style type="text/css">
					table th{
						padding:10px;
						font-family:trebuchet ms;
						color:#fff;
						background:#1B1B1B;
						text-align:center;
					}
					
					table tr td{
						border:1px solid #090909;
						padding:10px;
						font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
						color:#000000;
					}
					
					table tr td.carry-up{
						height:80px;
					}
				</style>
				<div id="xx">
				<table style="width:100%;">
					<?php
					echo '<tr style="border:1px solid #000;">';
					echo '<th><b>Model</b></th>';
					echo '<th><b>Number plate</b></th>';
					echo '<th><b>Name of Owner</b></th>';
					echo '<th><b>Image</b></th>';
					echo '<th><b>Description</b></th>';
					echo '<th><b>Phone Number</b></th>';
					echo '</tr>';
						$db_conn -> getAlerts1();
					?>
				</table>
			</div>
			<div id="yy">
				<center><h3>Missing Persons</h3></center>
				<table style="width:100%;>
					<?php
					echo '<tr style="1px solid #000">';
					echo '<td><b>Sr. No</b></td>';
					echo '<td><b>Full Name</b></td>';
					echo '<td><b>Address</b></td>';
					echo '<td><b>Image</b></td>';
					echo '<td><b>Last Seen</b></td>';
					echo '<td><b>Description</b></td>';
					echo '<td><b>Phone Number</b></td>';
					echo '</tr>';
						$db_conn -> getAlerts2();
					?>
				</table>
				</div>
				<div id="zz">
				<center><h3>Missing Items</h3></center>
				<table style="width:100%;>
					<?php
					echo '<tr style="1px solid #000">';
					echo '<td><b>Sr. No</b></td>';
					echo '<td><b>Item Name</b></td>';
					echo '<td><b>Description</b></td>';
					echo '<td><b>Last Seen</b></td>';
					echo '<td><b>Status</b></td>';
					echo '<td><b>Category</b></td>';
					echo '</tr>';
						$db_conn -> getAlerts3();
					?>
				</table>
				</div>
				</div>	