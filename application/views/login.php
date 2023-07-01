<!DOCTYPE html>
<html>
<head>
	<title>Apotek Dinar Mas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/img/2.svg" /> 
</head>
<body>
	<img class="wave" src="<?php echo base_url(); ?>assets/login/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url(); ?>assets/login/img/1.svg">
		</div>
			
		<div class="login-content">
			<form action="<?=site_url('auth/process') ?>" method="post">
				<img src="<?php echo base_url(); ?>assets/login/img/avatar.svg">
				<h4 class="title"> SELAMAT DATANG DI APLIKASI FORECASTING MILIK APOTEK DINAR MAS</h4>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input" required="">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input" required="">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login" name="login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
</body>
</html>
