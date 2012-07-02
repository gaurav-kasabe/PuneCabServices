<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Siddheshwar Travels</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jqtransform.css">
    <link rel="stylesheet" href="css/jquery.ui.all.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
	<script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/vegur_400.font.js"></script>
    <script src="js/Vegur_bold_700.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/tms-0.4.x.js"></script>
    <script src="js/jquery.jqtransform.js"></script>
    <script src="js/FF-cash.js"></script>

	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
    <script>
		var flag=0;
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
			});
			
			$("#contact-button").mousedown(function(e){
			if(flag==1)
			{
				$("#contact-form").animate({"margin-top": "-600px"}, 500);
				$("#contact-button").animate({"margin-top": "10px"}, 500);
				flag=0;
			}
			else
			{
				$("#contact-form").animate({"margin-top": "15px"}, 500);
				$("#contact-button").animate({"margin-top": "420px"}, 500);
				flag=1;
			}
			});
			$("#contact-submit").mousedown(function(e){
				alert("Thank You! We will contact you as soon as possible");
				$("#contact-form").animate({"margin-top": "-600px"}, 500);
				$("#contact-button").animate({"margin-top": "10px"}, 500);
				flag=0;
			});		
		});
	</script>
		<script type="text/javascript">
$(document).ready(function(){
	$("#login_a").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
        password=$("#password").val();
         $.ajax({
            type: "POST",
            url: "php/login.php",
            data: "user_name="+username+"&password="+password,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<a href='php/logout.php' id='logout'>Logout</a>");
				
              }
              else
              {
                    $("#add_err").html("Wrong username or password");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Loading...")
            }
        });
         return false;
    });
});
</script>

    <script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});

