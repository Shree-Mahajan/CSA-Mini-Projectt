<?php 
require '../databaseconnectivity.php';
require '../menubar.php'; ?>
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Broadcast</title>
</head>
<body>
	 <div style="width: 60%;padding:5%;margin-left: 15%;margin-top: 100px;" >								

		<form name='broadcast' action="add_broadcast.php" method="post" onsubmit="return true">
			<input type="text" name="title" placeholder="Title" required>
			<textarea rows="5" cols="100" placeholder="Enter the broadcast" name="broadcast" required></textarea>
			<input type="number" name="year" placeholder="For year" required>
			<input type="submit" name="submit" value="Submit">
		</form>

		<table width="100%" cellpadding="5px">
			<?php  
				$result=mysqli_query($con,"select * from broadcast where id=0;");

				if(mysqli_num_rows($result)>0)
				{
					while ($row=mysqli_fetch_assoc($result)) 
						{
												echo"
													<tr>
														<td><span><b>". $row['year']."</b></span></td>
														<td><span>". $row['title']."</span></td>
														<td><span>". $row['message']."</span></td>
														
													</tr>";
						}
				}

			?>
			<tr>
				
			</tr>
		</table>
	</div>

</body>
</html>