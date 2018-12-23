<!-----Developed by satyam sinha ------->

<!-----Use this with permisson---------->


<!------Copyrighted------------------------>



<?php
error_reporting(0);
session_start();
$user= $_SESSION['username'];
$con=mysqli_connect('localhost','root','','fk');

$query="SELECT * FROM `member`";
$run=mysqli_query($con,$query);

while ($data=mysqli_fetch_assoc($run)) {
	if ($data['username']==$user) {
		$fname=$data['first name'];
		$sname=$data['second name'];
		$email=$data['email'];
		$pic=$data['photo'];
		$username=$data['username'];
		$password=$data['password'];
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>update data here</title>
	<link rel="stylesheet" type="text/css" href="css/style7.css">
</head>
<body>
	<form method="post" action="" enctype="multipart/form-data">
		<table id="container">
			<tr>
				<td colspan="3"><img id="ava"  src='<?php          echo "applicationImage/".$pic         ?>'></td>
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
				<td><b>First name:</b></td><td><input type="text" name="fname" value="<?php  echo $fname   ?>" required="required"></td>
			</tr>
			<tr>
				<td><b>Second name:</b></td><td><input type="text" name="sname" value="<?php  echo $sname   ?>" required="required"></td>
			</tr>
			<tr>
				<td><b>E-mail:</b></td><td><input type="text" name="email" value="<?php  echo $email   ?>" required="required"></td>
			</tr>
			<tr>
				<td><b>Username:</b></td><td><input type="text" name="username" value="<?php  echo $username  ?>" required="required"></td>
			</tr>
			<tr>
				<td><b>Password:</b></td><td><input type="text" name="P1"  required="required"></td>
			</tr>
			<tr>
				<td><b>Confirm password:</b></td><td><input type="text" name="P2"  required="required"></td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan="3"><input id="login"  onclick="upload()" type="submit" name="add"  value="Add member"></td>
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

if (isset($_POST['add']))
{
	$pass1=$_POST['P1'];
 	$pass2=$_POST['P2'];
 	 if($pass1==$pass2 and $pass1!='' and $pass2!='' ){
 	 $pass1=$_POST['P1'];
 	 $pass2=$_POST['P2'];
  	 $firstname=$_POST['fname'];
  	 $secondname=$_POST['sname'];
  	 $email=$_POST['email'];
  	 $username=$_POST['username'];
  	 $password=$_POST['P2'];
  	 $photo=$_FILES['pic']['name'];
  	 $temp=$_FILES['pic']['tmp_name'];
  	 $folder='applicationImage/'.$photo;
 	 move_uploaded_file($temp, $folder);
 	 $query="UPDATE `member` SET`first name`='$firstname',`second name`='$secondname',`email`='$email',`photo`='$photo',`username`='$username',`password`='$password'";
 	 $run=mysqli_query($con,$query);
 	if ($run==TRUE) {
 		echo "<b id='war'> Member updated</b>";
 		session_unset();
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
	echo "<b id='war'>Click to update member</b>";
}




?>
