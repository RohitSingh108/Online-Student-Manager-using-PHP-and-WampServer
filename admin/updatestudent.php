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


<table align="center" style="margin-top:30px">

	<form action="updatestudent.php" method="post">
		
		<tr>
			<th> Enter USN No. </th>
			<td><input type="text" name="usn" placeholder="Enter USN No. " required></td>
		</tr>
		
		<tr>
			<th>Enter Student Name</th>
			<td><input type="text" name="name" placeholder="Enter Student Name " required></td>
		</tr>	
				
		<td colspan="2" align="center" ><input type="submit" name="submit" value="Search"></td>
	</form>
	
</table>	


<table align="center" width="80%" border="2" style="margin-top:30px">
	<tr style="background-color:black; color:white;">
		
		<th>IMAGE</th>
		<th>NAME</th>
		<th>USN NO</th>
		<th>EDIT</th>
	</tr>
<?php

	if(isset($_POST['submit']))
		{	
			
			include('../dbcon.php');
			
			$usn=$_POST['usn'];
			$name=$_POST['name'];
			
			$sql="SELECT * FROM `student` WHERE `USNno`='$usn' AND `name` LIKE '%$name%'"; 
			$run=mysqli_query($con,$sql);
			
			
			if(mysqli_num_rows($run)<1)
				{		?>
							<tr>
								<td colspan='5' align="center">
								No Record found. Try again.
								</td>
							</tr> <?php
			
				}	
			else
				{
					while($data=mysqli_fetch_assoc($run))
					{
							?>
								<tr align="center">
										
										<td><img src="../dataimg/<?php echo $data['Photo'];?>" style="max-width:100px;"</td>
										<td><?php echo $data['name']; ?></td>
										<td><?php echo $data['USNno']; ?></td> 
										<td><a href="editform.php?met=<?php echo $data['USNno'];?>" style="text-decoration:none;">CLICK HERE TO EDIT</a></td>  
										
	                            </tr>
						
							<?php  // url?variable get method  'met' is a variable  
					}	
				}
		}
?>	

</table>	

	