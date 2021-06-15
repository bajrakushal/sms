<?php include ("adminheader.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="container">
<table class="content-table" border="1">
<h2 class="loginh2">Result info</h2>
<?php
$connect=mysqli_connect("localhost","root","","portfolio");
$query="SELECT tblstudent.name, tblresult.username, tblstudent.class FROM tblresult INNER JOIN tblstudent ON tblresult.username=tblstudent.username GROUP by tblresult.username";
$result=mysqli_query($connect,$query);
echo "<thead>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Username</th>";
echo "<th>Class</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "<thead>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tbody>";
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['class']."</td>";
	echo "<td> <a href='resultupdate.php?username=".$row['username']."'>Edit</td>";

	echo "</tr>";
}


?>
</table>
</div>
</body>
</html>