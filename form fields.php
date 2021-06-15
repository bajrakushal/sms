<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div>
<form>
<b>Name</b><input type="text" name="name"><br>
<b>Age </b><input type="text" name="age"><br>
<b>Gender</b>  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female<br>
<b>Email</b> <input type="text" name="email"><br>
 <br> Phone <input type="text" name="phone"><br>
<input type="submit" name="submit" value="submit">
</div>
</form>
<?php
if(isset($_REQUEST['submit']))
{
	$name=$_REQUEST['name'];
	$age=$_REQUEST['age'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	$regname='/[^a-zA-Z\d]/';
	if(($name && $age  && $email)=='')
	{
	echo '<span style="color:red">No any Fields can be empty!! <br></span>';
	}
	if(preg_match($regname,$name) || preg_match('/\d/',$name))
	{
		echo'<span style="color:red;">Name must not contain number or other special characters  !!<br></span>';
	}
	if(!is_numeric($age))
	{
		echo '<span style="color:red">Age must be number!<br></span>';
	}
	if(!isset($_REQUEST['gender']))
	{
		echo '<span style="color:red">Gender must be specified before submission!!</span>';
	}
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
    	echo '<span style="color:blue">valid email address :)</span>';
	}
	else
	{
		echo '<span style="color:red"><br>email format not matched"</span>';
	}
	if(preg_match('/^9[87][0123456]\d{7,7}$/',$phone))
	{}
	else
	{
		echo '<span style="color:red"><br>phone no. not valid</span>';
	}
}
?>
</body>
</html>