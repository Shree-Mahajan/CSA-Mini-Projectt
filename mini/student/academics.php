<?php 
session_start();
require '../menubar.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Academics</title>
	<style type="text/css">
		table,th,td{	
			border:1px solid black;
			text-align: center;
			border-collapse: collapse;

		}
		.title{
			background-color: grey;
			text-align: left;
			padding-left: 6%;
		
		}
		input[type=radio]{
			width: 10%;
		}
		input[type='submit']:hover{
 			background-color: #21243B;
 			color: white;
 			cursor: pointer;
 			font-size: 22px;
 			background-color: green;
 		}
		input[type=submit]{
			font-size: 22px;
			height: 38px;
			width: 180px;

		}
		input{
			width: 80%;
			border-radius:3px;
			font-size: 20px;
			padding: 5px;
		}
		textarea{
			width: 80%;
			border-radius:3px;
			font-size: 20px;
			padding: 5px;	
		}

		div{
			width: 65%;
			padding-top:0%;
			margin-left: 18%;
			margin-top: 10px;
			background-color: lightgrey
		}

	</style>

	<script type="text/javascript">
		function inacitve(f) {						/*To enable and desble the contents*/
			
			if (f==0) {
				document.forms["education"]["credit"].disabled=true;
				document.forms["education"]["grade"].disabled=true;
				document.forms["education"]["sgpa"].disabled=true;	
				document.forms["education"]["save"].disabled=true;	

			}
			else{
				document.forms["education"]["credit"].disabled=false;
				document.forms["education"]["grade"].disabled=false;
				document.forms["education"]["sgpa"].disabled=false;		
				document.forms["education"]["save"].disabled=false;		
			}
		}

		function year() {
			var s = document.forms["education"]["sem1"].value;
			var type=document.forms["education"]["edu"].value;
			if (type=="Regular") {
				document.getElementById('sem').innerHTML=s;
			
			}
			else{
				document.getElementById('sem').innerHTML=2+parseInt(s);
			}
			inacitve(1);
		}
		function submitt() {
			var credit= document.forms["education"]["credit"].value;
			var grade=document.forms["education"]["grade"].value;
			var sgpa=document.forms["education"]["sgpa"].value;		
			alert(document.forms["education"]["sem"].value);
			var msg="";
			if (credit=='' || grade=='' || sgpa=='') {
				msg+="Fill out the fields...\n";
			}
			if (credit<1 || credit>150) {
				msg+="credit should be in between 1 to 150.\n";
			}
			if (grade<1 || grade>999) {
				msg+="grade should be in between 1 to 999.\n";
			}
			if (sgpa<1 || sgpa>10) {
				msg+="SGPA should be in between 1 to 10.\n";
			}
			if (msg!="") {
				alert(msg);
				return false;
			}else
				return true;
			
		}

		function submit3() {
			var latkt= document.forms["after"]["latkt"].value;
			var datkt=document.forms["after"]["datkt"].value;
			var edu_gap=document.forms["after"]["edu_gap"].value;		
			var ydown=document.forms["after"]["ydown"].value;		
			var ssc=document.forms["after"]["ssc"].value;		
			var hsc=document.forms["after"]["hsc"].value;		
			var dse=document.forms["after"]["dse"].value;		

			// alert(document.forms["after"]["sem"].value);
			var msg="";
			if (latkt=='' || datkt=='' || edu_gap=='' || ydown=='' || ssc=='' || hsc=='' || dse=='') {
				msg+="Fill out the fields...\n";
			}
			if (ssc<1 || ssc>100) {
				msg+="ssc should be in between 1 to 100.\n";
			}
			if (hsc<1 || hsc>100) {
				msg+="hsc should be in between 1 to 100.\n";
			}
			if (dse<1 || dse>100) {
				msg+="dse should be in between 1 to 100.\n";
			}
			if (edu_gap=="") {
				msg+="Educational gap error..\n";
			}
			if (ydown=="") {
				msg+="Year Down error..\n";
			}
			if (msg!="") {
				alert(msg);
				return false;
			}else
				return true;
		}

		function validate_update_sem() {
			var creadits=document.forms["update_sem"]["updateCredits"].value;
			var grade=document.forms["update_sem"]["updateGrade"].value;
			var sgpa=document.forms["update_sem"]["updateSGPA"].value;
			msg="";
			
			if (creadits=='' || sgpa=='' || grade=='') {
				msg+="Fill the fields..";
			}
			if (credit<1 || credit>150) {
				msg+="credit should be in between 1 to 150.\n";
			}
			if (grade<1 || grade>999) {
				msg+="grade should be in between 1 to 999.\n";
			}
			if (sgpa<1 || sgpa>10) {
				msg+="SGPA should be in between 1 to 10.\n";
			}
			if (msg!="") {
				alert(msg);
				return false;
			}else
				return true;
			
			return true;
		}

	function validate_project() {
		var title=document.forms["project"]["title"].value;
		var size=document.forms["project"]["teamsize"].value;
		var duration=document.forms["project"]["duration"].value;
		var tools=document.forms["project"]["tools"].value;
		var role=document.forms["project"]["role"].value;
		var description=document.forms["project"]["description"].value;
		

		msg="";
		if (title=='' || size==0 || duration=='' || tools=='' || role=='' || description=='') {
			msg+='Fill the Fields..';
		}
		if (msg!='') {
			alert(msg);
			return false;
		}
		return true;

	}
	
	</script>


