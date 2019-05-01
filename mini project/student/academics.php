<?php 
// session_start();
require '../menubar.php';
require 'add_1012dse.php';
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
		input[type=submit]{
			width: auto;
		}
		input{
			width: 80%;
			border-radius:5px;
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
	</script>
</head>

<body onload="inacitve(0)">
		
	
	<div style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%">								<!-- education -->
		<table width="100%" cellpadding="5px" >

			<form name="education" method="post" action="add_academics.php" onsubmit="return submitt()">

				<tr>
					<th colspan="5" class="title">Educational details:</th>
				</tr> 
				<tr>
					
					<td colspan="5" style="padding: 3%" onclick="year()">
						<input type="radio" name="edu" value="Regular">Regular <input type="radio" name="edu" value="DSE">DSE
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
							<?php
								require '../databaseconnectivity.php';

								$prn = $_SESSION["stprn"];

								$result=mysqli_query($con,"select * from education where prn='".$prn."';");
								$s = mysqli_num_rows($result)+1;
								echo $s;
							?>
							</label></td>
						<td id="credit"><input type="number" name="credit" placeholder="1-150" maxlength="3"></td>
						<td id="grade"><input type="number" name="grade" placeholder="0-999" maxlength="3"></td>
						<td id="sgpa"><input type="number" name="sgpa" placeholder="0-10" maxlength="3" ></td>
						<td style=""><input type="submit" name="save" value="Save / Submit"></td>
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
									<form action='add_academics.php' method=post>
										<tr>
										<td>".$row['sem']."</td>

										<td><input type='text' name='updateCredits' value='". $row['credits']."'' ></td>
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

?>
		</table>
	</div>
	
<div style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%" >									<!-- SSC HSC DSE -->
		<table width="100%" cellpadding="5px">
			<form name="after" method="post" action="add_1012dse.php" onsubmit="return submit3()">
				<tr>
					<th colspan="5" class="title">Educational details:</th>
				</tr> 
				<tr>
					<th >SSC:</th>
					<th><input type="number" name="ssc" placeholder="" class="input1" value="<?php echo $ssc ?>" maxlength="3"></th>
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
						<input type='text' name='latkt' placeholder="in number" maxlength="2" >
					</th>
					<th>Dead ATKT:</th>
					<th>
						<input type='text' name='datkt' placeholder="in number" maxlength="2" >
					</th>
				</tr>
				<tr>
					<th>Educational Gap:</th>
					<th>
						<input type='radio' name='edu_gap' value="Yes" >Yes
						<input type="radio" name="edu_gap" value="No">No
					</th>
					<th>Year Down:</th>
					<th>
						<input type='radio' name='ydown' value="Yes" >Yes
						<input type="radio" name="ydown" value="No">No
					</th>
				</tr>
				<tr>
					<td colspan="5">
						<input type="submit" name="save" value="Save">
					</td>

				</tr>
			</form>
		</table>
	</div>

	<div  style="width: 60%;padding:5%;padding-top:0%;margin-left: 15%">												<!-- projects -->
			<form action="add_projects.php" method="POST">
			<table width="100%" cellpadding="10%">
				<tr>
					<th colspan="8"  class="title">Projects:</th>
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
					<th colspan="1">Title</th>
					<td colspan="7"><input type="text" name="title" placeholder="project name"></td>
				</tr>
				<tr>
					<th colspan="1">Teamsize</th>
					<td id="teamsize" colspan="7"><input type="text" name="teamsize" placeholder="Team Size"></td>
				</tr>
				<tr>
					<th colspan="1">Duration</th>
					<td id="duration" colspan="7"><input type="text" name="duration" placeholder="Span of Project"></td>
				</tr>
				<tr>
					<th colspan="1">Tools</th>
					<td id="tools" colspan="7"><input type="text" name="tools" placeholder="Tools"></td>
				</tr>
				<tr>
					<th>Role</th>
					<td id="tools" colspan="7"><input type="text" name="role" placeholder="Role"></td>
				</tr>
				<tr>
					<th>Description</th>
					<td id="tools" colspan="7"><textarea cols="83" rows="6" name="description" style="border-radius: 5px;"></textarea></td>
				</tr>
				<tr>
					<td colspan="8"><input type="submit" name="projectsubmit" value="submit"></td>
				</tr>
			</form>

<?php
require '../databaseconnectivity.php';

$prn = $_SESSION["stprn"];

	$result=mysqli_query($con,"select * from project where prn='".$prn."';");

	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) 
			{
				$s=$row['no']+1;
									echo"
									<form action='add_projects.php' method=post>
										<tr>
										<td>".$s."</td>

										<td><input type='text' name='updatetitle' value='". $row['title']."''></td>
										<td><input type='text' name='updateteamsize' value='". $row['teamsize']."''></td>
										<td><input type='text' name='updateduration' value='". $row['duration']."''></td>
										<td><input type='text' name='updatetools' value='". $row['tools']."''></td>
										<td><input type='text' name='updaterole' value='". $row['role']."''></td>
										<td><input type='text' name='updatedescription' value='". $row['description']."''></td>
										<td><input type='submit' value='Modify'>
										<input type='hidden' name='update' value=".$row['no'].
										 
										 ">
										 <input type='hidden' name='type' value='modi'></td>
										 </td>
										</tr>
									</form>";
			}
	}

?>


			</table>
		</div>

</body>
</html>