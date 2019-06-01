<?php

			session_start();
				
				if(isset($_SESSION['uid'])) // Getting this value from login.php
				{
					echo "";                //$_SESSION['uid'];
				}
				else
				{
					header('location: ../login.php'); 	// if session is not set, it will redirect to login.php. 
					//Otherwise after browser is closed(session destroyed), then also once opening browser http://127.0.0.1/SMS/admin/admindash.php will take to dashboard even without using username and password. .. takes to http://127.0.0.1/SMS/login.php	
				}		
?>


<?php
	include('header.php'); // HTML start
	include('titlehead.php');
?>


<form method="post" action="addstudent.php" enctype="multipart/form-data"> 
   <table align="center" border="1" style="width:70%; margin-top:40px;">
		
		<tr>
			<th> USN No. </th>
			<td><input type="text" name="usn" placeholder="Enter your USN No. " required></td>
		</tr>
		
		<tr>
			<th> Name </th>
			<td><input type="text" name="name" placeholder="Enter your Full Name " required></td>
		</tr>
		
		<tr>
			<th> Native Place </th>
			<td><input type="text" name="city" placeholder="Enter your Native place " required></td>
		</tr>
		
		<tr>
			<th> Parent's Phone No. </th>
			<td><input type="text" name="parentno" placeholder="Enter your Parent's Phone No. " required></td>
		</tr>
		
		<tr>
			<th> Branch </th>
			<td>
			<select name="bran" required>
						<option value="ME">MECHANICAL</option>
						<option value="CS">CS</option>
						<option value="EC">EC</option>
						<option value="EEE">EEE</option>
						<option value="IS">IS</option>
						<option value="CIVIL">CIVIL</option>
						<option value="BIO TECH">BIO TECH</option>
					</select>
			</td>		
		</tr>
		
		<tr>
			<th> Semester </th>
			<td>
				<select name="sem" required>
							<option value="1">1st</option>
							<option value="2">2nd</option>
							<option value="3">3rd</option>
							<option value="4">4th</option>
							<option value="5">5th</option>
							<option value="6">6th</option>
							<option value="7">7th</option>
							<option value="8">8th</option>
						</select>	
			</td>			
		</tr>
		
		<tr>
			<th> Photo </th>
			<td><input type="file" name="img" required></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
		
   </table>
 </form>
</body>


<?php 

if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		$usn=$_POST['usn'];	
		$name=$_POST['name'];
		$city=$_POST['city'];
		$parentno=$_POST['parentno']; 
		$bran=$_POST['bran']; 
		$sem=$_POST['sem']; 
		$imagename=$_FILES['img']['name'];
		$tempname=$_FILES['img']['tmp_name'];
		
		move_uploaded_file($tempname,"../dataimg/$imagename");
		
		//echo "<pre>";
		//print_r($_POST);
		//echo "<pre>";
		
		$qry="INSERT INTO student (USNno, name, native, parentno, branch, semester, Photo) VALUES ('$usn','$name','$city','$parentno','$bran','$sem','$imagename')";
		//echo "$qry<br>";
	//INSERT INTO `student`(`USNno`, `name`, `native`, `parentno`, `branch`, `semester`, `Photo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])	
		
		$run=mysqli_query($con,$qry);
		
		if($run)
		{  //echo "done";
			?>
				<script>
					alert('Data Inserted Successfully');
				</script>
				<?php

		}	
		
		else
		{
			echo("ERROR: ".mysqli_error($con));
		}	
	}
?> 
   
   
   