<?php 
// session_start();
require '../menubar.php';
require 'profilequery.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.preview{
			border:2px solid black;
			height: 150px;
			width: 50px;
		}
 		table,th,tr{
 			text-align: center;
 			padding: 10px;		
 			width: 100%;
 		}
 		div{
 			margin-bottom: 2%;
 			width: 80%;
 			margin-left: 10%;
 		}
 		input{
 			width: 900px;
 			height: 30px;
 			border-radius: 10px
 		}
 		textarea{
 			width: 100%;
 			border-radius: 10px;
 		}
 		.input1{
 			width: 25%;

 		}
	</style>
	<script type="text/javascript">
		function preview(event) 
		{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('output_image');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
		}
		function validate() {
			// var dp=document.forms["profile"]['dp'].value;
			var name=document.forms["profile"]["name"].value;
			var address=document.forms["profile"]["address"].value;
			var phone=document.forms["profile"]["phone"].value;
			var dob=document.forms["profile"]["dob"].value;
			var gender=document.forms["profile"]["gender"].value;
			var passout=document.forms["profile"]["passout"].value;

			msg='';

			// alert(dp+''+name+''+address+''+phone+''+email);
			if ( name=='' || address=='' || phone=='' || dob=='ddmmyyyy' || passout=='') {
				msg+='Fill out all the fields....'
			}
			if (phone.length!=10) {
				msg+='Phone should be of 10 digits..'
			}
			if (gender=='Select') {
				msg+='Select the gender..'
			}
			
			if (msg!='') {
				alert(msg);
				return false;
			}
			return true;

		}

		function editable(type) {
			
			if (type==0) {
			document.forms["profile"]["name"].disabled=true;
			document.forms["profile"]["address"].disabled=true;
			document.forms["profile"]["phone"].disabled=true;
			document.forms["profile"]["dob"].disabled=true;
			document.forms["profile"]["gender"].disabled=true;
			document.forms["profile"]["passout"].disabled=true;
			document.forms["profile"]["hobbie"].disabled=true;
			document.forms["profile"]["language"].disabled=true;
			document.forms["profile"]["semail"].disabled=true;
			}else{
			document.forms["profile"]["name"].disabled=false;
			document.forms["profile"]["address"].disabled=false;
			document.forms["profile"]["phone"].disabled=false;
			document.forms["profile"]["dob"].disabled=false;
			document.forms["profile"]["gender"].disabled=false;
			document.forms["profile"]["passout"].disabled=false;
			document.forms["profile"]["hobbie"].disabled=false;
			document.forms["profile"]["language"].disabled=false;
			document.forms["profile"]["semail"].disabled=false;
			}
		}
	</script>
</head>
<body onload="editable(0)">
	<div>
		<table border="1" cellspacing="0">
			<form name="profile" action="profilequery.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
				<tr>
					<th>Profile Picture:</th>
					<th>
						<input type="button"  style="float: right;" onclick="editable()" value="edit">
						<img src="profile.jpg" id="output_image"  height="300px" width="20%" />
						<input type="file" name='dp' onchange="preview(event)">
					</th>
				</tr>
				<tr>
					<th>Name*:</th>
					<th><input type="text" name="name" placeholder="As per marksheet." value="<?php echo $name ?>" required ></th>
				</tr>
				<tr>
					<th>Address*:</th>
					<th><textarea name="address" cols="50" rows="5" required ><?php echo $address ?></textarea></th>
				</tr>
				<tr>
					<th>Contact No*:</th>
					<th><input type="text" pattern="\d*" name="phone" maxlength="10" value="<?php echo $phone ?>"  required></th>
				</tr>
				<tr>
					<th>Email:</th>
					<th><input type="email" name="email" value=<?php echo $_SESSION['stemail'];?> readonly></th>
				<tr>
					<th>Secondary Email:</th>
					<th><input type="email" name="semail" value=<?php echo $semail ?>></th>
				</tr>

				</tr>
				<tr>
					<th>DOB:</th>
					<th style="text-align: left;"><input type="date" name="dob" value="<?php echo $dob ?>" style="width: 50% ">

						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						Gender:
						<select name="gender">
							<option>Select</option>
							<option <?php echo ($gender=='Male')?'selected':'' ?>>Male</option>
							<option <?php echo ($gender=='Female')?'selected':'' ?>>Female</option>
							<option <?php echo ($gender=='Other')?'selected':'' ?>>Other</option>
						</select>
				</tr>
				<tr>
					<th>Passout Batch:</th>
					<th><input type="text" name="passout" placeholder="from - to (eg. 2020-2024)" value="<?php echo $passout ?>"></th>
				</tr>
				<!-- <tr >
					<th></th>
					<th style="text-align: left;">
						SSC:<input type="number" name="ssc" placeholder="" class="input1" value="<?php echo $ssc ?>">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						HSC:<input type="number" name="hsc" placeholder="" class="input1" value="<?php echo $hsc ?>">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

						DSE:<input type="number" name="dse" placeholder="" class="input1" value="<?php echo $dse ?>"></th>
				<tr> -->
					<th>Hobbies:</th>
					<th><textarea name="hobbie" rows="2" cols="50"  ><?php echo $hobbie ?></textarea></th>
				</tr>
				<tr>
					<th>Language preficiency:</th>
					<th><textarea name="language" rows="2" cols="50" ><?php echo $language ?></textarea></th>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit"></td>	
				</tr>

			</form>
		</table>

	</div>
</body>

</html>