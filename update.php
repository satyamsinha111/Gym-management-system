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
	<title>Update member</title>
	<link rel="stylesheet" type="text/css" href="css/style7.css">
</head>
<body>
<div id="header">
		<h1>Gym Management System</h1>
	</div>
	<div id="log">
		<h1>Search</h1>
	</div>
	<form action="" method="POST">
	<input type="text" placeholder="search member by username" id="del" name="member">
	<input type="submit" value="search" id="search" name="search">
	</form>
</body>
</html>
<?php
	if ($user!='') {
		if (isset($_POST['search'])) {
		$user=$_POST['member'];
		$con=mysqli_connect('localhost','root','','fk');
		$query="SELECT * FROM `member`";
		$run=mysqli_query($con,$query);
		while ($data=mysqli_fetch_assoc($run)) {
			if ($data['username']==$user) {
				session_start();
				$_SESSION['username']=$user;
				header('location:update page.php');
			}
			
			    echo "<b id='war'> Member not found</b>";
			
		}

	}
	else{
		echo "<b id='gui'>Search member to be updated</b>";
	}

	}
	else{
		header('location:admin.php');
	}

?>