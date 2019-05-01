<?php 
require '../menubar.php';
require '../databaseconnectivity.php';
session_start();
$prn=$_SESSION['stprn'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Certifications</title>
	<style type="text/css">
		table,th,td{
			border:1px solid black;
			text-align: center;
			border-collapse: collapse;

		}
		#addbtn{
			padding: 6px;
			cursor: pointer;
			box-shadow:  8px 0 10px rgba(0,0,0,0.7) ;
			width: 80px;
			background-color: #A1D7F7;
			
		}
		.title{
			background-color: grey;
			text-align: left;
			padding-left: 6%;
		
		}
		input[type=radio]{
			width: 10%;
		}
		input[type=submit]{
			width: auto;
		}
		input{
			width: 80%;
			border-radius:3px;
			font-size: 18px;
			padding: 5px;

		}
		div{
			width: 65%;
			padding-top:0%;
			margin-left: 18%;
			margin-top: 10px;
			background-color: lightgrey
		}
	</style>

	<script type="text/javascript">
		function show(type) {
			document.getElementById('Certification').style.display="None";
			document.getElementById('Achievements').style.display="None";
			document.getElementById('Conference').style.display="None";
			
			if (type==1) {
			document.getElementById('Certification').style.display="block";
			document.getElementById('Achievements').style.display="None";
			document.getElementById('Conference').style.display="None";
			}
			if(type==2) {
			document.getElementById('Achievements').style.display="block";
			document.getElementById('Certification').style.display="None";
			document.getElementById('Conference').style.display="None";

			}
			if(type==3) {
			document.getElementById('Conference').style.display="block";
			document.getElementById('Certification').style.display="None";
			document.getElementById('Achievements').style.display="None";

			}
		}
	
		function validate(type) {
			if (type=='cert') {
				var des=document.forms['cert']['description'].value;

			}
			else if (type=='achi') {
				var des=document.forms['achi']['description'].value;

			}
			else if (type=='conf') {
				var des=document.forms['conf']['description'].value;
			}

			if (des=='Certified in ' || des=="") {
				alert('Fill the content...')
				return false;
			}
			return true;
		}
		
	// 	function validateforupdatecerti() {
	// 		alert('validateforupdate');
	// 		var des=document.forms['updatecert']['updatedata'].value;
	// 		alert(des);
	// 		output(des);
		
	// 	}
	// 	function validateforupdateachie() {
	// 		alert('validateforupdateachi');
		
	// 			var des=document.forms['updateachi']['update'].value;

	// 		output(des);
		
	// 	}
	// 	function validateforupdateworkshop() {
	// 		alert('validateforupdateworkshop');
	// 		var des=document.forms['updateworkshop']['update'].value;
	// 		output(des);
		
	// 	}

	// 	function output(des) {
	// 			// var des=document.forms['conf']['update'].value;
	// 		if (des=='Certified in ' || des=="") {
	// 			alert('Fill the content...')
	// 			return false;
	// 		}
	// 		return false;
			
	// 	}
	// function al() {
	// 	alert('ehy');
	// 	var des=document.forms['updatecert']['updatedata'].disabled=false;

	// }
	</script>

