<?php 
session_start();
require '../databaseconnectivity.php';

$prn=$_REQUEST["prn"];
$password=$_REQUEST["password"];
$user=$_REQUEST["email"];	
$email='';

	if ($user=='login') {
		
		$sql_id="select * from login where prn='$prn' and password='$password'";
		$result=mysqli_query($con,$sql_id);

		if(mysqli_num_rows($result)>0)
		{
			while ($row=mysqli_fetch_assoc($result))
				{
					$email=$row['email'];
				}
		}
		if ($email!='') {
			$_SESSION['stemail']=$email;
			$_SESSION['stprn']=$prn;
			header("Location:studhome.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Invalid prn / password');</script>";
			header("Location:login.php");
		}
	}
	else{

		$sql_id="select * from login where prn='$prn' and email='$email'";
		$result=mysqli_query($con,$sql_id);

		if(mysqli_num_rows($result)>0)
		{
			echo "<script type='text/javascript'>alert('Email already exists...');</script>";
		}
		else{
			$sql_id="insert into login values('$prn','$user','$password');";
			if(mysqli_query($con,$sql_id)){
				
			$_SESSION['stemail']=$email;
			$_SESSION['stprn']=$prn;
				header("Location:studhome.php");
			}
			else
				echo "<script type='text/javascript'>alert('Some issue occured!');</script>";
		}
	}
 ?>