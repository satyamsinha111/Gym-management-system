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
	<title>Change your pic</title>
	<link rel="stylesheet" type="text/css" href="css/style8.css">
</head>
<body>
	<div id="header">
		<h1>Gym Management System</h1>
	</div>

	<form action="" method="POST" enctype="multipart/form-data">
<table id="container">
			<tr>
				<td colspan="3"><img id="ava"  src="image/avatar.png"></td>
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
				<td colspan="3"><input id="login"  onclick="upload()" type="submit" name="add"  value="Add member"></td>
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
	$photo=$_FILES['pic']['name'];
	$tempo=$_FILES['pic']['tmp_name'];
	$folder="applicationImage/".$photo;
	move_uploaded_file($tempo, $folder);
    $con=mysqli_connect('localhost','root','','fk');
    $query="UPDATE `admin` SET `photo`='$photo'";
    $run=mysqli_query($con,$query);
    echo "<b id='war'> image updated</b>";

}

}
else{
	header('location:admin.php');
}
?>