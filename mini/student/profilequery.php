<?php 
session_start();
require '../databaseconnectivity.php';

$name=(!empty($_REQUEST['name']))?$_REQUEST['name']:"";
$address=(!empty($_REQUEST['address']))?$_REQUEST['address']:"";
$phone=(!empty($_REQUEST['phone']))?$_REQUEST['phone']:"";
$hobbie=(!empty($_REQUEST['hobbie']))?$_REQUEST['hobbie']:"";
$language=(!empty($_REQUEST['language']))?$_REQUEST['language']:"";
$semail=(!empty($_REQUEST['semail']))?$_REQUEST['semail']:"";
$dob=(!empty($_REQUEST['dob']))?$_REQUEST['dob']:"";
$gender=(!empty($_REQUEST['gender']))?$_REQUEST['gender']:"";
$passout=(!empty($_REQUEST['passout']))?$_REQUEST['passout']:"";
// $ssc=(!empty($_REQUEST['ssc']))?$_REQUEST['ssc']:"";
// $hsc=(!empty($_REQUEST['hsc']))?$_REQUEST['hsc']:"";
// $dse=(!empty($_REQUEST['dse']))?$_REQUEST['dse']:"";

// $liveATKT="";
// $deadATKT="";
// $edugap="";
// $ydown="";
// $aggregate="";

		// $sql_id="insert into profile values('$prn','$name','$email','','$phone','$address','$hobbie','$language','$dob','gender','$ssc','$hsc','$dse','$liveATKT','$deadATKT','$edugap','$ydown','$passout','$aggregate');";


// $liveATKT=(!empty($_SESSION['liveATKT']))?$_SESSION['liveATKT']:"0";
// $deadATKT=(!empty($_SESSION['deadATKT']))?$_SESSION['deadATKT']:"0";
// $edugap=(!empty($_SESSION['edugap']))?$_SESSION['edugap']:"0";
// $ydown=(!empty($_SESSION['ydown']))?$_SESSION['ydown']:"false";
// $aggregate=(!empty($_SESSION['aggregate']))?$_SESSION['aggregate']:"0";

$email=$_SESSION['stemail'];
$prn=$_SESSION['stprn'];?>

<?php 
// $file = $_FILES['dp']['tmp_name'];	
// $image_name = addslashes($_FILES['dp']['name']);
// if (!isset($file))
// 	echo "File not selected!";
// else{
// 	if (isempty($file))
// 	echo "failed";
// else{
// $image = addslashes(file_get_contents($file)); //SQL Injection defence!
// echo $image;
// }
// }
if ($name=='') {
	$sql_id="select * from profile where prn='$prn'";
			$result=mysqli_query($con,$sql_id);

			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
					// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
					$name=$row['name'];
					$address=$row['address'];
					$phone=$row['phone'];
					$semail=$row['semail'];
					$hobbie=$row['hobbies'];
					$language=$row['language'];
					$dob=$row['DOB'];
					$gender=$row['Gender'];
					// $ssc=$row['SSC'];
					// $hsc=$row['HSC'];
					// $dse=$row['DSE'];
					$passout=$row['Passout_batch'];

					$nm=$row['name'];

					}
			}
}
else{
	$sql_id="select * from profile where prn='$prn'";
	$result=mysqli_query($con,$sql_id);
	$nm='';
	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$nm=$row['name'];
		}
	}

	if ($nm!='') {
		$sql_id="update profile set name='$name',email='$email',semail='$semail',phone='$phone',address='$address',hobbies='$hobbie',language='$language',DOB='$dob',Gender='$gender',Passout_batch='$passout' WHERE prn='$prn';";
		if (mysqli_query($con,$sql_id)) {
			echo 'updated';
			header("Location:profile.php");
		}
		else
			echo "not updated";	
	}
	else{

		echo $name.'<br>'.$address.'<br>'.$phone.'<br>'.$hobbie.'<br>'.$language.'<br>'.$email;
				
		$sql_id="insert into profile values('$prn','$name','$email','','$phone','$address','$hobbie','$language','$dob','gender','0','0','0','0','0','0','0','$passout','0');";
			if(mysqli_query($con,$sql_id)){
				echo "</br>inserted";
				header("Location:profile.php");}
			else
				echo "</br>not inserted".mysqli_error($con);
	}
}
 ?>