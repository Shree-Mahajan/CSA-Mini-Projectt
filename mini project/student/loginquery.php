<?php 
session_start();
require '../databaseconnectivity.php';

$prn=$_REQUEST["prn"];
$password=$_REQUEST["password"];
$user=$_REQUEST["email"];	
$email='';


// echo $user.$password.$prn;
	if ($user=='login') {
		
		$sql_id="select * from login where prn='$prn' and password='$password'";
		$result=mysqli_query($con,$sql_id);

		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result))
				{
					$email=$row['email'];
					echo "<br>Your Id is:=".$row["prn"]."<br>".$row['password'].'<br>'.$row['email'];
				}
		}
		if ($email!='') {
			$_SESSION['stemail']=$email;
			$_SESSION['stprn']=$prn;
			
			header("Location:profile.php");
		}else{

			echo "window.alert('Invalid prn / password')";
			header("Location:login.php");
		}

		
	}
	else{

		$sql_id="select * from login where prn='$prn' and email='$email'";
		$result=mysqli_query($con,$sql_id);

		if(mysqli_num_rows($result)>0)
		{
			echo "email";
			echo "email already exists..";
		}
		else{
			$sql_id="insert into login values('$prn','$user','$password');";
			if(mysqli_query($con,$sql_id))
				echo "</br>inserted";
			else
				echo "</br>not inserted";
		}



	}


 ?>