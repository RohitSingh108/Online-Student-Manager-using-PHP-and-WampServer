<html>
	<head>
		<title>ONLINE COLLEGE STUDENT MANAGEMENT SYSTEM </title>
	</head>

	<body bgcolor="#0cffd2";>

			<h3 align="right" style="margin-right:20px;"><a href="login.php" style="text-decoration:none;">Admin Login</a></h3>
			<h1 align="center"> Welcome To Online College Student Management System </h1>
	
	<form method="post" action="index.php">
		<table style="width:35%;" align="center" border="2">
			<tr>
				<td colspan="2" align="center">Student Information</td>
			</tr>
			
			<tr>
				<td align="left">Choose Branch</td>
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
				<td align="left">Choose Semester</td>
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
				<td align="left" required>Enter USN No. </td>
					<td><input type="text" name="usn" required></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Show Details"></td>
			</tr>	
			
		</table>
	</form>
	</body>
</html>

<?php
if(isset($_POST['submit']))
	{
		
		$branch=$_POST['bran'];
		$semester=$_POST['sem'];
		$usn=$_POST['usn'];
		
		include('dbcon.php');
		include('function.php');
		
		showdetails($branch, $semester, $usn);
		
	}
	


?>


