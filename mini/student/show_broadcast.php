<?php 
require '../databaseconnectivity.php';
session_start();
$rowno=(!empty($_REQUEST['rowno']))?$_REQUEST['rowno']:"0";
$year=(!empty($_REQUEST['year']))?$_REQUEST['year']:"";
$id=(!empty($_REQUEST['id']))?$_REQUEST['id']:"";
$apply=(!empty($_REQUEST['apply']))?$_REQUEST['apply']:"";

$prn=$_SESSION['stprn'];

if ($apply!='') {
		$sql_id="select * from apply_company where prn='$prn' and bid='$id' and bno='$rowno'";
		$result=mysqli_query($con,$sql_id);

		if(mysqli_num_rows($result)>0)
		{	
			echo "alert";
			echo "<script type='text/javascript'>alert('You already applied to this company...');</script>";
			// header('Location:studhome.php');
		}

		else{
			$query="insert into apply_company (bid, bno, prn) values ('$id','$rowno','$prn')";
			if (mysqli_query($con,$query)) {
				echo "<script type='text/javascript'>alert('Applied successfully....');</script>";
				header('Location:studhome.php');
			}

		}

}
else{
	$result=mysqli_query($con,"select * from broadcast where year='$year' and no='$rowno';");


	if(mysqli_num_rows($result)>0)
	{
	while ($row=mysqli_fetch_assoc($result)) 
		{
								echo"
									<center><span>".$row['message']."</span></center>";
		}
	}
	}													
 ?>