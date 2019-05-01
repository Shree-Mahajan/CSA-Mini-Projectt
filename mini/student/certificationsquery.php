<?php 
session_start();
require '../databaseconnectivity.php';


$data=(!empty($_REQUEST['description']))?$_REQUEST['description']:"";
$type=(!empty($_REQUEST['type']))?$_REQUEST['type']:"";
$arow=(!empty($_REQUEST['arow']))?$_REQUEST['arow']:'';

$updaterow=(!empty($_REQUEST['update']))?$_REQUEST['update']:'';
$updatedata=(!empty($_REQUEST['updatedata']))?$_REQUEST['updatedata']:"";
$updatetype=(!empty($_REQUEST['updatetype']))?$_REQUEST['updatetype']:"";

echo 'upda t e '.$updatetype.'<br>'.$updatedata;

$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];

if ($type!="") {
	$sql_id="insert into $type values('$arow','$prn','$data');";
		if(mysqli_query($con,$sql_id)){
			echo "</br>inserted";}
			// header("Location:profile.php");}
		else
			echo "</br>not inserted".mysqli_error($con);
}


if ($updaterow!='') {
	$sql_id="update $updatetype set description='$updatedata' where prn='$prn' and no='$updaterow'";
	if (mysqli_query($con,$sql_id)) {
		echo 'updated';
	}
	else
		echo "not updated".mysqli_error($con);
}
header("Location:certifications.php");
 ?>