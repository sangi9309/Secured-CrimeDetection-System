
<?php 
	
    include 'includes/overallheader.php';
	
	if(!isset($_SESSION['email'])){
		header('Location:../logout.php');
	}
	
?>
  <div class="container">
    <div id="header">
        <div class="div1">
            <img src="images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b><?php echo $_SESSION['email'];?></b>
        </div>
        <div class="div2">
            <div class="logo"><img src="images/lg.jpg" width="60px" height="50px"/><span>Crime Report</span> System</div>
        </div>
    </div>
    <?php include 'includes/menu.php'; ?>
    <div class="clear"></div>
   
    <div class="main">
        <div class="heading">
            <h1><img src="images/home.png" style="position: relative; " />&nbsp; Application</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
              
                     <div class="dashboard-heading">Details</div>
                     
                     <table width="100%">
                     <?php 
                      
                      	if(isset($_GET['show'])){
                      		$idno = urldecode($_GET['show']);
                        }
                     ?>
                     <form method="post" action="application_handler.php">
                	 <?php
                      		$db_conn -> getDetailedInfoCrime($idno);
					
                      ?>
                        <tr><td></td><td><a href="allcrimes.php"><input style="border:none; margin-top: 10px; margin-right:20px;" type="button" class="btn-warning btn-sm pull-right" name="Cancel" value="Cancel" /></a><input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="update" value="Update Case" /></td>
                      </tr>
                     </form>
                      
                     </table>
               
                    </div>
           </div>
           
          </div>
          
        </div>
       <div id="footer">
           <p class="center"><b>Crime Report System</b></p>
       </div> 
    </div>
   </div>
    </body>
</html>