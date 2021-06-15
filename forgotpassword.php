<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css?version=10">
</head>
<body>
<div class="container">
<form action="#" method="post">
<h1 align="center">New password</h1>
<input id="user" type="text" placeholder="Enter your username" name="user"><br>
<input id="pass" type="password" placeholder="New password" name="newpass"><br>
<input id="pass" type="password" placeholder="Confirm password" name="conpass"><br>
<input class="loginbutton" type="submit" name="Change" value="Change" >

</form>
<?php
if(isset($_REQUEST['Change']))
{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['newpass'];
	$confirmpass=$_REQUEST['conpass'];
	if($user==null || $pass==null || $confirmpass==null)
	{
		echo'<script language="javascript">';
		echo'alert("Please fill all the fields")';
		echo'</script>';
	}
	else
	{
		$connect=mysqli_connect("localhost","root","","portfolio");
		$query="SELECT * FROM adminlogin where username='$user'";
		$result=mysqli_query($connect,$query);
		$num=mysqli_num_rows($result);
		if($num==1)
		{
			if(strcmp($pass,$confirmpass))
			{
				echo '<div class="error"><span style="color:red"><br>*Password donot match</span></div>';
			}
			else
			{
				$query="UPDATE adminlogin SET password='$pass' WHERE username='$user'";	
				$result=mysqli_query($connect,$query);
				if($result>0)
				{
					echo'<script language="javascript">';
					echo'alert("Updation successful")';
					echo'</script>';
					
				}
			}
		}
		else
		{
			echo '<div class="error"><span style="color:red"><br>*Username not found</span></div>';
		}
		
	}
}
?>
</div>
</body>
</html>