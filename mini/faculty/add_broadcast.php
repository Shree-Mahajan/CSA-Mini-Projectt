<?php 
require '../databaseconnectivity.php';

$title=(!empty($_REQUEST['title']))?$_REQUEST['title']:"";
$broadcast=(!empty($_REQUEST['broadcast']))?$_REQUEST['broadcast']:"";
$year=(!empty($_REQUEST['year']))?$_REQUEST['year']:"";

if ($broadcast!="") {

	$result=mysqli_query($con,"select * from broadcast;");
	$row=mysqli_num_rows($result);

	

	$sql_id="insert into broadcast values('$row','0','$title','$broadcast','$year');";
	if(mysqli_query($con,$sql_id)){
		echo "</br>inserted";
		header("Location:facultyhome.php");}
	else
		echo "</br>not inserted".mysqli_error($con);
}
 ?>