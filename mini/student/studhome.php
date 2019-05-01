<?php 
session_start();
require '../menubar.php';
require '../databaseconnectivity.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student</title>
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

 	</style>

 </head>
 <body>
 	<center><p><?php  echo "Welcome homie  ".$_SESSION['stemail'].$_SESSION['stprn'];	?></p></center>

 	 <div style="width: 60%;padding:5%;margin-left: 15%" >								
 		<table width="100%" cellpadding="5px">
 			<?php 


 				$result=mysqli_query($con,"select * from broadcast where year = (select Passout_batch from profile where prn=".$_SESSION['stprn'].");");

				if(mysqli_num_rows($result)>0)
				{
					while ($row=mysqli_fetch_assoc($result)) 
						{

							$sql_id="select * from apply_company where prn='".$_SESSION['stprn']."' and bid='".$row['id']."' and bno='".$row['no']."'";
							$res=mysqli_query($con,$sql_id);
							$apply='Apply';
							if(mysqli_num_rows($res)>0)
							{	
								$apply='Applied';					
							}

												echo"
													<tr>
														<td>
														<form name='show_data' action='show_broadcast.php' method='get' onsubmit='return true' style='width:92%;float:left'>
															<span><b>". $row['title']."</b></span>
															<input type='submit' value='View' style='float:right'>
															<input type='hidden' name='year' value='".$row['year']."'>
															<input type='hidden' name='rowno' value='".$row['no']."'>
														</form>

														<form name='apply' action='show_broadcast.php' method='get' onsubmit='return true' style='width:10%:float:right'>
															<input type='submit' value='$apply' style='float:right' ";
															 echo ($apply=='Applied')?'disabled':'enabled'.">
															 
															<input type='hidden' name='apply' value='apply'>
															<input type='hidden' name='rowno' value='".$row['no']."'>
															<input type='hidden' name='id' value='".$row['id']."'>
														</form>

														</td>


													</tr>";
						}
				}

			
 			?>
 		</p>
 		</table>
 	</div>
 </body>	
 </html>