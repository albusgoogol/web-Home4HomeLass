<?php
	include ('config.php');

?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>Home4Homeless | เข้าสู่ระบบ</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <!-- 
        Visual Admin Template
        http://www.templatemo.com/preview/templatemo_455_visual_admin
        -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="css/font-awesome.min.css" rel="stylesheet">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/templatemo-style.css" rel="stylesheet">
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

	<body class="light-grayyi-bg">
	<header class="logo-header">
      <a><img src="images/logoweb2.png"></a>
    </header>
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <h1>เข้าสู่ระบบ</h1>
	        </header>
	        <form action="check_login.php" method="post" class="templatemo-login-form">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="email" name="email" id="email" class="form-control" placeholder="js@dashboard.com" reqiured/>           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" name="pass" id="pass"  class="form-control" placeholder="******" required/>           
		          	</div>	
	        	</div>        	
	          	<!--<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="remember_me" name="remember_me" />
						<label for="remember_me"><span></span>จดจำ</label>
				    </div>				    
				</div>-->
				<div class="form-group">
					<button type="submit" name="submit" id="submit" class="templatemo-blue-button width-100">เข้าสู่ระบบ</button>
				</div>
				<div class="form-group text-right">
						<label><a href="forgetpass.php">ลืมรหัสผ่าน</a><label>  
				</div>	
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p><strong><a href="registerpop.php" class="blue-text">สมัครสมาชิก</a></strong></p>
		</div>
	</body>
</html>