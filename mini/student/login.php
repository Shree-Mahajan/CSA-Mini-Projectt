<?php 			
session_start()
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
  	<style type="text/css">
 		.container{
 		
 			width: 28%;
 			height: 30%;
 			margin-left: 35%;
 			background-color: #EFECE7;
 			/*margin-top: 3%;*/

 			margin-top: 50px;
 			/*box-shadow: 0 15px 25px rgba(0,0,0,.6);*/
 		}
 		input[type="submit"]{
 			background-color: #AABFDE;
 			width:240px;
 			/*padding: 10px 12px;*/
 		}
 		input[type="submit"]:hover{
 			cursor: pointer;
 			font-size: 22px;
 			color: white;
 			background-color: #1E55A6;
 		}
 		.container input{
 			outline: none;
 			margin-bottom:10px;
 			margin-left: 15px; 
 			color: black;
 			font-size: 22px;
 			
 			
 		}
 		input{
 			color: black;
 			position: relative;
 		}
 		body{
 			padding: 0;
 			margin: 0;
 			font-family: sans-serif;
 			/*background-size: cover;*/
 			background-color: #EFECE7;
 		}
 		#log{
 			position: absolute;
 			top: 25%;
 			left: 15%;
 			transform: translateX(-50%) translateY(-50%);
 			padding: 15px;
 			/*box-sizing: border-box;border-radius: 5px;*/

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
 			}
 			else
 			{
 				document.getElementById('sign').style.display='none';
 				document.getElementById('log').style.display='block';
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
 <body onload="Switch(1)" style="background-color: #D7E5ED">
 	<div class="container" id="log" style="height: 450px;margin-top: 60px; width:26%">
 			<table cellpadding="10px">
 				<form name="login" action="loginquery.php" method="post" onsubmit="return validate('login')">
 					<center><h2 >Login</h2></center>
 					<tr class="khi">
    					<input  type="number" id="sample3" name="prn" placeholder="PRN">
    					
  						</div>
  						

 						
 					</tr>
 					<tr class="khi">
					    <input placeholder="Password" type="password" id="sample3" name="password">
					  	</div>
 						
 						
 					</tr>
 					<tr>
 						<td ><input type="submit" name="login" value="Login"></td>
 					</tr>
 					<tr onclick="Switch(0)">
 						<td colspan="2" >
 							<span style="color: #273242  ;">New user</span> <strong style="color: blue; padding:5px;"><u>Create account.</u></strong>
 						</td>
 					</tr>
 					<input type="hidden" name="email" value="login">
 				</form>
 			</table>
 	</div>
 	<div class="container" id="sign" style="height: 450px; margin-top: 60px;width: 26%;">
 			<table cellpadding="10px" align="center" >
 				<h3 align="center" style="margin-bottom: 10px;">Sign up</h3>
 				<form name="signup" action="loginquery.php" method="post" onsubmit="return validate('signup')">
 					<tr class="khi">
 						
					    <input type="text" id="sample3" name="prn" placeholder="PRN">
					  	</div>
 						
 					</tr>
 					<tr>
 						
					    <input  type="text" id="sample3" name="email" placeholder="Email">
					  	</div>
 					</tr>
 					<tr>
 						
					    <input type="password" id="sample3" name="password" placeholder="Password">
					  	</div>
 					</tr>
 					<tr>
 						
					    <input  type="password" id="sample3" name="cnfpassword" placeholder="Confirm Password">
					    
					  	</div>
 					</tr>
 					<tr>
 						<td colspan="2"><input type="submit" name="signup" value="Create account"></td>
 					</tr>
 					<tr onclick="Switch(1)">
 						<td  >
 							<span style="color: black;">Back to</span> <strong style="color: blue;"><u><font style="color: blue;padding: 5px;">Login page.</font></u></strong>
 						</td>
 					</tr>
 				</form>
 			</table>
 	</div>
 </body>
 </html>