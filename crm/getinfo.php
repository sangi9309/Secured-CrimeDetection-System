<?php 
	include 'php/includes/header.php'; 
	
?>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="mainLogo">
           			 <div class="logo"><img src="images/lg.jpg" width="60px" height="50px"/><span>Crime Report</span> System</div>
       	    </div>
		</div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>

			 <div class="content" style="height: 500px;">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
                <center><br><br><br><br>
                     <h3>Get Case Details</h3><br>
                   <form method="get" action="crime.php">
                   	Case Number:<input type="number" name="show"><br><br>
                     <input type="submit" name="Get">
                    </form>
                   
                     </center>
                     	
                    </div>
           </div>
           
          </div>
          
		</div>
<?php include 'php/includes/footer.php'; ?>