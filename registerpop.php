<?php
	include ('config.php');
	mysql_query("SET NAMES UTF8");
?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <title>Home4Homeless | สมัครสมาชิก</title>
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
	    
	    <!-- Check ID CARD AND Empty-->
	    <script language="javascript">

	    	function check_idcard(mid){
				if(mid.value == ""){ return false;}
				if(mid.length < 13){ return false;}

			var num = str_split(mid); // function เพิ่มเติม
			var sum = 0;
			var total = 0;
			var digi = 13;

				for(i=0;i<12;i++){
					sum = sum + (num[i] * digi);
					digi--;
				}
				total = ((11 - (sum % 11)) % 10);
				
				if(total == num[12]){ //	alert('รหัสหมายเลขประจำตัวประชาชนถูกต้อง');
					return true;
				}else{ //	alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
					return false;
				}
			}


			function str_split ( f_string, f_split_length){
			    f_string += '';
			    if (f_split_length == undefined) {
			        f_split_length = 1;
			    }
			    if(f_split_length > 0){
			        var result = [];
			        while(f_string.length > f_split_length) {
			            result[result.length] = f_string.substring(0, f_split_length);
			            f_string = f_string.substring(f_split_length);
			        }
			        result[result.length] = f_string;
			        return result;
			    }
			    return false;
			}

			function id_card(mid){
				if(check_idcard(mid.value)){
					alert("เลขประจำตัวประชาชนถูกต้อง");
					/*mid.method = "post";
					mid.action = "db_regispop.php";*/
				}else{
					alert("เลขประจำตัวประชาชนไม่ถูกต้อง กรุณากรอกใหม่");	
					mid.value = "";
					mid.focus();
					return false;

				}
			}
			function fncSubmit()
			{
				var checkmid = id_card(mid);
				if(checkmid == false){
					return false;
				}

			  if(document.frmMain.fname.value == "")
			  {
			    alert('กรุณากรอกชื่อ');
			    document.frmMain.fname.focus();    
			    return false;
			  } 
			  if(document.frmMain.lname.value == "")
			  {
			    alert('กรุณากรอกนามสกุล');
			    document.frmMain.lname.focus();    
			    return false;
			  } 
			  if(document.frmMain.sex.value == "")
			  {
			    alert('กรุณาเลือกเพศ');
			    document.frmMain.sex.focus();    
			    return false;
			  } 
			  if(document.frmMain.pass.value == "")
			  {
			    alert('กรุณากรอกรหัสผ่าน');
			    document.frmMain.pass.focus();    
			    return false;
			  }
			  if(document.frmMain.conpass.value == "")
			  {
			    alert('กรุณากรอกยืนยันรหัสผ่าน');
			    document.frmMain.conpass.focus();    
			    return false;
			  }
			  if(document.frmMain.pass.value != document.frmMain.conpass.value)
			  {
			    alert('กรุณากรอกรหัสผ่านให้ตรงกัน');
			    document.frmMain.conpass.focus();    
			    return false;
			  }
			  /*document.frmMain.method="post";
			  document.frmMain.action="db_regispop.php";
			  document.frmMain.submit();*/
			}
		</script>
		
		

	</head>
	<body class="light-grayyi-bg">
	<header class="logo-header">
      <a><img src="images/logoweb2.png"></a>
    </header>
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <h1>สมัครสมาชิก</h1>
	        </header>
	        <form name="frmMain" id="frmMain" action="db_regispop.php" method="post" class="templatemo-login-form" onSubmit="JavaScript:return fncSubmit();">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">เลขประจำตัวประชาชน * </div>        		
		              	<input type="text" name="mid" id="mid" class="form-control" placeholder="กรอกเลข 13 หลัก" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57 ){event.returnValue = false;}" maxlength="13">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">ชื่อ * </div>	        		
		              	<input type="text" name="fname" id="fname"  class="form-control" placeholder="กรอกชื่อ">           
		          	</div>	
	        	</div>	 
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">นามสกุล * </div>	        		
		              	<input type="text" name="lname" id="lname"  class="form-control" placeholder="กรอกนามสกุล">           
		          	</div>	
	        	</div> 
	        	<div class="form-group">
	        		<div class="input-group">  
	        			<div class="input-group-addon">เพศ * </div> 
                			<select class="form-control" name="sex" id="sex">
                  				<option value=''> - เลือกเพศ - </option>
                  				<option value='ชาย'> ชาย </option>
                  				<option value='หญิง'> หญิง </option>
                			</select>
              			</span>
		          	</div>	
	        	</div> 
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">E-mail</div>	        		
		              	<input type="email" name="email" id="email" class="form-control" placeholder="js@dashboard.com">           
		          	</div>	
	        	</div>     
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">รหัสผ่าน</i></div>	        		
		              	<input type="password" name="pass" id="pass"  class="form-control" placeholder="******">           
		          	</div>	
	        	</div> 	
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon">ยืนยันรหัสผ่าน</i></div>	        		
		              	<input type="password" name="conpass" id="conpass"  class="form-control" placeholder="******">           
		          	</div>	
	        	</div>
				<div class="form-group">
					<button type="submit" name="submit" id="submit" class="templatemo-blue-button width-100">ลงทะเบียน</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
				<p><strong><a href="login.php" class="blue-text">เข้าสู่ระบบ</a></strong></p>
		</div>
	</body>
</html>