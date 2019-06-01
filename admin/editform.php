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
	include('../dbcon.php');
	
	$met = $_GET['met'];
	
	$sql="SELECT * FROM `student` WHERE `USNno`='$met'";
	$run=mysqli_query($con,$sql);
	
	$data=mysqli_fetch_assoc($run);
	
?>

   
<form method="post" action="updatedata.php" enctype="multipart/form-data"> 
   <table align="center" border="1" style="width:70%; margin-top:40px;">
		
		<tr>
			<th> USN No. </th>
			<td><input type="text" name="usn" value=<?php echo $data['USNno']; ?> required></td>
		</tr>
		
		<tr>
			<th> Name </th>
			<td><input type="text" name="name" value=<?php echo $data['name']; ?> required></td>
		</tr>
		
		<tr>
			<th> Native Place </th>
			<td><input type="text" name="city" value=<?php echo $data['native']; ?> required></td>
		</tr>
		
		<tr>
			<th> Parent's Phone No. </th>
			<td><input type="text" name="parentno" value=<?php echo $data['parentno']; ?> required></td>
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
			<input type ="hidden" name="met" value="<?php echo $data['USNno']; ?>" >
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
		
   </table>
 </form>
</body>
                          