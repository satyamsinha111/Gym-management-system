<!-----Developed by satyam sinha ------->

<!-----Use this with permisson---------->


<!------Copyrighted------------------------>





<?php
error_reporting(0);

session_start();

$user=$_SESSION['user'];



?>



<!DOCTYPE html>
<html> 
<head>
	<title>Add member</title>
	<link rel="stylesheet" type="text/css" href="css/style5.css">

</head>
<body>
	<div id="header">
		<h1>Gym Management System</h1>
	</div>
	<div id="log">
		<h1>Add member</h1>
	</div>
	<form method="post" action="" enctype="multipart/form-data">
		<table id="container">
			<tr>
				<td colspan="3"><img id="ava" src="image/avatar.png"></td>
			</tr>
			<tr>
			<td colspan="3">
			<div id="upload">
				<button  type="submit" id="btn">Upload</button>
				<input  id='in' type="file" name="pic">
			
			</div>
		</td>
	</tr>
			<tr>
				<td><b>First name:</b></td><td><input type="text" name="fname" required="required"></td>
			</tr>
			<tr>
				<td><b>Second name:</b></td><td><input type="text" name="sname" required="required"></td>
			</tr>
			<tr>
				<td><b>E-mail:</b></td><td><input type="text" name="email" required="required"></td>
			</tr>
			<tr>
				<td><b>Username:</b></td><td><input type="text" name="username" required="required"></td>
			</tr>
			<tr>
				<td><b>Password:</b></td><td><input type="password" name="P1" required="required"></td>
			</tr>
			<tr>
				<td><b>Confirm password:</b></td><td><input type="password" name="P2" required="required"></td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan="3"><input id="login"  onclick="upload()" type="submit" name="add" value="Add member"></td>
			</tr>
			<tr>
				
			</tr>
			<tr>
				<td colspan="3"><font id="GUI" color="#e51616"></font></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="js/myscript.js"></script>
</body>
</html>


<?php
 	
	if ($user!='') {
		if (isset($_POST['add']))
 	{
 	$pass1=$_POST['P1'];
 	$pass2=$_POST['P2'];
 	 if($pass1==$pass2 and $pass1!='' and $pass2!='' ){
  	$firstname=$_POST['fname'];
  	$secondname=$_POST['sname'];
  	$email=$_POST['email'];
  	$username=$_POST['username'];
  	$password=$_POST['P2'];
  	$photo=$_FILES['pic']['name'];
  	$temp=$_FILES['pic']['tmp_name'];
  	$folder='applicationImage/'.$photo;
  	$conn=mysqli_connect('localhost','root','','fk');
 	move_uploaded_file($temp, $folder);
  	$query="INSERT INTO `member`(`first name`, `second name`, `email`, `photo`, `username`, `password`) VALUES ('$firstname','$secondname','$email','$photo','$username','$password')";
    $run=mysqli_query($conn,$query);
 	if ($run==TRUE) {
 		echo "<b id='war'> Member added </b>";
 	}
 
  	
  }
  elseif ($pass1=='' and $pass2=='') {
  	echo "<b id='war'><font color='#e02a2a'>Pasword not set</b>";
  }
  else{
  	echo "<b id='war'><font color='#e02a2a'>Password Don`t match</b>";
  }
 }
else{
	echo "<b id='war'>Click to add member</b>";
}
	}
	else{
		header('location:admin.php');
	}
?>