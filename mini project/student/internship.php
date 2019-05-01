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
					<td colspan="2"><input type="submit" name="submit"></td>	
				</tr>

			</form>
		</table>
	</div>
			<?php 
				$sql_id="select * from internship where prn='$prn'";
				$result=mysqli_query($con,$sql_id);
				$count=0;
				if(mysqli_num_rows($result)>0)
				{
					while ($row=mysqli_fetch_assoc($result)) {
						// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
						$company=$row['company'];
						$project=$row['project'];
						$role=$row['role'];
						$duration=$row['duration'];
						$description=$row['description'];
						$count++;
			?>
	<div>
		<form name="profile" action="internshipquery.php" method="post" enctype="multipart/form-data" onsubmit="return true">
			<table border="1" cellspacing="0">
				<tr>
					<th>Company* (<?php echo $count ?>):</th>
					<th><input type="text" name="company"  value="<?php echo $company ?>" readonly></th>
				</tr>
				<tr>
					<th>Project*:</th>
					<th><input type="text" name="project" value="<?php echo $project ?>" required></th>
				</tr>
				<tr>
					<th>Role*:</th>
					<th><input type="text" name="role" value="<?php echo $role ?>"required></th>
				</tr>
				<tr>
					<th>Duration*:</th>
					<th><input type='text' name="duration" value='<?php echo $duration?>' required></th>
				<tr>
						<th>Description*:</th>
					<th><textarea cols='50' rows="5"  name="description"  required><?php echo $description ?></textarea></th>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Modify / Update"></td>	
				</tr>
				<input type="hidden" name="updaterow" value="<?php echo $count ?>">
				<input type="hidden" name="update" value="update">
			</table>
		</form>
	</div>
			<?php
					}
				}

			 ?>
</body>
	
</html>