<?php
session_start(); 
include ("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="container">
<h2 class="loginh2">Admin Login Form</h2>
<form action="#" method="get">
<input id="user" type="text" placeholder="Enter Username" name="user"><br>
<div>&ensp;</div>
<input id="pass" type="password" placeholder="Enter Password" name="pass"><br>
<h4 class="loginh4"><a href="forgotpassword.php" target="_blank"> Forgot Password? </a></h4>
<input class="loginbutton" type="submit" name="Login" value="Login">
</form>
</div>

<?php
if(isset($_REQUEST['Login']))
{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	if($user==null || $pass==null)
	{
		echo'<script language="javascript">';
		echo'alert("Please fill all the fields")';
		echo'</script>';
	}
	else
	{
		$connect=mysqli_connect("localhost","root","","portfolio");
		$query="SELECT * FROM adminlogin where username='$user' and password='$pass'";
		$result=mysqli_query($connect,$query) or die("Not selected");
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			$_SESSION['admin']=$user;
			header('location:Student.php');
		}
		else
		{
			echo'<script language="javascript">';
			echo'alert("Username or password error")';
			echo'</script>';
		}
	
	}
		
	
}
?>

</body>
</html>