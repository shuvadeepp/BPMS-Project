<!DOCTYPE HTML>
<html>
<head>
<title>BPMS | Login Page </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo PUBLIC_PATH ?>admin-assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo PUBLIC_PATH ?>admin-assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="<?php echo PUBLIC_PATH ?>admin-assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="<?php echo PUBLIC_PATH ?>admin-assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/metisMenu.min.js"></script>
<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/custom.js"></script>
<link href="<?php echo PUBLIC_PATH ?>admin-assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div style="background-color: #F1F1F1; height:800px;">
			<div class="main-page login-page ">
				<h3 class="title1">SignIn Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to BPMS AdminPanel ! </h4>
					</div>
					<div class="login-body">
						<form role="form" id="admin_loginFrm" method="post" action="">
							@csrf
							<p style="font-size:16px; color:red" align="center"></p>
							<input type="text" class="user" name="AdminName" id="AdminName" placeholder="User Name" autocomplete="off">
							<input type="password" name="AdminPassword" id="AdminPassword" placeholder="Password" autocomplete="off">
							<input type="submit" value="Sign In">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="../index.php">Back to Home</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="forgot-password.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
	<!-- Classie -->
		<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo PUBLIC_PATH ?>admin-assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo PUBLIC_PATH ?>admin-assets/js/bootstrap.js"> </script>
</body>
</html>