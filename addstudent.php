<?php 
include ("adminheader.php");
$name=$user=$pass=$roll=$class=$stream=$shift=$add=$section=$contact=$parent=$date=$gender=null;
if(isset($_POST['Add']))
{
	if(!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $_POST['name']))
	{
		$error_msg['name']="<span style='color:red;'>*Name is invalid</span>";
	}
	else
	{
		$name=$_POST['name'];
	}
	
	if($_POST['user']=="")
	{
		$error_msg['username']="<span style='color:red;'>*username is empty</span>";
	}
	else
	{
		$user=$_POST['user'];
	}
	if($_POST['pass']=="")
	{
		$error_msg['password']="<span style='color:red;'>*password is empty</span>";
	}
	else if (strlen($_POST['pass'])<6)
	{
		$error_msg['password']="<span style='color:red;'>*password must be more than 6 characters</span>";
	}
	if($_POST['conpass']=="")
	{
		$error_msg['password']="<span style='color:red;'>*password is empty</span>";
	}
	else if($_POST['pass']!=$_POST['conpass'])
	{
		$error_msg['password']="<span style='color:red;'>*password donot match</span>";
	}
	else
	{
		$pass=$_POST['pass'];
	}
	
	if($_POST['roll']=="")
	{
		$error_msg['roll']="<span style='color:red;'>*Roll is empty</span>";
	}
	else if(!is_numeric($_POST['roll']))
	{
		$error_msg['roll']="<span style='color:red;'>*Roll is not in number</span>";
	}
	else
	{
		$roll=$_POST['roll'];
	}
	if($_POST['class']=="")
	{
		$error_msg['class']="<span style='color:red;'>*Class is empty</span>";
	}
	else
	{
		$class=$_POST['class'];
	}
	if($_POST['stream']=="")
	{
		$error_msg['stream']="<span style='color:red;'>*Stream is empty</span>";
	}
	else
	{
		$stream=$_POST['stream'];
	}
	if($_POST['shift']=="")
	{
		$error_msg['shift']="<span style='color:red;'>*Shift is empty</span>";
	}
	else
	{
		$shift=$_POST['shift'];
	}
	if($_POST['Address']=="")
	{
		$error_msg['address']="<span style='color:red;'>*Address is empty</span>";
	}
	else
	{
		$add=$_POST['Address'];
	}
	if($_POST['contact']=="")
	{
		$error_msg['contact']="<span style='color:red;'>*Contact is empty</span>";
	}
	else if(!is_numeric($_POST['contact']))
	{
		$error_msg['contact']="<span style='color:red;'>*Contact is not in number</span>";
	}
	else if(strlen($_POST['contact'])<10)
	{
		$error_msg['contact']="<span style='color:red;'>*Contact is less than 10</span>";
	}
	else if(strlen($_POST['contact'])>10)
	{
		$error_msg['contact']="<span style='color:red;'>*Contact is more than 10</span>";
	}
	else
	{
		$contact=$_POST['contact'];
	}
 	if(!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $_POST['Parent']))
	{
		$error_msg['parent']="<span style='color:red;'>*Parent's name is invalid</span>";
	}
	else
	{
		$parent=$_POST['Parent'];
	}
	if($_POST['section']=="")
	{
		$error_msg['section']="<span style='color:red;'>*section is empty</span>";
	}
	else if(!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $_POST['section']))
	{
		$error_msg['section']="<span style='color:red;'>*section must be in alphabets</span>";
	}
	else
	{
		$section=$_POST['section'];
	}
	if($_POST['date']=="")
	{
		$error_msg['date']="<span style='color:red;'>*date is empty</span>";
	}
	else
	{
		$date=$_POST['date'];
	}
	if(!isset($_POST['gender']))
	{
		$error_msg['gender']="<span style='color:red;'>*Select your gender.</span>";
	}
	else
	{
		$gender=$_POST['gender'];
	}
	if($name!=null && $user!=null && $pass!=null &&$roll!=null && $class!=null && $stream!=null && $shift!=null && $add!=null && $section!=null && $contact!=null && $parent!=null && $date!=null && $gender!=null)
	{
		$md=md5($pass);
		$connect=mysqli_connect("localhost","root","","portfolio");
		$query="Insert into tblstudent values('$name','$gender','$user','$md','$roll','$class','$stream','$add','$contact','$parent','$section','$date','$shift')";
		if(mysqli_query($connect,$query) or die("Error"))
		{
			header('location:Student.php');
		}
	}
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form method="post" action="#">
<div class="containeraddStudent"> 
<h2 class="loginh2">Add Student</h2>
<input class="studentadd"  type="text" placeholder="Enter Full Name" name="name"><?php if(isset($error_msg['name'])){echo $error_msg['name'];}?><br>
<h4 class="radio">Male<input type="radio" name="gender" value="Male"> Female <input type="radio" name="gender" value="Female"><?php if(isset($error_msg['gender'])){echo $error_msg['gender'];}?></h4><br>
<input class="studentadd" type="text" placeholder="Enter username" name="user"><?php if(isset($error_msg['username'])){echo $error_msg['username'];}?><b0r>
<input class="studentadd" type="password" placeholder="Enter password" name="pass"><?php if(isset($error_msg['password'])){echo $error_msg['password'];}?><br>
<input class="studentadd" type="password" placeholder="Confirm password" name="conpass"><?php if(isset($error_msg['password'])){echo $error_msg['password'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Roll No" name="roll"><?php if(isset($error_msg['roll'])){echo $error_msg['roll'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Class" name="class"><?php if(isset($error_msg['class'])){echo $error_msg['class'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Stream" name="stream"><?php if(isset($error_msg['stream'])){echo $error_msg['stream'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Shift" name="shift"><?php if(isset($error_msg['shift'])){echo $error_msg['shift'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Address" name="Address"><?php if(isset($error_msg['address'])){echo $error_msg['address'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Contact Number" name="contact"><?php if(isset($error_msg['contact'])){echo $error_msg['contact'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Parent's Name" name="Parent"><?php if(isset($error_msg['parent'])){echo $error_msg['parent'];}?><br>
<input class="studentadd" type="text" placeholder="Enter Section" name="section"><?php if(isset($error_msg['section'])){echo $error_msg['section'];}?><br>
<input class="studentadd" type="date" name="date"><?php if(isset($error_msg['date'])){echo $error_msg['date'];}?><br>
<input class="loginbutton" type="submit" name="Add" value="Add">
</div> 
</form>

</body>
</html>