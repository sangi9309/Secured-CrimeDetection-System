<?php 
  include 'php/includes/header.php'; 
  
?>
  <div class="container">
    <div id="header">
      <div class="mainLogo">
                 <div class="logo"><img src="images/lg.jpg" width="60px" height="50px"/><span>Crime Report</span> System</div>
            </div>
    </div>
    <div id="nav">
      <?php include 'php/includes/navigation.php'?>
    </div>
    <div class="clear"></div>
   
    <div class="main">
        <div class="heading">
            <h1><img src="administrator/images/home.png" style="position: relative; " />&nbsp; Crime Report Status</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
            
                     
                     <table width="100%">
                     <?php 
                      
                      	if(isset($_GET['show'])){
                      		$idno = urldecode($_GET['show']);
                        }
                     ?>
                     <form method="post" action="administrator/application_handler.php">
                	 <?php
                      		$db_conn -> getDetailedInfoCrime($idno);
					
                      ?>
                        <tr><td></td><td><a href="index.php"><input style="border:none; margin-top: 10px; margin-right:20px;" type="button" class="btn-warning btn-sm pull-right" name="Cancel" value="Back" /></a>
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
