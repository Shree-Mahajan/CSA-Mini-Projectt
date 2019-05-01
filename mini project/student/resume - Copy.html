<?php 
require '../menubar.php';
session_start();
require '../databaseconnectivity.php';

$prn=$_SESSION['stprn'];
$email=$_SESSION['stemail'];


/*Profile*/
$name='';
$address='';
$phone='';
$semail='';
$hobbie='';
$language='';
$sql_id="select * from profile where prn='$prn'";
			$result=mysqli_query($con,$sql_id);

			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
					// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
					$name=$row['name'];
					$address=$row['address'];
					$phone=$row['phone'];
					$semail=$row['semail'];
					$hobbie=$row['hobbies'];
					$language=$row['language'];
					$nm=$row['name'];
				}
			}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resume</title>
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
			input{
			width: 80%;
			border-radius:5px;
		}
		input[type=submit]{
			width: auto;
		}
	
	</style>
	<script type="text/javascript">
		function add(type) {
			var data='';
			if (type=='tech') 
				data=document.getElementById('tech').value;
			else
				data=document.getElementById('skills').value;

			var xml=new XMLHttpRequest();
			xml.open('GET','resumequery.php?data='+data+'&type='+type,false);
			xml.send(null);
		}
	</script>
</head>
<body>
	<div style="width: 60%;padding:5%">
		<table width="100%" cellpadding="5px">
			<div>														<!-- first -->
				<tr style="height:250px">
					<td style="width: 15%;" id="photo">PHOTO</td>
					<td colspan="2" style="width: 75%;padding: 0px"><img src="../mitlogo.png"></td>
					<td style="width: 15%"><?php echo $prn ?></td>
				</tr>
				<tr>
					<th>Name:</th>
					<td colspan="3" ><?php echo $name ?></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td colspan="3"><?php echo $email ?> , <?php echo $semail ?></td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td colspan="3"><?php echo $phone ?></td>
				</tr>
			</div>
			
			<div>													<!-- objective -->
			<tr>
				<th colspan="4" class="title">Objective</th>
			</tr>
			<tr>
				<td colspan="4"><textarea cols="180" rows="5"></textarea></td>
			</tr>
			</div>
			<div>														<!-- Educational details -->
				<tr>
					<th colspan=4 class="title">Educational details:</th>
				</tr> 
				<tr>
					
					<th class="thwhite">Sem</th>
					<th>Month/Year</th>
					<th>SGPA</th>
					<th>CGPA</th>
				</tr>
			<?php 
				$sql_id="select * from education where prn='$prn' order by sem DESC";
				$res=mysqli_query($con,$sql_id);
				if (mysqli_num_rows($res)>0) {
					while ($row=mysqli_fetch_assoc($res)) {
					?>
				<tr>						
					<td id="sem"><?php echo $row['sem'] ?></td>
					<td id="year"><?php echo $row['year'] ?></td>
					<td id="sgpa"><?php echo $row['sgpa'] ?></td>
					<td id="cgpa"><?php echo $row['credits'] ?></td>
				</tr>
				<?php
					}

				}
			 ?>
				
				<tr>													<!-- Qualification -->
					<th>Qualification</th>
					<th>Univarsity</th>
					<th>Month & year</th>
					<th>Percentage</th>
				</tr>
				<tr>
					<td>qual</td>
					<td>qual</td>
					<td>qual</td>
					<td>qual</td>
				</tr>
			</div>
			<div>														<!-- Technical Knowledge -->
				<tr>
					<th colspan="4" class="title">Technical Skills</th>
				</tr>
				<tr>
					<td colspan="4" >	
						<form name='technical' action="resumequery.php" method="post">	
							<input type="text" name="data" >
							<input type="submit" value="add" style=" float: right" required>
							<input type="hidden" name="type" value="technical_skills">
						</form>
					</td>
				</tr>
				<?php 
					$sql_id="select * from technical_skills where prn='$prn'";
					$res=mysqli_query($con,$sql_id);
					if (mysqli_num_rows($res)>0) {
						while ($row=mysqli_fetch_assoc($res)) {
							echo "
								<form action='resumequery.php' method=post>
										<tr>
										<td>".$row['no']."</td>

										<td colspan='2'><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td>
											<input type='submit' value='Modify'>
											<input type='hidden' name='update' value=".$row['no'].">
											 <input type='hidden' name='updatetype' value='technical_skills'></td>
										 </td>
										</tr>
									</form>";
								
						}
						

					}
				 ?>
			</div>
			<div>														<!-- Tools-->
				<tr>
					<th colspan="4" class="title">Tools</th>
				</tr>
				<tr>
					<td colspan="4" >	
						<form name='tools' action="resumequery.php" method="post">	
							<input type="text" name="data" >
							<input type="submit" value="add" style=" float: right" required>
							<input type="hidden" name="type" value="tools">
						</form>
					</td>
				</tr>
				<?php 
					$sql_id="select * from tools where prn='$prn'";
					$res=mysqli_query($con,$sql_id);
					if (mysqli_num_rows($res)>0) {
						while ($row=mysqli_fetch_assoc($res)) {
							echo "
								<form action='resumequery.php' method=post>
										<tr>
										<td>".$row['no']."</td>

										<td colspan='2'><input type='text' name='updatedata' value='". $row['description']."''></td>
										<td>
											<input type='submit' value='Modify'>
											<input type='hidden' name='update' value=".$row['no'].">
											 <input type='hidden' name='updatetype' value='tools'></td>
										 </td>
										</tr>
									</form>";
								
						}
						

					}
				 ?>
			</div>
			<div>														<!-- Platform-->
				<tr>
					<th colspan="4" class="title">Platform / OS</th>
				</tr>
				<tr>
					<td colspan="4" >
						<input type="text" id="skills" ><input type="submit" onclick="add()" value="Add" style=" float: right">
					</td>
				</tr>
			</div>
			<div>														<!-- SOI-->
				<tr>
					<th colspan="4" class="title">Subject of Interest</th>
				</tr>
				<tr>
					<td colspan="4" >
								<input type="text" id="skills" ><input type="submit" onclick="addsoi()" value="Add" style=" float: right">
					</td>
				</tr>
			</div>
			<?php 
				$sql_id="select * from internship where prn='$prn'";
				$res=mysqli_query($con,$sql_id);
				if (mysqli_num_rows($res)>0) {
					while ($row=mysqli_fetch_assoc($res)) {
						?>	
			<div>														<!-- Internship -->
				<tr>
					<th colspan="4" class="title">Internship</th>
				</tr>
				<tr>
					<th>Company</th>
					<td id="company" colspan="3"><?php echo $row['company'] ?></td>
				</tr>
				<tr>
					<th>Project</th>
					<td id="project"  colspan="3"><?php echo $row['project'] ?></td>
				</tr>
				<tr>	
					<th>Role</th>
					<td id="role"  colspan="3"><?php echo $row['role'] ?></td>
				</tr>
				<tr>	
					<th>Duration</th>
					<td id="duration"  colspan="3"><?php echo $row['duration'] ?></td>
				</tr>

				<tr></tr>
				<tr>
					<th>Description:</th>
					<td colspan="3" id="description"><?php echo $row['description'] ?></td>
				</tr>
			</div>	
			<?php 
					}
				}

				$sql_id="select * from project where prn='$prn'";
				$res=mysqli_query($con,$sql_id);
				if (mysqli_num_rows($res)>0) {
					while ($row=mysqli_fetch_assoc($res)) {
						?>	
			
			 ?>
			<div>															<!-- projects -->
				<tr>
					<th colspan="4"  class="title">Projects</th>
				</tr>
				<tr>
					<th style="padding: 5%;">Title</th>
					<td id="title" colspan="4"><?php echo $row['title'] ?></td>
				</tr>
				<tr>
					<th>Teamsize</th>
					<td id="teamsize" colspan="4"><?php echo $row['teamsize'] ?></td>
				</tr>
				<tr>
					<th>Duration</th>
					<td id="duration" colspan="4"><?php echo $row['duration'] ?></td>
				</tr>
				<tr>
					<th>Tools</th>
					<td id="tools" colspan="4"><?php echo $row['tools'] ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td id="description" colspan="3"><?php echo $row['description'] ?></td>
				</tr>
			</div>

			<?php 
					}
				}
				?>
			<div>															<!-- certification -->
				<?php 
					$sql_id="select * from certification where prn='$prn'";
					$result=mysqli_query($con,$sql_id);

					if(mysqli_num_rows($result)>0)
					{?>
				<tr>
					<th colspan="4" class="title">Certification / Online Courses</th>
				</tr>		
					<?php	while ($row=mysqli_fetch_assoc($result)) {
							echo "<tr><td colspan='4'>".$row['description']."</td></tr>";
						}
					}
				 ?>	
			</div>
			<div>															<!-- Achievements -->
				<?php 
					$sql_id="select * from achievements where prn='$prn'";
					$result=mysqli_query($con,$sql_id);

					if(mysqli_num_rows($result)>0)
					{?>
				<tr>
					<th colspan="4" class="title">Achievements</th>
				</tr>
					<?php	while ($row=mysqli_fetch_assoc($result)) {
							echo "<tr><td colspan='4'>".$row['description']."</td></tr>";
						}
					}
				 ?>	
			</div>
			<div>																<!-- conference -->
				<?php 
					$sql_id="select * from workshop where prn='$prn'";
					$result=mysqli_query($con,$sql_id);

					if(mysqli_num_rows($result)>0)
					{?>
				<tr>
					<th colspan="4" class="title">Conference / Workshop</th>
				</tr>
					<?php	while ($row=mysqli_fetch_assoc($result)) {
							echo "<tr><td colspan='4'>".$row['description']."</td></tr>";
						}
					}
				 ?>	
			</div>
			<div>																<!-- hobbies -->
				<?php if ($hobbie!='') {?>
				<tr>
					<th colspan="4" class="title">Hobbies</th>
				</tr>
				<tr>
					<td id="hobbie" colspan="4"><?php echo $hobbie ?></td>
				</tr>
				<?php } ?>
			</div>
			<div>	
				<?php if ($language!='') {?>									<!-- Language -->
				<tr>
					<th colspan="4" class="title">Language preference</th>
				</tr>
				<tr>
					<td id="lang" colspan="4"><?php echo $language ?></td>
				</tr>
				<?php } ?>									
			</div>
		</table>
	</div>
</body>
</html>