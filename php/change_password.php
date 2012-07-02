<?php
session_start();	

$user_name=$_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider-2.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/jqtransform.css">
	<link rel="stylesheet" href="../css/jquery.ui.all.css">
	<link rel="stylesheet" href="../css/styles.css" type="text/css" />
	<script src="../js/jquery.js"></script>
    <script src="../js/jquery-1.7.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/cufon-yui.js"></script>
    <script src="../js/vegur_400.font.js"></script>
    <script src="../js/Vegur_bold_700.font.js"></script>
    <script src="../js/cufon-replace.js"></script>
    <script src="../js/tms-0.4.x.js"></script>
    <script src="../js/jquery.jqtransform.js"></script>
    <script src="../js/FF-cash.js"></script>
    <script>
		$(document).ready(function(){
			$('.form-1').jqTransform();					   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="main">
<!--==============================header=================================-->
<header>
    <div>
        <h1><a href="index.php"><img src="../images/logo.jpg" alt=""></a></h1>
        <?php 
			if(($_SESSION['user_name']))
		  	{
		?>
			<a href='logout.php' id='logout'><img id="login-button" src="../images/logout.jpg" alt="Logout"></img></a>
		<?php 
			}
			?>
		<div class="social-icons">
        	<span>Follow Us:</span>
				<a href="http://www.facebook.com/SiddheshwarTravels" target="blank" class="icon-2"></a>
				<a href="#" class="icon-1"></a>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="../images/slider-1-small.jpg" alt="" /></li>
                    <li><img src="../images/slider-2-small.jpg" alt="" /></li>
                    <li><img src="../images/slider-3-small.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav>
            <ul class="menu">
                <li class="current"><a href="index.html">Main</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="cars.html">Cars</a></li>
                <li><a href="destination.html">Destinations</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"><div class="inner_copy"></div></div>
    <div class="container_12">	
      <div class="grid_8">
        <div class="left-1">
            <h2 class="top-1 p3">Change Password</h2>
            <form id="change_password" class="form-1 bot-1" action="change_password1.php" method="post">
               <br />

                <div>
                     <label>Old Password</label>
					 <input type="password" name="old_password" value="" />
				</div>
				<br /><br />
				<div>
									             
                   <label>New Password</label>
                   <input type="password" name="new_password" value="" />              
                </div>
				<br /><br />
				<div>					             
   
				   <label>Confirm Password</label>
                   <input type="password" name="confirm_password" value="" />               
                </div>
			<br /><br />
			    <a onClick="document.getElementById('change_password').submit()" class="button">Submit</a>
                <div class="clear"></div>
            </form>
            
                              <div class="clear"></div>

        </div>

			  				      </div>
      <div class="grid_4">
        <div class="left-1">
             <h2 class="top-1 p3">Insert Package</h2>
            <form id="form-1" class="form-1 bot-2" action="insert_package.php" method="post">
             <div>
             <label>Package Name</label>
                    <input type="text"  value="" name="packages_name" />
                </div>
                <div>
				<label>Package Discription</label>
				<textarea  rows="3" cols="32" name="packages_disc">  </textarea> 
				</div>
				<div>
				<label>Package Priority</label>
				<input type="text" name="packages_priority" value="" />
				</div>

                <a onClick="document.getElementById('form-1').submit()" class="button">Insert</a>
                <div class="clear"></div>
            </form>
            <h2 class="top-1 p3">Update Package</h2>
            
			<form id="form-2" class="form-1 bot-2" action="update_package.php" method="post">
			<div class= "select-1" >
			<?php 
	require_once '../configuration/mysql.php';
	$res = mysql_query("SELECT packages_name FROM packages")
	or die("Invalid query: " . mysql_query());
	echo "<label>Select Package:</label>";
?>
	
	<select name="packages_name" class="select-1">
	
	<?php 
	while ($row = mysql_fetch_assoc($res)) 
	{
		$va = $row['packages_name'];
		echo "<option value='$va'>$va</option>";
	}
	//echo '</select>';
?>	  
</select>
</div>
                <div>
				<label>Package Priority</label>
				<input type="text" name="packages_priority" value=""  />
				</div>

                <a onClick="document.getElementById('form-2').submit()" class="button">Update</a>
                <div class="clear"></div>
            </form> 
                        </div>
        </div>
      </div>
      <div class="clear"></div>
    </div> 
</section> 
</div>    
<!--==============================footer=================================-->
    <footer>
        <p>© 2012 Siddheshwar Travels <a href="http://www.amistar.in" target="_blank"> <img src="images/amistar.png" alt="" align=right style="padding-right:50px;"></a></p>
        <p>Powered By &nbsp; <a rel="nofollow" href="http://www.amistar.in" target="_blank">AmiSTAR Technologies</a> </p>
    </footer>	    
<script>
	Cufon.now();
</script>
</body>
</html>
