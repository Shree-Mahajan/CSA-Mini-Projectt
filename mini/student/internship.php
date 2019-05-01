<?php 
// session_start();
require '../menubar.php';
require 'internshipquery.php';
 
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
 			width: 65%;
 			margin-left: 18%;
 		}
 		input{
 			width: 700px;
 			height: 30px;
 			border-radius: 3px;
 			background-color: #F1F4F5;
 			font-size: 18px;
 			padding: 5px;
 			height: 32px;
 		}
 		textarea{
 			width: 100%;
 			border-radius: 10px;
 		}
 		input[type='submit']:hover{
 			background-color: #21243B;
 			color: white;
 			border-radius: 3px;
 			cursor: pointer;
 			font-size: 22px;
 			padding: 5px;
 		}
	</style>
</head>
<body >
	<div>
		<table border="1" cellspacing="0">
			<form name="profile" action="internshipquery.php" method="post" enctype="multipart/form-data" onsubmit="return true">
				<tr>
					<th>Company*:</th>
					<th><input type="text" name="company"  required></th>
				</tr>
				<tr>
					<th>Project*:</th>
					<th><input type="text" name="project" required></th>
				</tr>
				<tr>
					<th>Role*:</th>
					<th><input type="text" name="role" required></th>
				</tr>
				<tr>
					<th>Duration*:</th>
					<th><input type='text' name="duration" required></th>
				<tr>
					<th>Description*:</th>
					<th><textarea cols='50' rows="5" name="description" required></textarea></th>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" style="font-size: 22px;width: 180px;height: 35px;"></td>	
				</tr>

			</form>
		</table>
	</div>
			<?php 
				$sql_id="select * from internship where prn='$prn'";
				$result=mysqli_query($con,$sql_id);
				
				if(mysqli_num_rows($result)>0)
				{
					$count=0;
					while ($row=mysqli_fetch_assoc($result)) {
						// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
						$company=$row['company'];
						$project=$row['project'];
						$role=$row['role'];
						$duration=$row['duration'];
						$description=$row['description'];

						
			?>
	<div>
		<form name="profile" action="internshipquery.php" method="post" enctype="multipart/form-data" onsubmit="return true">
			<table border="1" cellspacing="0">
				<tr>
					<th>Company* (<?php echo ++$count ?>):</th>
					<th><input type="text" name="company"  value="<?php echo $company ?>" readonly></th>
				</tr>
				<tr>
					<th>Project*:</th>
					<th><input type="text" name="project" value="<?php echo $project ?>" readonly></th>
				</tr>
				<tr>
					<th>Role*:</th>
					<th><input type="text" name="role" value="<?php echo $role ?>" readonly></th>
				</tr>
				<tr>
					<th>Duration*:</th>
					<th><input type='text' name="duration" value='<?php echo $duration?>' readonly></th>
				<tr>
					<th>Description*:</th>
					<th><textarea cols='50' rows="5"  name="description"  required><?php echo $description ?></textarea></th>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Modify / Update" style="width: 180px; font-size: 24px;height: 35px;">
					<input type="hidden" name="updaterow" value="<?php echo $row['no'] ?>">
					<input type="hidden" name="update" value="update">
					</form>
					<form  action="deletequery.php" method="post" enctype="multipart/form-data" onsubmit="return true">
						<input type="submit" name="submit" value="Delete" style="width: 180px; font-size: 24px;height: 35px;">
						<input type="hidden" name="row" value="<?php echo $row['no'] ?>">
						<input type="hidden" name="table" value="internship">
					</form>
					</td>
				</tr>
			</table>
	</div>
			<?php
					}
				}

			 ?>
</body>
	
</html>