<?php 

require "databaseconnectivity.php";

$result=mysqli_query($con,"select distinct Passout_batch from profile;");
// $r='';
while ($row=mysqli_fetch_assoc($result)) 									{
										$r.= $row['Passout_batch'];
										// <?php echo ($year=='Regular')?'checked':''
																
									}
 ?>