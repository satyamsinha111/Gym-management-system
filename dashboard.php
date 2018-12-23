<!-----Developed by satyam sinha ------->

<!-----Use this with permisson---------->


<!------Copyrighted------------------------>



<?php
error_reporting(0);
session_start();
$user=$_SESSION['user'];
if ($user!='') {
	$con=mysqli_connect('localhost','root','','fk');
$query="SELECT * FROM `admin`";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
$pic=$data['photo'];
$nme=$data['name'];
}
else{
	header('location:admin.php');
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style4.css"> 
</head>
<body>
	
		<img id="pro" src="<?php   echo 'applicationImage/'.$pic;       ?>">

		<div id="head">
			<h3 id="head"><?php      echo $nme;            ?>     </h3>
		</div>
	
	<div id="header">
		<h1>Gym Management System</h1>
	</div>
	<div id="log">
		<h1>Dashboard</h1>
	</div>
	<div id="add">
		<h2><a href="add.php">Add member</a></h2>
	</div>
	<div id="Delete">
		<h2><a href="delete.php">Delete member</a></h2>
	</div>
	<div id="Update">
		<h2><a href="update.php">Update member</a></h2>
	</div>
	<div id="picture">
		<h2><a href="pic.php">Admin picture</a></h2>
	</div>
	<div id="password">
		<h2><a href="change.php">Change password</a></h2>
	</div>
	<form action="" method="POST">
		<input type="submit" id="out" value="Log out" name="logout">
	</form>
		
	
	
</body>
</html>


<?php
 if (isset($_POST['logout'])){
 	session_unset();
 	header('location:admin.php');
}


?>