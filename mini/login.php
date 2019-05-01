<?php 			
session_start()
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  	
  	<style type="text/css">
 		.container{
 		
 			margin-left: 35%;
 			background-color: #CDDEFC;
 			/*opacity: 0.6;*/
 			border-radius: 7px;
 			/*box-shadow: 12px 12px 2px 1px rgba(0, 0, 255, .2);*/
 			/*margin-top: 3%;*/

 			margin-top: 50px;
 			box-shadow: 2px 10px 10px 5px grey  ;
 			/*box-shadow: 0 15px 25px rgba(0,0,0,.6);*/
 		}
 		input[type="submit"] {
 			background-color: #0C2C63;
 			width:80%;
 			height: 45px;
 			color: white;
 			border-radius: 7px;
 			/*padding: 10px 12px;*/
 		}
 		input[type="submit"]:hover{
 			cursor: pointer;
 			
 			box-shadow: 3px 3px 3px 3px #7998DC      ;
 		}
 		.container input{
 			outline: none;
 			margin-bottom:4px;
 			margin-left: 25px; 
 			width: 350px;
 			font-size: 22px;
 			
 			
 		}
 		
 		body{
 			padding: 0;
 			margin: 0;
 			font-family: sans-serif;
 			/*background-size: cover;*/
 			background-color: #ABC7F7    ;
 		}
 		/*#log #sign{
 			position: absolute;
 			top: 25%;
 			left: 15%;
 			transform: translateX(-50%) translateY(-50%);
 			padding: 15px;*/
 			
 		}
 		#sample3{
 			color: black;
 			padding: 5px;
 		}
 		table,th,tr{
 			text-align: center;
 			padding: 10px;		
 			width: 100%;
 			margin-right: 10px;
 		}
 	</style>
 	
 	<script type="text/javascript">

 		function Switch(f) {
 			if (f==0) {
 			document.getElementById('sign').style.display="block";	
 			document.getElementById('log').style.display="none";	
 			document.getElementById('flog').style.display="none";	

 			}
 			else
 			{
 				document.getElementById('sign').style.display='none';
 				document.getElementById('log').style.display='block';
 				document.getElementById('flog').style.display='block';
 			}
 		}

 		function validate(type) {
 			// alert(type);
 			if (type=='login') {
 				var prn=document.forms["login"]["prn"].value;
 				var password=document.forms["login"]["password"].value;


 				if (prn=='' || password=='') {
 					alert("Some fields are empty.. Plese fill them up..")
 					return false;
 				}
			}
			if (type=='flogin') {
 				var prn=document.forms["flogin"]["prn"].value;
 				var password=document.forms["flogin"]["password"].value;


 				if (prn=='' || password=='') {
 					alert("Some fields are empty.. Plese fill them up..")
 					return false;
 				}
			} 				
 			if (type=='signup') {
				var email=document.forms["signup"]["email"].value;
				var prn=document.forms["signup"]["prn"].value;
 				var password=document.forms["signup"]["password"].value;
 				var cnfpassword=document.forms["signup"]["cnfpassword"].value;
				var domain=email.substr(email.indexOf('@'));
 				
 				// alert(email+''+password+''+cnfpassword.length+''+domain);

 				if (email=='' || password=='' || cnfpassword=='' || prn=='') {
 					alert("Some fields are empty.. Plese fill them up..")
 					return false;	
 				}
 				if (domain	!='@mitaoe.ac.in'){
 					alert('Email should belongs to mitaoe..')
 					return false;
 				}
 				else if (prn.length!=10) {
 					alert("PRN length should be 10 characters..")
 				}
 				else if (password.length<8) {
 					alert("password should be greater than 8 characters.");
 					return false;
 				}
 				else if (password!=cnfpassword) {
 					alert("Password does not matched...")
 					return false;
 				}
 				
 			}
			return true;
 		}

 	</script>

 </head>
 <body onload="Switch(1)" style="background-color: #ACC2F0    ">

 	<div class="container" id="log" style="height: 360px;margin-top: 0px; width:36%">
 	
 	
 			<table cellpadding="10px">
 				<form name="login" action="loginquery.php" method="post" onsubmit="return validate('login')">
 					<center><h2 style="color: #060C18    ;" >Student Login</h2></center>
 					<tr class="khi">

						  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    <input class="mdl-textfield__input" type="text" id="sample3" name="prn">
						    <label class="mdl-textfield__label" for="sample3" style="color: black; margin-left: 20px;">PRN NO.</label>
						    
						  	</div>

 					</tr>
 					<tr class="khi">
 						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input type="password"  class="mdl-textfield__input" type="text"  id="sample4" name="password">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Password</label>
					   
					  </div>
 						
 						
 					</tr>
 					<tr>
 						<td ><input type="submit" name="login" value="Login" ></td>
 					</tr>
 					<tr onclick="Switch(0)">
 						<td colspan="2" >
 							<span style="color: #273242  ; size: 40px;"><b>Not a Member Yet?</b></span> <strong style="color: blue; padding:5px;"><u>Sign Up!</u></strong>
 							
 						</td>
 					</tr>
 					<input type="hidden" name="email" value="login">
 				</form>
 			</table>
 	</div>
 	<div class="container" id="sign" style="height: 400px;margin-top: 20px; width:36%">
 			<table cellpadding="10px" align="center" >
 				<h2 align="center" style="margin-bottom: 10px;">Sign up</h2>
 				<form name="signup" action="loginquery.php" method="post" onsubmit="return validate('signup')">
 					<tr class="khi">
 						
					     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    <input class="mdl-textfield__input" type="text" id="sample3" name="prn">
						    <label class="mdl-textfield__label" for="sample3" style="color: black; margin-left: 20px;">PRN NO.</label>
						    
						  	</div>
 						
 					</tr>
 					<tr>
 						
					    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input class="mdl-textfield__input" type="text" id="sample4" name="email">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Email</label>
					   
					  </div>
 					</tr>
 					<tr>
 						
					   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input  type="password"  class="mdl-textfield__input" type="text"  id="sample4" name="password">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Password</label>
					   
					  </div>
 					</tr>
 					<tr>
 						
					    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input type="password"  class="mdl-textfield__input" type="text" id="sample4" name="cnfpassword">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Confirm Password</label>
					   
					  </div>
 					</tr>
 					<tr>
 						<td colspan="2" ><input type="submit" name="signup" value="Create account" style="margin-top: -40px;"></td>
 					</tr>
 					<tr onclick="Switch(1)">
 						<td  >
 							<span style="color: white;"><b>Back to</b></span> <strong style="color: blue;"><u><font style="color:black ;padding: 5px;">Login page.</font></u></strong>
 						</td>
 					</tr>
 				</form>
 			</table>
 	</div>
 	<div class="container" id="flog" style="height: 250px;margin-top: 20px; width:36%">
 			<table >
 				<form name="flogin" action="loginquery.php" method="post" onsubmit="return validate('flogin')">
 					<center><h2 >Faculty Login</h2></center>
 					<tr class="khi">
 						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input class="mdl-textfield__input" type="text" id="sample4" name="prn">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Username</label>
					   
					  </div>
  					</tr>
 					<tr class="khi">
 						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input  type="password"  class="mdl-textfield__input" type="text" id="sample4" name="password">
					    <label class="mdl-textfield__label" for="sample4" style="color: black; margin-left: 20px;">Password</label>
					   
					  </div>
					  	</div>
 						
 						
 					</tr>
 					<tr>
 						<td ><input type="submit" name="login" value="Login" style="margin-top: -10px"></td>
 					</tr>
 					<input type="hidden" name="email" value="flogin">
 				</form>
 			</table>
 	</div>
 	
 </body>
 </html>