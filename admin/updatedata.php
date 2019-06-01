<?php


include('../dbcon.php');
		
		$usn=$_POST['met'];	
		$usn1=$_POST['usn'];
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
		
		//$qry="INSERT INTO student (USNno, name, native, parentno, branch, semester, Photo) VALUES ('$usn','$name','$city','$parentno','$bran','$sem','$imagename')";
		//echo "$qry<br>";
	
		$qry="UPDATE `student` SET `USNno` = '$usn1', `name` = '$name', `native` = '$city', `parentno` = '$parentno', `branch` = '$bran', `semester` = '$sem', `Photo` = '$imagename' WHERE `USNno` = '$usn';";
//UPDATE `student` SET `USNno` = '1323', `name` = 'rter', `native` = 'yvft', `parentno` = '655454', `branch` = 'hytreswew', `semester` = '9145', `Photo` = 'gfddd' WHERE `student`.`USNno` = '132';
			//  UPDATE `student` SET `name` = 'rte', `native` = 'yvf', `parentno` = '6554', `branch` = 'hytresw', `semester` = '91', `Photo` = 'gfd' WHERE `USNno` = '132';
		$run=mysqli_query($con,$qry);
		
		if($run)
		{  //echo "done";
			?>
				<script>
					alert('Data Updated Successfully');
					window.open('editform.php?met=<?php echo $usn1; ?>','_self');
				</script>
				<?php

		}	
		
		else
		{
			echo("ERROR: ".mysqli_error($con));
		}	
	
?>
   
   
   


