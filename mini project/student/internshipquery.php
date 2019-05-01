<?php 
session_start();
require '../databaseconnectivity.php';
// $company=$_REQUEST['company'];
$company=(!empty($_REQUEST['company']))?$_REQUEST['company']:"";
$project=(!empty($_REQUEST['project']))?$_REQUEST['project']:"";
$role=(!empty($_REQUEST['role']))?$_REQUEST['role']:"";
$duration=(!empty($_REQUEST['duration']))?$_REQUEST['duration']:"";
$description=(!empty($_REQUEST['description']))?$_REQUEST['description']:"";

$updaterow=(!empty($_REQUEST['updaterow']))?$_REQUEST['updaterow']:"";
$update=(!empty($_REQUEST['update']))?$_REQUEST['update']:"";

$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];
$nm='';
$no=mysqli_num_rows(mysqli_query($con,"select * from internship where prn='$prn'"))+1;

echo $no.$company.$updaterow;

if ($company=='') {
	$sql_id="select * from internship where prn='$prn'";
			$result=mysqli_query($con,$sql_id);

			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
					$company=$row['company'];
					$project=$row['project'];
					$role=$row['role'];
					$duration=$row['duration'];
					$description=$row['description'];
				}
				// header("Location:internship.php");
			}
}
else{
	if ($update!='') {
		$sql_id="update internship set company='$company',project='$project',role='$role',duration='$duration',description='$description' WHERE prn='$prn' and no='$updaterow';";
		echo $sql_id;
		if (mysqli_query($con,$sql_id)) {
			echo 'updated';
		}
		else
			echo "not updated";	
	}
	else{
		$sql_id="insert into internship values('$no','$prn','$company','$project','$role','$duration','$description');";
			if(mysqli_query($con,$sql_id)){
				echo "</br>inserted";}
			else
				echo "</br>not inserted".mysqli_error($con);
	}
header("Location:internship.php");
}
 ?>