<?php 
require '../databaseconnectivity.php';
$year=(!empty($_REQUEST['var1']))?$_REQUEST['var1']:"";
$edugap=(!empty($_REQUEST['var2']))?$_REQUEST['var2']:"";
$yd=(!empty($_REQUEST['var3']))?$_REQUEST['var3']:"";
// $year=(!empty($_REQUEST['year']))?$_REQUEST['year']:"";
// echo $year;


unset($sql);
if ($year!='All') {
	$sql[]=" Passout_batch='".$year."'";
}
if ($edugap=='Yes') {
	$sql[]=" Edu_gap='".$edugap."'";
}else if ($edugap=='No') {
	$sql[]=" Edu_gap='".$edugap."'";
}
if ($yd=='Yes') {
	$sql[]=" Year_down='".$yd."'";
}else if ($yd=='No') {
	$sql[]=" Year_down='".$yd."'";
}

echo "<tr><td colspan=4>Year= '$year', Eduacational Gap= '$edugap', Year down= '$yd'</td></tr>";
// echo $sql[0]."".$sql[1];
if ($year=='All' || $edugap=='Educational Gap(Yes & No)' || $yd=='Year Down(Yes & No)') {
			// echo "<tr><td>Select the Year to show the students</td></tr>";

	$result=mysqli_query($con,"select * from profile ");
}
else{
	$result=mysqli_query($con,"SELECT * FROM `profile` WHERE ". implode(' AND ', $sql).";");
}
// echo "select * from profile where ". implode(' AND ', $sql).";";

// $result=mysqli_query($con,;");

		if ($result) {
			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) 
					{
						echo"
							<tr>
								<td><span>". $row['prn']."</span></td>
								<td><span><b>". $row['name']."</b></span></td>
								<td><span><b>". $row['email']."</b></span></td>
								<td><span><b>". $row['phone']."</b></span></td>
							</tr>";
				}
			}
			else{
				echo "<tr><td>No result to display</td></tr>";
			}
		}






					// 	if ($stationFilter) {
					// 	    $sql[] = " STATION_NETWORK = '$stationFilter' ";
					// 	}
					// 	if ($verticalFilter) {
					// 	    $sql[] = " VERTICAL = '$verticalFilter' ";
					// 	}

					// 	$query = "SELECT * FROM $tableName";

					// 	if (!empty($sql)) {
					// 	    $query .= ' WHERE ' . implode(' AND ', $sql);
					// 	}

					// 	echo $query;
	?>
