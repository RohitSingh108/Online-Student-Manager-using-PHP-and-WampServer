<?php

	function showdetails($branch, $semester, $usn)
	{
	
		include('dbcon.php');
		
		$sql="SELECT * FROM `student` WHERE `branch` ='$branch' AND `semester` = '$semester' AND `USNno` ='$usn'";
		
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)>0)
			{
				$data=mysqli_fetch_assoc($run);
				?>
				
					<table border="1" style="width:60%;" align="center">
							<tr>
								<th colspan="3"> STUDENT DETAILS</th>
							</tr>

							<tr>
								<td rowspan="7" align="center"><img src="dataimg/<?php echo $data['Photo']?>" style="max-height:400px; max-width:200px"></td>
							</tr>

							<tr>	
								<th>USN No. </th>
								<td><?php echo $data['USNno']; ?></td>
							</tr>	
							
							<tr>	
								<th>Name </th>
								<td><?php echo $data['name']; ?></td>
							</tr>	
							
							<tr>	
								<th>Native Place</th>
								<td><?php echo $data['native']; ?></td>
							</tr>	
							
							<tr>	
								<th>Parent's Phone Number </th>
								<td><?php echo $data['parentno']; ?></td>
							</tr>	
							
							<tr>	
								<th>Branch </th>
								<td><?php echo $data['branch']; ?></td>
							</tr>	
							
							<tr>	
								<th>Semester </th>
								<td><?php echo $data['semester']; ?></td>
							</tr>	
							
							
							
							
							
					</table>
				
				<?php
			
			}
		
		else
		{
		   echo "<script>alert('No Student Found.');</script>";
		}	
		
	}


?>