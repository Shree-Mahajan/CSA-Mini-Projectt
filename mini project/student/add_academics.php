<?php
session_start();
require '../databaseconnectivity.php';



$type = $_REQUEST["type"];
$prn = $_SESSION["stprn"];
if ($type == 'save'){
	$type=$_REQUEST["edu"];
	$credit=$_REQUEST["credit"];
	$sgpa=$_REQUEST["sgpa"];
	$grade=$_REQUEST["grade"];
	$sem=$_REQUEST["sem1"];


	$sql_query="insert into education values('$prn','$sem','$type','$credit','$grade','$sgpa');";

	if(mysqli_query($con,$sql_query))
		echo "</br>inserted";
	else
		echo "</br>not inserted";
}
else {
$sem_given=$_REQUEST["update"];
$credit = $_REQUEST["updateCredits"];
$grade = $_REQUEST["updateGrade"];
$sgpa = $_REQUEST["updateSGPA"];
$sql_id="update education set credits='$credit',grade='$grade',sgpa='$sgpa' where prn='$prn' and sem='$sem_given';";
$result=mysqli_query($con,$sql_id) or die("Error");

}
header("Location:academics.php");
?>