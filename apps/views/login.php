<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login page | Nutrioline</title>



    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/nifty.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>plugins/pace/pace.min.css" rel="stylesheet">
	<link href="<?php echo asset_url();?>plugins/toastr/toastr.css" rel="stylesheet">
    <script src="<?php echo asset_url();?>plugins/pace/pace.min.js"></script>



  
</head>

<body>
    <div id="container" class="cls-container">
        
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
    <div id="bg-overlay"></div>
    <!--===================================================-->
		
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Account Login</h1>
		                <p>Sign In to your account</p>
		            </div>
		            <form id="loginf" name="loginf" method="post" action="#">
		                <div class="form-group">
		                    <input autocomplete="off"  name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus>
		                </div>
		                <div class="form-group">
		                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
		                </div>
		                <!-- <div class="checkbox pad-btm text-left">
		                    <input id="form-checkbox" class="magic-checkbox" type="checkbox">
		                    <label for="form-checkbox">Remember me</label>
		                </div> -->
		                <button id="signin" class="btn btn-primary btn-lg btn-block" type="button">Sign In</button>
		            </form>
		        </div>
		
		        <!-- <div class="pad-all">
		            <a href="pages-password-reminder.html" class="btn-link mar-rgt">Forgot password ?</a>
		            <a href="pages-register.html" class="btn-link mar-lft">Create a new account</a>
		
		            <div class="media pad-top bord-top">
		                <div class="media-body text-left text-bold text-main">
		                    Login with
		                </div>
		            </div>
		        </div> -->
		    </div>
		</div>

    <script src="<?php echo asset_url();?>js/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>js/nifty.min.js"></script>
	<script src="<?php echo asset_url();?>plugins/toastr/toastr.min.js"></script>
	<?php include_once "login/login_js.php";?>

</body>

</html>
