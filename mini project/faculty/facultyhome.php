<?php 
require '../facultymenubar.php'; ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Faculty</title>
 	<style type="text/css">
 		input{
 			/*width: 100%;*/
 		}
 	</style>
 </head>
 <body>
 	<div style="border:1px solid black;margin-top:10px;height:60%;background-color: grey;float:left;">
 	 		<div style="border:1px solid black;width:20%;height:100%; margin-left:0%;background-color: grey;float:left;">				<!-- Filters -->
	 			<ul style="background-color: grey">
	 				<li><input type="number" name="year" max="4" placeholder="Year"></li>
	 				<li><input type="checkbox" name="year">DSE</li>
	 				<li><input type="checkbox" name="year">SGPA</li>
	 				<li><input type="checkbox" name="year"></li>
	 				<li><input type="checkbox" name="year"></li>
	 				<li><input type="checkbox" name="year"></li>
	 				<li><input type="checkbox" name="year"></li>
	 			</ul>
	 		</div>
	 		<div style="border:1px solid black;width:59%;height:100%; margin-left:0%;background-color: grey;float:left;">				<!-- Filters -->
	 			<h1>Outputs</h1>
	 		</div>
			<div style="border:1px solid black;width:20%;height:100%; margin-left:0%;background-color: grey;;float:left;">				<!-- Filters -->
	 			<h1>News</h1>
	 		</div>


 	</div>


 </body>
 </html>