</head>

<body onload="inacitve(1)">
	<div style="width: 60%;padding:5%;margin-left: 15%" >									<!-- education -->
		<table width="100%" cellpadding="5px">
			<form name="education" method="post" action="add_academics.php" onsubmit="return submitt()">
					<tr>
							<th colspan="5" class="title" style="background-color: #92C4E3">Educational details:</th>
					</tr> 
				<tr>
					<td colspan="5" style="padding: 3%" >
							<?php
								require '../databaseconnectivity.php';

								$prn = $_SESSION["stprn"];

								$result=mysqli_query($con,"select * from education where prn='".$prn."';");
											if(mysqli_num_rows($result)>0){
												while ($row=mysqli_fetch_assoc($result)) {
													$year=$row['year'];
												}
											}
											

								$s = mysqli_num_rows($result)+1;
							?>
						<input type="radio" name="edu" value="Regular" <?php echo ($year!='')?'disabled':'' ?> <?php echo ($year=='Regular')?'checked':'' ?>  onclick="year()">Regular 
						<input type="radio" name="edu" value="DSE" <?php echo ($year!='')?'disabled':'' ?> <?php echo ($year=='DSE')?'checked':'' ?>  onclick="year()">DSE
					</td>
				</tr>
					<tr>
						
						<th class="thwhite">Semester</th>
						<th>Creadits</th>
						<th>Grade Points</th>
						<th>SGPA</th>
						<th></th>
					</tr>
					<tr>															
						<td><label id="sem">
								<?php  echo $s;?>
							</label></td>
						<td id="credit"><input type="number" name="credit" placeholder="1-150" maxlength="3"></td>
						<td id="grade"><input type="number" name="grade" placeholder="0-999" maxlength="3"></td>
						<td id="sgpa"><input type="number" name="sgpa" placeholder="0-10" maxlength="3" ></td>
						<td><input type="submit" name="save" value="Save / Submit"></td>
					</tr>

					<input type="hidden" name="type" value="save">
					<input type="hidden" name="sem1" value="<?php echo $s ?>">
			</form>
<?php
require '../databaseconnectivity.php';

$prn = $_SESSION["stprn"];

	$result=mysqli_query($con,"select * from education where prn='".$prn."';");

	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) 
			{
									echo"
									<form name='update_sem' action='add_academics.php' method=post onsubmit='return validate_update_sem()'>
										<tr>
										<td>".$row['sem']."</td>

										<td><input type='text' name='updateCredits' value='". $row['credits']."''></td>
										<td><input type='text' name='updateGrade' value='". $row['grade']."''></td>
										<td><input type='text' name='updateSGPA' value='". $row['sgpa']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['sem'].
										 
										 ">
										 <input type='hidden' name='type' value='modi'></td>
										 </td>
										</tr>
									</form>";
			}
	}


$sql_id="select * from profile where prn='$prn'";
			$result=mysqli_query($con,$sql_id);

			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
					// echo $row['prn'].$row['name'].$row['address'].$row['phone'].$row['hobbies'].$row['language'];
				
					$ssc=$row['SSC'];
					$hsc=$row['HSC'];
					$dse=$row['DSE'];
					$latkt=$row['Live_ATKT'];
					$datkt=$row['Dead_ATKT'];
					$edugap=$row['Edu_gap'];
					$ydown=$row['Year_down'];
					// $passout=$row['Passout_batch'];

					$nm=$row['name'];

					}
			} 
?>
		</table>
	</div>


