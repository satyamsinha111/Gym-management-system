<?php
error_reporting(0);

session_start();

$user=$_SESSION['user'];
if ($user!='') {
	$con=mysqli_connect('localhost','root','','fk');

$query="SELECT * FROM `member`";

$run=mysqli_query($con,$query);

while ($data=mysqli_fetch_assoc($run)) {
	if ($data['username']==$user) {
		$fname=$data['first name'];
		$sname=$data['second name'];
		$pic=$data['photo'];
		$id=$data['memid'];
	}
}

}else{
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Your profile</title>
	<link rel="stylesheet" type="text/css" href="css/style10.css">
</head>
<body>
	<div id="header">
		<h1>Gym Management System</h1>
	</div>
	<form action="" method="post">
	<table id="container">
		<tr>
			<td>
				<img src="<?php  echo 'applicationImage/'.$pic ;?>">
			</td>
		</tr>
		<tr>
			<td><b>Your name is </b><?php   echo "$fname $sname" ;       ?></td>
		</tr>
		<tr>
			<td><b>Your Id is </b><?php     echo $id;                    ?></td>
		</tr>
		<tr>
			<td><input type="submit" id="login"  value="Log out" name="logout"></td>
		</tr>
	</table>
	</form>
</body>
</html>
<?php

if (isset($_POST['logout'])) {
	session_unset();
	header('location:login.php');
}



?>