<?php 
require '../databaseconnectivity.php';
require '../menubar.php'; ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Faculty</title>


 	<style type="text/css">
 			table,th,td{	
			border:1px solid black;
			text-align: center;
			border-collapse: collapse;

		}
		div{
			width: 65%;
			padding-top:0%;
			margin-left: 18%;
			margin-top: 10px;
			background-color: lightgrey
		}

		.filter{
			position: relative;
			left: 900px;
		}

 	</style>
 	<script src='fuck.js'></script>
 </head>
 <body onload="getData()">
<a href="broadcast.php">broadcast ki taraf ab tu hi dekh le kaha rakhna hai wo</a>
 <div style="width: 60%;height:90%;padding:5%;margin-left: 15%;float: left;" >								


		 	<caption><center>Student List</center></caption>
		<table width="100%" cellpadding="5px" id="datashow">

		</table>
	 		
		
	</div>
	<div style="float: left;height: 90%;width: 20%;border: 1px solid black;margin-left: 2%">
	<table width="100%" cellpadding="10px">
		<tr>
			<td>
				<select id='year' >
		 			<?php 
		 				echo "<option>All</option>";
						$result=mysqli_query($con,"select distinct Passout_batch from profile;");
							while ($row=mysqli_fetch_assoc($result)){ 									


								if ($row['Passout_batch']!='') {
									
									echo"<option >".$row['Passout_batch']."<option>";
									// <?php echo ($year=='Regular')?'checked':''
															
								}
						}
		 			 ?>
		 		</select>			
			</td>
		</tr>
		<tr>
			<td>
		 		<select id="edugap">
		 			<option>Educational Gap(Yes & No)</option>
		 			<option>Yes</option>
		 			<option>No</option>
		 		</select>
			
			</td>
		</tr>
		<tr>
			<td>
		 		<select id="yd">
		 			<option>Year Down(Yes & No)</option>
		 			<option>Yes</option>
		 			<option>No</option>
		 		</select>		
		 	</td>
		 </tr>
		 <tr>
		 	<td>
		 	<button onclick="getData()">Search</button>
				
			</td>
		</tr>
	</table>
		
	</div>

	 
 </body>

 </html>