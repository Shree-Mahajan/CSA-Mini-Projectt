<?php 			
session_start()
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<style type="text/css">
 		.container{
 			border: 1px solid black;
 			width: 30%;
 			height: 30%;
 			margin-left: 35%;
 			background-color: skyblue;
 			margin-top: 3%
 		}
 		table,th,tr{
 			text-align: center;
 			padding: 10px;		
 			width: 100%
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
 <body onload="Switch(1)">
 	<div class="container" id="log">
 			<table cellpadding="10px" align="center"  >
 				<form name="login" action="loginquery.php" method="post" onsubmit="return validate('login')">
 					<tr>
 						<td>PRN:</td>
 						<td><input type="number" name="prn" ></td>
 					</tr>
 					<tr>
 						<td>Password:</td>
 						<td><input type="password" name="password" ></td>
 					</tr>
 					<tr>
 						<td colspan="2"><input type="submit" name="login" value="Login"></td>
 					</tr>
 					<tr onclick="Switch(0)">
 						<td colspan="2" >
 							New user <strong style="color: blue;"><u>Create account.</u></strong>
 						</td>
 					</tr>
 					<input type="hidden" name="email" value="login">
 				</form>
 			</table>
 	</div>
 	<div class="container" id="sign">
 			<table cellpadding="10px" align="center" >
 				<form name="signup" action="loginquery.php" method="post" onsubmit="return validate('signup')">
 					<tr>
 						<td>PRN:</td>
 						<td><input type="number" name="prn"></td>
 					</tr>
 					<tr>
 						<td>Email:</td>
 						<td><input type="email" name="email"></td>
 					</tr>
 					<tr>
 						<td>Password:</td>
 						<td><input type="password" name="password"></td>
 					</tr>
 					<tr>
 						<td>Confirm Password:</td>
 						<td><input type="password" name="cnfpassword"></td>
 					</tr>
 					<tr>
 						<td colspan="2"><input type="submit" name="signup" value="Create account"></td>
 					</tr>
 					<tr onclick="Switch(1)">
 						<td colspan="2" >
 							Back to <strong style="color: blue;"><u>Login page.</u></strong>
 						</td>
 					</tr>
 				</form>
 			</table>
 	</div>
 </body>
 </html>