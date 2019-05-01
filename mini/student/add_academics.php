<?php
session_start();
include"../menubar.php";
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

if ($type=='1012') {
	$ssc=(!empty($_REQUEST['ssc']))?$_REQUEST['ssc']:"";
	$hsc=(!empty($_REQUEST['hsc']))?$_REQUEST['hsc']:"";
	$dse=(!empty($_REQUEST['dse']))?$_REQUEST['dse']:"";
	$liveATKT=(!empty($_REQUEST['latkt']))?$_REQUEST['latkt']:"0";
	$deadATKT=(!empty($_REQUEST['datkt']))?$_REQUEST['datkt']:"0";
	$edugap=(!empty($_REQUEST['edu_gap']))?$_REQUEST['edu_gap']:"No";
	$ydown=(!empty($_REQUEST['ydown']))?$_REQUEST['ydown']:"No";
	

echo $edugap;
	$aggregate=(!empty($_REQUEST['aggregate']))?$_REQUEST['aggregate']:"0";
	
	$sql_id="update profile set SSC='$ssc',HSC='$hsc',DSE='$dse',Live_ATKT='$liveATKT',Dead_ATKT='$deadATKT',Edu_gap='$edugap',Year_down='$ydown' WHERE prn='$prn';";
		if (mysqli_query($con,$sql_id)) {
			echo 'updated';
		}
		else
			echo "not updated";	
}

header("Location:academics.php");
?>