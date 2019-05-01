<?php 
session_start();
require '../databaseconnectivity.php';

$prn=$_SESSION['stprn'];
$email=$_SESSION['stemail'];
$data=(!empty($_REQUEST['data']))?$_REQUEST['data']:"";
$type=(!empty($_REQUEST['type']))?$_REQUEST['type']:"";
$updaterow=(!empty($_REQUEST['update']))?$_REQUEST['update']:"";
$updatedata=(!empty($_REQUEST['updatedata']))?$_REQUEST['updatedata']:"";
$updatetype=(!empty($_REQUEST['updatetype']))?$_REQUEST['updatetype']:"";

echo "<br>".$data.$type.$updaterow.$updatedata.$prn."<br>";


if ($updatetype=='') {
	$no=mysqli_num_rows(mysqli_query($con,"select * from $type where prn='$prn'; "))+1;
	$sql_id="insert into $type values('$no','$prn','$data');";
	echo $sql_id;
	if(mysqli_query($con,$sql_id)){
		echo "yupp";
	}else
		echo "nope".mysqli_error($con);
}
else{
	$sql_id="update $updatetype set description='$updatedata' where prn = '$prn' and no = '$updaterow';"	;
	echo $sql_id;

	if(mysqli_query($con,$sql_id)){
		echo "yupp";
	}else
		echo "nope".mysqli_error($con);
}





/*Certifications*/
$sql_id="select * from certification where prn='$prn'";
		if(mysqli_query($con,$sql_id)){
			echo "</br>extracted";}
			// header("Location:profile.php");}
		else
			echo "</br>not extracted".mysqli_error($con);

header("Location:resume.php")
?>