</head>
<body onload="show(1)" >
	<div >
		<ul>
			<li><a onclick="show(1)">Certification</a></li>
			<li><a onclick="show(2)">Achievements</a></li>
			<li><a onclick="show(3)">Conference</a></li>
		</ul>
	</div>






	<div id="Certification">												<!-- Certification / Online Courses -->
			<form name='cert' action="certificationsquery.php" method="post" onsubmit="return validate('cert')">
				<table width="100%" cellpadding="10%">
					<tr>
						<th colspan="3"  class="title" style="background-color: #92C4E3">Certification / Online Courses:</th>
					</tr>
					<tr>
						<?php 
						$fetcha="select * from certification where prn='$prn'";
						$result=mysqli_query($con,$fetcha);
						$arow=mysqli_num_rows($result)+1;?>
						<th ><p><?php echo $arow ?></p></th>
						<td id="tools" colspan="3"><textarea cols="100" rows="6" name="description" style="border-radius: 5px;width: 100%;font-size: 18px">Certified in </textarea></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add" id="addbtn"></td>
					</tr>
				<input type="hidden" name="type" value="certification">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							$count=0;
							$type='cert';
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form name='updatecert' action='certificationsquery.php' method=post onsubmit='validateforupdatecerti()'>
										<tr >
										<td>".++$count."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."'' 	></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 
										 ">
										 <input type='hidden' name='updatetype' value='certification'>
										 </form>

										<form action='deletequery.php' method=post>
									 		<input type='submit' value='Delete' >
									 		<input type='hidden' name='row' value=".$row['no'].">	
									 		<input type='hidden' name='table' value='certification'>
									 	</form>
									 </td>
										</tr>
									";
																		
							}		
						} 
						?>
					
				</table>
		</div>
		<div id="Achievements">												<!-- Achievements -->
			<form name='achi' action="certificationsquery.php" method="post" onsubmit="return validate('achi')">
				<table width="100%" cellpadding="10%">
					<tr>
						<th colspan="3"  class="title" style="background-color: #92C4E3">Achievements:</th>
					</tr>
					<tr>
						<?php 
						$fetcha="select * from achievements where prn='$prn'";
						$result=mysqli_query($con,$fetcha);
						$arow=mysqli_num_rows($result)+1;?>
						<th ><p><?php echo $arow ?></p></th>
						<td id="tools" colspan="3"><textarea cols="100" rows="6" name="description" style="border-radius: 5px;width: 100%;">Certified in </textarea></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add" id="addbtn"></td>
					</tr>
				<input type="hidden" name="type" value="achievements">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							$count=0;
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form name='updateachi' action='certificationsquery.php' method=post onsubmit='validateforupdateachie()'>
										<tr>
										<td>".++$count."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 ">
										 <input type='hidden' name='updatetype' value='achievements'>
										</form>
										<form action='deletequery.php' method=post>
									 		<input type='submit' value='Delete'>
									 		<input type='hidden' name='row' value=".$row['no'].">	
									 		<input type='hidden' name='table' value='achievements'>
									 	</form>
									 </td>
										</tr>
									</form>";
								$_SESSION['arow']=$row['no'];
																		
							}		
						} 
						?>
				
				</table>

		</div>
		<div id="Conference">												<!-- Conference / Workshop -->
			<form name='conf' action="certificationsquery.php" method="post" onsubmit="return validate('conf')">
		
				<table width="100%" cellpadding="10%">
					<tr>
						<th colspan="3"  class="title" style="background-color: #92C4E3">Conference / Workshop:</th>
					</tr>
					<tr>
						<?php 
						$fetcha="select * from Workshop where prn='$prn'";
						$result=mysqli_query($con,$fetcha);
						$arow=mysqli_num_rows($result)+1;?>
						<td ><p><?php echo $arow ?></p></td>
						<td id="tools" colspan="3"><textarea cols="100" rows="6" name="description" style="border-radius: 5px;width: 100%;">Certified in </textarea></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add" id="addbtn"></td>
					</tr>
				<input type="hidden" name="type" value="Workshop">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							$count=0;
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form name='updateworkshop' action='certificationsquery.php' method=post onsubmit='validateforupdateworkshop()'>
										<tr>
										<td>".++$count."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify' >
										<input type='hidden' name='update' value=".$row['no'].
										 ">
										 <input type='hidden' name='updatetype' value='workshop'>
									</form>
										 
								 	<form action='deletequery.php' method=post>
								 		<input type='submit' value='Delete'>
								 		<input type='hidden' name='row' value=".$row['no'].">	
								 		<input type='hidden' name='table' value='workshop'>
								 	</form>
									 </td>
									</tr>
									</form>";
								$_SESSION['arow']=$row['no'];
																		
							}		
						} 
						?>
			</table>				
		</div>
</body>
</html>