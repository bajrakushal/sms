<?php include ("adminheader.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
th{
	font-size:1.29em;
	float:left;
}
input[type=text]{
	width:150%;
	float:right;
}
</style>
</head>

<body>
<div class="containeraddStudent">
<?php
$user=$_REQUEST['username'];
$connect=mysqli_connect("localhost","root","","portfolio");
$query="Select * from tblstudent where username='$user'";
$result=mysqli_query($connect,$query);
echo "<table >";
while($res=mysqli_fetch_assoc($result))
{
	echo "<from action='#' method='post'>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<td><input class='studentadd' type='text' name='name' value='$res[name]'required></td>";
	echo "</tr><tr>";
	echo "<th>Gender</th>";
	echo "<td><input class='studentadd' type='text' name='gender' value=".$res['gender']."></td>";
	echo "</tr><tr>";
	echo "<th>username</th>";
	echo "<td><input class='studentadd' type='text' name='username' readonly value=".$res['username']."></td>";
	echo "</tr><tr>";
	echo "<th>Roll</th>";
	echo "<td><input class='studentadd' type='text' name='roll' value=".$res['roll']."></td>";
	echo "</tr><tr>";
	echo "<th>Class</th>";
	echo "<td><input class='studentadd' type='text' name='class' value=".$res['class']."></td>";
	echo "</tr><tr>";
	echo "<th>Stream</th>";
	echo "<td><input class='studentadd' type='text' name='stream' value=".$res['stream']."></td>";
	echo "</tr><tr>";
	echo "<th>Address</th>";
	echo "<td><input class='studentadd' type='text' name='address' value=".$res['address']."></td>";
	echo "</tr><tr>";
	echo "<th>Parent</th>";
	echo "<td><input class='studentadd' type='text' name='parent' value=".$res['parent']."></td>";
	echo "</tr><tr>";
	echo "<th>shift</th>";
	echo "<td><input class='studentadd' type='text' name='shift' value=".$res['shift']."></td>";
	echo "</tr><tr>";
	echo "<th>Section</th>";
	echo "<td><input class='studentadd' type='text' name='section' value=".$res['section']."></td>";
	echo "</tr><tr>";
	echo "<th> Contact</th>";
	echo "<td><input class='studentadd' type='text' name='section' value=".$res['contact']."></td>";
	echo "</tr><tr>";
	echo "<td><input class='loginbutton' type='submit' name='Update' value='Update'></td>";
	echo "</tr>";
	echo "</form>";
}
echo"</table>";
?>
</div>
</body>
</html>