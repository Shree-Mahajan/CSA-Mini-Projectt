<?php 
session_start();
require '../databaseconnectivity.php';

$ssc=(!empty($_REQUEST['ssc']))?$_REQUEST['ssc']:"10";
$hsc=(!empty($_REQUEST['hsc']))?$_REQUEST['hsc']:"";
$dse=(!empty($_REQUEST['dse']))?$_REQUEST['dse']:"";
$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];


$liveATKT=(!empty($_REQUEST['liveATKT']))?$_REQUEST['liveATKT']:"0";
$deadATKT=(!empty($_REQUEST['deadATKT']))?$_REQUEST['deadATKT']:"0";
$edugap=(!empty($_REQUEST['edugap']))?$_REQUEST['edugap']:"0";
$ydown=(!empty($_REQUEST['ydown']))?$_REQUEST['ydown']:"false";
$aggregate=(!empty($_REQUEST['aggregate']))?$_REQUEST['aggregate']:"0";
// $save=(!empty($_REQUEST['save']))?$_REQUEST['save']:"";
// $save=$_REQUEST['save'];

$sql_id="select * from profile where prn='$prn'";
			$result=mysqli_query($con,$sql_id);

			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
					// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
				
					$ssc=$row['SSC'];
					$hsc=$row['HSC'];
					$dse=$row['DSE'];
					$passout=$row['Passout_batch'];

					$nm=$row['name'];

					}
			}


// if ($save) {
	
	$sql_id="update profile set SSC='100',HSC='200',DSE='$dse' WHERE prn='$prn';";
		if (mysqli_query($con,$sql_id)) {
			// header("Location:academics.php");
			echo 'updated';
		}
		else
			echo "not updated";	
	// }	





 ?>