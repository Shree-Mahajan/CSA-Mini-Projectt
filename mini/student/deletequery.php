<?php 
session_start();
require '../databaseconnectivity.php';

$row=(!empty($_REQUEST['row']))?$_REQUEST['row']:'';
$table=(!empty($_REQUEST['table']))?$_REQUEST['table']:"";
// $=(!empty($_REQUEST['updatetype']))?$_REQUEST['updatetype']:"";
$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];


echo $row.$table;

$sql_id="delete from $table where prn=$prn and no=$row";
if (mysqli_query($con,$sql_id)) {
	echo 'deleted';
}
else
	echo "not deleted".mysqli_error($con);

if ($table=='internship') {
	header("Location:internship.php");
}else if ($table=='project') {
	header("Location:academics.php");
}else  {
	header("Location:certifications.php");
}


 ?>