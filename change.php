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
	<title>Change your password</title>
<link rel="stylesheet" type="text/css" href="css/style9.css">
</head>
<body>

<div id="header">
		<h1>Gym Management System</h1>
	</div>

	<form action="" method="post">
		<table id="cont">
			<tr>
				<td><b>Enter your old password:</b></td><td><input type="text" name="old"></td>
			</tr>

			<tr>
				<td><b>Enter new password:</b></td><td><input type="text" name="tnew"></td>
			</tr>
			<tr>
				<td><b>Confirm it:</b></td><td><input type="text" name="new"></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td align="center" colspan="2"><input id="login" type="submit" name="submit"  value="change"></td>
			</tr>

		</table>

	</form>

</body>
</html>


<?php
if ($user!='') {
	if (isset($_POST['submit'])) {
	$pass1=$_POST['tnew'];
	$pass2=$_POST['new'];
	$oldpass=$_POST['old'];
	if ($pass1==$pass2) {
		$con=mysqli_connect('localhost','root','','fk');
		$query="SELECT * FROM `admin`";
		$run=mysqli_query($con,$query);

		$data=mysqli_fetch_assoc($run);
		$pass=$data['password'];
		if ($oldpass==$pass) {
			$query="UPDATE `admin` SET `password`='$pass2' ";
			$run=mysqli_query($con,$query);
			echo "<b class='alert'> password changed</b>";
		}
		else{
			echo "<b class='alert'> Password is not correct</b>";
		}
	}
	else{
		echo "<b class='alert'>password dont match</b>";
	}
}
else{
	echo "<b class='alert'>Change password</b>";
}
}else{
	header('location:admin.php');
}



?>