$(function() {
		$( "#Date" ).datepicker();
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
		<div>
			<h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
			<form id="contact-form" name="contact" method="post" action="php/insert.php">
				&nbsp;&nbsp;&nbsp;&nbsp;<label>Full Name:</label>
				<input type="text" name="cstname" value="" /><br/>
				<label>Contact No:</label>
				<input type="text" name="cstno" value=""/>
				<label>Travel From:</label>
				<input type="text" name="cfrom" value=""/>
				<label>Travel To:</label>
				<input type="text" name="cto" value=""/>
				<label>Date:</label>
				<input type="text" id="datepicker" name="cdate" value=""/>  
				<input type="hidden" name="flag" value="1" />
				<label>Preference:</label>
                  <select name="cpreference" id="select-2">
				  <option value="Select Ride" selected>Select Ride</option>
				  <option value="Car">Car</option>
				  <option value="Bus">Bus</option>
				  <option value="Train">Train</option>
				  <option value="Flight">Flight</option>
				</select>				
                <br/><br/><br/>
				<a onClick="document.getElementById('contact-form').submit()" id="contact-form-button">Submit Query</a>
			</form>
			<img id="contact-button" src="images/contact1.png" alt="Contact Form"></img>
					<div class="social-icons">
				<span>Follow Us:</span>
				
				<a href="http://www.facebook.com/SiddheshwarTravels" target="blank" class="icon-2"></a>
				<a href="#" class="icon-1"></a>
	
	<div id="profile">
    	<?php if(isset($_SESSION['user_name'])){
			?>
			<a href='php/logout.php' id='logout'>Logout</a>
		<?php }else {?>
		<a id="login_a" class="class-3" href="#" ><img src="images/login.png" /></a>
        <?php } ?>
	</div>
    <div id="login_form">
        <div class="err" id="add_err"></div>
    	<form action="php/login.php" method="post">
			<label>User Name:</label>
			<input type="text" id="user_name" name="user_name" />
			<label>Password:</label>
			<input type="password" id="password" name="password" />
			<label></label><br/>
			<input type="submit"  value="Login" />&nbsp;&nbsp;&nbsp;
			<input type="button" id="cancel_hide" value="Cancel" />
		</form>
    </div>
	<div id="shadow" class="popup"></div>
			</div>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img class="img-slide" src="images/slider-1.jpg" alt="" /></li>
                    <li><img class="img-slide" src="images/slider-2.jpg" alt="" /></li>
                    <li><img class="img-slide" src="images/slider-3.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav>
            <ul class="menu">
                <li class="current"><a href="index.php">Main</a></li>
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
        <h2 class="top-1 p3">Welcome To Siddheshwar Travels!</h2>
        <p class="p2">Siddheshwar Travels offers you complete travel arrangements in Maharashtra and near by states. Different tour packages- Cultural, Seasonal, Marriage, Festival & various travelling options for you to choose . We also provide cab sevice in Mumbai, Aurangabad, Nasik, Pune and many more destinations...   </p>
        <p class="line-1"> </p>
        <h2 class="p4">Tours. Picnic. Outing. Vacations.</h2>
        <div class="wrap block-1">
            <div>
                <img src="images/cabs.jpg" alt="" class="img-border">
                <h3>Cabs</h3>
                <p>We provide cabs as one of our the major services.In various areas,with different plans.</p>
                <a href="cars.html" class="button">More</a>
            </div>
            <div>
                <img src="images/packages.png" alt="" class="img-border">
                <h3>Packages</h3>
                <p>We offer you lots of travelling packeges in your budget.Seasonal packages are also available.</p>
                <a href="packages.php" class="button">More</a>
            </div>
            <div class="last">
                <img src="images/destinations.png" alt="" class="img-border">
                <h3>Destinations</h3>
                <p>We cover famous tourist destinations all over Maharashtra and near by states.</p>
                <a href="destination.html" class="button">More</a>
            </div>

        </div>
<br><br>
  <p> <h3 align="left">Book Your Flight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Train Reservation</h3> </p>
<br>
<a href="http://www.airindia.in" target="_blank"><img src="images/flight.jpg" align="left" alt=""> </a>
<a href="http://www.indianrail.gov.in" target="_blank"><img src="images/train.jpg" align="right" alt="" style="padding-right:40px;"> </a>

      </div>
      <div class="grid_4">
        <div class="left-1">
            <h2 class="top-1 p3">Book Your cab</h2>
            <form id="form-1" class="form-1 bot-1" method="post" action="php/insert.php">
                <input type="hidden" name="flag" value="2">
            <div class="select-1">
                    <label>Name</label>
                    <input type="text" value="Enter your name" name="name"  onBlur="if(this.value=='') this.value='Enter your name'" onFocus="if(this.value =='Enter your name' ) this.value=''"  /> 
                </div>

            <div class="select-1">
                    <label>Contact no</label>
                    <input type="text" value="Enter your contact no" name="phone_no" pattern="[0-9]{10}" required  onBlur="if(this.value=='') this.value='Enter your contact no'" onFocus="if(this.value =='Enter your contact no' ) this.value=''"  /> 
                </div>

            <div class="select-1">
                    <label>Pick-up Lolation</label>
                    <input type="text" value="Enter Pick-up Location" name="src_loc"  onBlur="if(this.value=='') this.value='Enter Pick-up Location'" onFocus="if(this.value =='Enter Pick-up Location' ) this.value=''"  /> 
                </div>

            
                <div>
                    <label>To</label>

                    <input type="text" value="Enter Destination" name="dest_loc" onBlur="if(this.value=='') this.value='Enter Destination'" onFocus="if(this.value =='Enter Destination' ) this.value=''"  />
                </div>

                <div class="select-2">
                    <label>Cab type</label>
                    <select name="service_type" value="Select Cab">
                        <option>-Select cab-</option>
                        <option>Xylo</option>
                        <option>Swift Dzire</option>
                        <option>Tavera</option>                        
                        <option>Tata Indica</option>
                        <option>Tata Sumo</option>
                  </select>   
                </div>
                <div class="select-2 last">
                    <label>Date   </label>           
                    <input type="text" value="Date" name="start_date1" id="Date" /> 
                </div> 
                <a onClick="document.getElementById('form-1').submit()" class="button">Submit</a>
                <div class="clear"></div>
            </form>
            <h2 class="p3">Find Your Destination</h2>
            <img src="images/map_india.gif" alt="">
            <div class="lists">
                <ul class="list-1">
                    <li><a href="destination.html">Pune</a></li>
                    <li><a href="destination.html">Mumbai</a></li>
                    <li><a href="destination.html">Goa</a></li>
                </ul>
                <ul class="list-1 last">
                    <li><a href="destination.html">Mahabaleshwar</a></li>
                    <li><a href="destination.html">Ganesh Darshan</a></li>
                    <li><a href="destination.html">Kokan</a></li>
                </ul>
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