<div style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%" >									<!-- SSC HSC DSE -->
		<table width="100%" cellpadding="5px">
			<form name="after" method="post" action="add_academics.php" onsubmit="return submit3()">
				<tr>
					<th colspan="5" class="title">Educational details:</th>
				</tr> 
				<tr>
					<th >SSC:</th>
					<th><input type="number" name="ssc" placeholder="" class="input1" value="<?php echo $ssc ?>" maxlength="3" ></th>
					<th>HSC:</th>
					<th><input type="number" name="hsc" placeholder="" class="input1" value="<?php echo $hsc ?>" maxlength="3"></th>
				</tr>
				<tr>
					<th>DSE:</th>
					<th><input type="number" name="dse" placeholder="" class="input1" value="<?php echo $dse ?>" maxlength="3"></th>
					<th colspan="2"></th>
				</tr>
							
				<tr>
					<th>Live ATKT:</th>
					<th>
						<input type='text' name='latkt' placeholder="in number" value="<?php echo $latkt ?>" maxlength="2" >
					</th>
					<th>Dead ATKT:</th>
					<th>
						<input type='text' name='datkt' placeholder="in number" value="<?php echo $datkt ?>" maxlength="2" >
					</th>
				</tr>
				<tr>
					<th>Educational Gap:</th>
					<th>
						<input type='radio' name='edu_gap' value="Yes" <?php echo ($edugap=='Yes')?'checked':'' ?>>Yes
						<input type="radio" name="edu_gap" value="No" <?php echo ($edugap=='No')?'checked':'' ?>>No
					</th>
					<th>Year Down:</th>
					<th>
						<input type='radio' name='ydown' value="Yes" <?php echo ($ydown=='Yes')?'checked':'' ?>>Yes
						<input type="radio" name="ydown" value="No" <?php echo ($ydown=='No')?'checked':'' ?>>No
					</th>
				</tr>
				<tr>
					<td colspan="5">
						<input type="submit" name="save" value="Save">
						<input type="hidden" name="type" value="1012">
					</td>


				</tr>
			</form>
		</table>
	</div>

	<div  style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%">												<!-- projects -->
			<form name="project" action="add_projects.php" method="POST" onsubmit="return validate_project()">
			<table width="100%" cellpadding="10%">
				<tr>
					<th colspan="8"  class="title" style="background-color: #92C4E3">Projects:</th>
				</tr>
				<tr>
					<th colspan="8">Project 
					<?php
								require '../databaseconnectivity.php';

								$prn = $_SESSION["stprn"];

								$result=mysqli_query($con,"select * from project where prn='".$prn."';");
								$s = mysqli_num_rows($result)+1;
								echo $s;
							?>
								
					</th>
				</tr>
				<tr>
					<th colspan="1">Title*</th>
					<td colspan="7"><input type="text" name="title" placeholder="project name"></td>
				</tr>
				<tr>
					<th colspan="1">Teamsize*</th>
					<td id="teamsize" colspan="7"><input type="number" name="teamsize" placeholder="Team Size"></td>
				</tr>
				<tr>
					<th colspan="1">Duration*</th>
					<td id="duration" colspan="7"><input type="text" name="duration" placeholder="Span of Project"></td>
				</tr>
				<tr>
					<th colspan="1">Tools*</th>
					<td id="tools" colspan="7"><input type="text" name="tools" placeholder="Tools"></td>
				</tr>
				<tr>
					<th>Role*</th>
					<td id="tools" colspan="7"><input type="text" name="role" placeholder="Role"></td>
				</tr>
				<tr>
					<th>Description*</th>
					<td id="tools" colspan="7"><textarea cols="83" rows="6" name="description" style="border-radius: 5px;"></textarea></td>
				</tr>
				<tr>
					<td colspan="8">
						<input type="submit" name="projectsubmit" value="Submit">
						<input type="hidden" name="no" value="<?php echo $s ?>">
						<input type="hidden" name="type" value="">
					</td>
				</tr>
			</form>


			<?php

			$prn = $_SESSION["stprn"];

			$result=mysqli_query($con,"select * from project where prn='".$prn."';");

			if(mysqli_num_rows($result)>0)
			{
				$count=0;
				while ($row=mysqli_fetch_assoc($result)) 
				{
					$title = $row['title'];
					$teamsize = $row['teamsize'];
					$duration = $row['duration'];
					$tools = $row['tools'];
					$role = $row['role'];
					$description = $row['description'];
				?>
			</table>
		</div>
		<div  style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%">								<!-- dynamic project -->
			<table border="1" cellspacing="0" width="100%">
			<form name="update_project" action="add_projects.php" method="post" enctype="multipart/form-data" onsubmit="return true">
				<tr>
					<th>Project <?php echo ++$count; ?>:</th>
					<th><input type="text" name="updatetitle"  value="<?php echo $title; ?>" required></th>
				</tr>
				<tr>
					<th>Team size:</th>
					<th><input type="text" name="updateteamsize" value="<?php echo $teamsize; ?>" required></th>
				</tr>
				<tr>
					<th>Duration:</th>
					<th><input type='text' name="updateduration" value='<?php echo $duration; ?>' required></th>
				<tr>
				<tr>
					<th>Tools:</th>
					<th><input type="text" name="updatetools" value='<?php echo $tools; ?>' required></th>
				</tr>
				<tr>
					<th>Role:</th>
					<th><input type="text" name="updaterole" maxlength="10" value="<?php echo $role ?>"required></th>
				</tr>
					<th>Description:</th>
					<th>
						<!--<input type='text' name='updatedescription' value='<?php echo $row['description']?>'></th>-->
						 <textarea cols='50' rows="5"  name="updatedescription" required><?php echo $description ?></textarea>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Modify / Update">	
				
					
						<input type='hidden' name='update' value="<?php echo $row['no'] ?>">
						<input type='hidden' name='type' value='modi'>
						</form>
						<form  action="deletequery.php" method="post" enctype="multipart/form-data" onsubmit="return true">
							<input type="submit" name="submit" value="Delete">			
							<input type='hidden' name='row' value="<?php echo $row['no'] ?>">
							<input type='hidden' name='table' value='project'>
						</form>
					</td>
				</tr>
		</table>
	</div>
			<?php
					}
				}

			 ?>


</body>
</html>