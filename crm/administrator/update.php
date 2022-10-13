
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
            <h1><img src="images/home.png" style="position: relative; " />&nbsp; Success</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
                     <div class="dashboard-heading">Info</div>
                     	<p style="margin-top:20px;background-color:#ccf6ae; border:2px solid #b1f580; padding:10px 15px;border-radius:5px;">
                     		<?php if(!isset($_GET['s'])){?>
                     		Success! Report Updated Successfully. <a href="index.php">Back to home</a>
                     		<?php
								}
								else{
                     		?>
                     		Success! Report Update Successfully. <a href="index.php">Back to home</a>
                     		<?php
								}
                     		?>
                     	</p>
                     	
                    </div>
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
   </div>
    </body>
</html>
