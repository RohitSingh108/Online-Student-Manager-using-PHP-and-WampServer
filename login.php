<?php
session_start(); // we are starting session at the start, so if the http://127.0.0.1/SMS/login.php is opened in a new tab, after we have logged in, http://127.0.0.1/SMS/admin/admindash.php must appear

if(isset($_SESSION['uid']))
{ // Even you go to index page and then admin login, you are directed directly to admindashboard, because you are already logged in.
	header('location:admin/admindash.php');
}


?>

<html>

	<head>
		<title>ADMIN LOGIN</title>
	</head>


	<body bgcolor="#0cffd2";>
	<h4 align="right" style="margin-right:20px;"><a href="index.php" style="text-decoration:none;">Click to go Back to Home Page </a></h4>
	<h1 align="center">Admin Login</h1>
		
		<form action="login.php" method="post">
		
			<table align="center">
				<tr>
					<td>Username</td>
					<td><input type="text" name="uname" required></td>
				</tr>
					
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" required></td>
				</tr>	
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
				</tr>	
			
			</table>
		
		
		</form>

	</body>
	
</html>	

<?php


include('dbcon.php');

if(isset($_POST['login']))
{
	
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	
	$qry="SELECT * FROM admin WHERE username='$username' AND password = '$password'"; //Fetch the data from admin table of DB where username and password are the one taken from form
	
	$run=mysqli_query($con,$qry); // mysqli_query(connection variable, query variable)
	
	$row= mysqli_num_rows($run); // it checks the number of rows
	//if username and password exist, we get atleast 1 row. Otherwise, zero rows.
	
	if($row<1)
		{
			?>
			<script>
				alert('Username or Password not matching!!! Try Again');
				window.open('login.php','_self');
			</script>;
		<?php
		}
	else
		{
				$data=mysqli_fetch_assoc($run); //query result stored inside $data
				
				$id=$data['id']; // we are taking id key which is inside $data 
				
				//echo "id = ".$id;  Check if id is visible
				
				//session_start();
				
				$_SESSION['uid']=$id; // Session variable of name uid, and we set the id value which we get 
				header('location:admin/admindash.php'); // Directing to Admin Dashboard
		} 	
}

?>



