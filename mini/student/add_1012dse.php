<?php 
session_start();	
require '../databaseconnectivity.php';


$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];
$hsc=(!empty($_REQUEST['hsc']))?$_REQUEST['hsc']:"";
$dse=(!empty($_REQUEST['dse']))?$_REQUEST['dse']:"";
$liveATKT=(!empty($_REQUEST['liveATKT']))?$_REQUEST['liveATKT']:"0";
$deadATKT=(!empty($_REQUEST['deadATKT']))?$_REQUEST['deadATKT']:"0";
$edugap=(!empty($_REQUEST['edugap']))?$_REQUEST['edugap']:"0";
$ydown=(!empty($_REQUEST['ydown']))?$_REQUEST['ydown']:"false";
$aggregate=(!empty($_REQUEST['aggregate']))?$_REQUEST['aggregate']:"0";

$sql_id="update profile set SSC='$ssc',HSC='$hsc',DSE='$dse' WHERE prn='$prn';";
	if (mysqli_query($con,$sql_id)) {
		header("Location:academics.php");
		echo 'updated';
	}
	else
		echo "not updated";	

?>