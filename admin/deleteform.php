<?php

include('../dbcon.php');
		
		
	
		$usn=$_REQUEST['met'];
		
		$qry="DELETE FROM `student` WHERE `USNno` = '$usn'";
		
		
		$run=mysqli_query($con,$qry);
		
		if($run)
		{  //echo "done";
			?>
				<script>
					alert('Data Deleted Successfully');
					window.open('deletestudent.php','_self');
				</script>
				<?php

		}	
		
		else
		{
			echo("ERROR: ".mysqli_error($con));
		}	





?>