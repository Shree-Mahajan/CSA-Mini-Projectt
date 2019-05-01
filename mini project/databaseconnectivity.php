<?php
/*THIS IS USED TO CONNECT THE CON TO THE DATABASE*/


$database="placement";	/*Database name*/
$server="localhost";	/*Server name localhost for self computer you can give the ip address of the server system*/
$username="root";		/*Username of the database*/
$password="";			/*Password of the database if none then left the blank	*/

$con=mysqli_connect($server,$username,$password,$database);		/*Connect method for connecting database with php through mysqli*/
if (!$con) 														/*$con object returns the boolean value*/	
	die("Connnect unsuccessfull".mysqli_connnect_error());		/*To display the errors of database */
// else
// 	echo "connction successfull..";
?>