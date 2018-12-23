<!-----Developed by satyam sinha ------->

<!-----Use this with permisson---------->


<!------Copyrighted------------------------>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
</head>
<body>
	<div id="header">
		<h1>Gym Management System</h1>
	</div>
	
	<form action="" method="post">
		<table id="container">
			<tr>
			<th colspan="3"><b><font color="#939292">Log in</b></th>
		</tr>
		<tr>
			<td><b><font color="#939292">User name:</b></td><td><input class="ins"  type="text" name="username" ></td>
		</tr>
		<tr>
			<td><b><font color="#939292">Password:</b></td><td><input class="ins" type="Password" name="Password"></td>
		</tr>
		<br>
		<tr>
			
		</tr>
		<tr>
			<td colspan="3"><input id="login"  type="submit" name="log" value="Log in"></td>
		</tr>
		</table>
	</form>
	<div id="log">
		<h1>User login</h1>
	</div>
</body>
</html>
<?php
if (isset($_POST['log'])) {
	session_start();
	$conn=mysqli_connect('localhost','root','','fk');
	$query="SELECT * FROM `member`";
	$run=mysqli_query($conn,$query);
	while ($data=mysqli_fetch_assoc($run)) {
		if ($_POST['username']==$data['username'] and $_POST['Password']==$data['password']) {
			$_SESSION['user']=$data['username'];
			header('location:homepage.php');

		}
	}
	echo "<b class='popup'>Incorrect username or password</b>";
}else{
	echo "<b class='popup'>Click here to log in</b>";
}


?>