<!-----Developed by satyam sinha ------->

<!-----Use this with permisson---------->


<!------Copyrighted------------------------>




<?php
error_reporting(0);
session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
</head>
<body>
  <div id="header">
		<h1>Gym Management System</h1>
	</div>
	<div id="log">
		<h1>Admin Panel</a></h1>
	</div>
	<form action="" method="post">
		<table id="container">
			<tr>
			<th colspan="3"><b><font color="#939292">Log in</b></th>
		</tr>
		<tr>
			<td><b><font color="#939292">Admin name:</b></td><td><input class="ins"  type="text" name="username" ></td>
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
</body>
</html>
<?php
 if ($_POST['log']) {
      $user=$_POST['username'];
      $pass=$_POST['Password'];
      $_SESSION['user']=$user;
      $con=mysqli_connect('localhost','root','','fk');

      $query="SELECT * FROM `admin`";
      $run=mysqli_query($con,$query);
      while ($data=mysqli_fetch_assoc($run)){
      	if ($data['username']==$user && $data['password']==$pass) {
      		header('location:dashboard.php');
      	}
      }
      echo "<b id='guide'>login failed</b>";
 }else{
 	echo "<b id='guide'>Log in to go to dashboard</b>";
 }



?>