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
			border-radius:5px;
		}
		div{
			width: 80%;
			padding-top:0%;
			margin-left: 10%;
			margin-top: 10px;
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

			if (des=='') {
				alert('Fill the content...')
				return false;
			}
			return true;
		}
	</script>

</head>
<body onload="show(1)">
	<div >
		<ul>
			<li ><a onclick="show(1)">Certification</a></li>
			<li><a onclick="show(2)">Achievements</a></li>
			<li><a onclick="show(3)">Conference</a></li>
		</ul>
	</div>






	<div id="Certification">												<!-- Certification / Online Courses -->
			<form name='cert' action="certificationsquery.php" method="post" onsubmit="return validate('cert')">
				<table width="100%" cellpadding="10%">
					<tr>
						<th colspan="3"  class="title">Certification / Online Courses:</th>
					</tr>
					<tr>
						<?php 
						$fetcha="select * from certification where prn='$prn'";
						$result=mysqli_query($con,$fetcha);
						$arow=mysqli_num_rows($result)+1;?>
						<th ><p><?php echo $arow ?></p></th>
						<td id="tools" colspan="3"><textarea cols="100" rows="6" name="description" style="border-radius: 5px;width: 100%;">Certified in </textarea></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add"></td>
					</tr>
				<input type="hidden" name="type" value="certification">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form action='certificationsquery.php' method=post>
										<tr>
										<td>".$row['no']."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 
										 ">
										 <input type='hidden' name='updatetype' value='certification'></td>
										 </td>
										</tr>
									</form>";
																		
							}		
						} 
						?>
					
				</table>
		</div>
		<div id="Achievements">												<!-- Achievements -->
			<form name='achi' action="certificationsquery.php" method="post" onsubmit="return validate('achi')">
				<table width="100%" cellpadding="10%">
					<tr>
						<th colspan="3"  class="title">Achievements:</th>
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
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add"></td>
					</tr>
				<input type="hidden" name="type" value="achievements">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form action='certificationsquery.php' method=post>
										<tr>
										<td>".$row['no']."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 ">
										 <input type='hidden' name='updatetype' value='achievements'></td>
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
						<th colspan="2"  class="title">Conference / Workshop:</th>
					</tr>
					<tr>
						<?php 
						$fetcha="select * from Workshop where prn='$prn'";
						$result=mysqli_query($con,$fetcha);
						$arow=mysqli_num_rows($result)+1;?>
						<th ><p><?php echo $arow ?></p></th>
						<td id="tools" colspan="3"><textarea cols="100" rows="6" name="description" style="border-radius: 5px;width: 100%;">Certified in </textarea></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="projectsubmit" value="Add"></td>
					</tr>
				<input type="hidden" name="type" value="Workshop">
				<input type="hidden" name="arow" value="<?php echo $arow ?>">
			</form>
					<?php

						if (mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
								echo "
									<form action='certificationsquery.php' method=post>
										<tr>
										<td>".$row['no']."</td>

										<td><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 ">
										 <input type='hidden' name='updatetype' value='workshop'></td>
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