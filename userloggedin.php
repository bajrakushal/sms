<?php 
session_start();
include ("adminheader.php");
?>
<!doctype html>
<html>
<head>
<style>
div{
	
	text-align:center;
	background-color:#F3F3F3;
	font-size:40px;
}
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div>
<?php
$user=$_SESSION['user'];
$connect=mysqli_connect("localhost","root","","portfolio");
$query="SELECT * FROM tblstudent where username='$user'";
$result=mysqli_query($connect,$query) or die("Not selected"); 
if($res=mysqli_fetch_assoc($result))
{
	echo "Welcome ".$res['name'];
}
?>
</div>
</body>
</html>