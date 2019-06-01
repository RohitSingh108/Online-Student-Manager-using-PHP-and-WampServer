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
	include('header.php');
?>
		<div class="admintitle" align="center" >
			
			<h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size: 20px; text-decoration:none;">Logout </a></h4>
			<h1> Welcome to Admin Dashboard </h1>
		</div>
		
		<div class="dashboard">
			<table style="width:50%;" align="center">
				<tr>
					<td>1.</td>
					<td><a href="addstudent.php" style="text-decoration:none;">INSERT STUDENT DETAILS</a></td>
				</tr>
				
				<tr>
					<td>2.</td>
					<td><a href="updatestudent.php" style="text-decoration:none;">UPDATE STUDENT DETAILS</a></td>
				</tr>
				
				<tr>
					<td>3.</td>
					<td><a href="deletestudent.php" style="text-decoration:none;">DELETE STUDENT DETAILS</a></td>
				</tr>
			
		
			</table>
		</div>
	</body>
	
</html>	
	