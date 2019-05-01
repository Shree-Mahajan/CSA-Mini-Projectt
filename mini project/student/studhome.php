<?php 
session_start();
require '../menubar.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>student</title>
 </head>
 <body>
 	<center><p><?php  echo "Welcome homie  ".$_SESSION['stemail'].$_SESSION['stprn'];	?></p></center>
 </body>
 </html>