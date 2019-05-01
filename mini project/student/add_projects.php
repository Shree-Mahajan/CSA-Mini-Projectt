<?php
session_start();
include"../menubar.php";
require '../databaseconnectivity.php';


$type = $_REQUEST["type"];
$prn = $_SESSION["stprn"];

if ($type != 'modi'){
	$title=$_REQUEST["title"];
	$teamsize=$_REQUEST["teamsize"];
	$duration=$_REQUEST["duration"];
	$tools=$_REQUEST["tools"];
	$role=$_REQUEST["role"];
	$description=$_REQUEST["description"];
	
	$sql_query="insert into project values('$prn','$no','$title','$teamsize','$duration','$tools','$role','$description');";

	if(mysqli_query($con,$sql_query))
		echo "</br>inserted";
	else
		echo "</br>not inserted";
}
else {
$no = $_REQUEST["no"];
$description=$_REQUEST["updatedescription"];
$role = $_REQUEST["updaterole"];
$title = $_REQUEST["updatetitle"];
$teamsize = $_REQUEST["updateteamsize"];
$tools = $_REQUEST["updatetools"];
$duration = $_REQUEST["updateduration"];

$sql_id="update project set title='$title',teamsize='$teamsize',duration='$duration',tools='$tools',role='$role',description='$description' where prn='$prn' and no='$no';";
$result=mysqli_query($con,$sql_id) or die("Error");

}
header("Location:academics.php");
?>