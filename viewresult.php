<?php
session_start();
?>
<!doctype html>
<html>
<head>
<style>
.img{
	margin-left:36%;
	margin-top:2%;
}
.side{
	transform:translate(500px,65px);
	font-size:19px;
}
.resulttable{
	border-collapse:collapse;
	width:30%;
	text-align:center;
}
a{
	color:black;
	text-decoration:none;
	margin-bottom::5%;
	margin-left:11%;
}
a:hover{
	color:red;
}
</style>
<meta charset="utf-8">
<title>Result</title>
</head>

<body>
<div>
<img class="img" src="images/logo.png" href="Logo">
</div>
<div class="side">
<table>
<?php
if(isset($_SESSION['user']))
{
	$total=0;
	$user=$_SESSION['user'];
	$flag=true;
	$connect=mysqli_connect("localhost","root","","portfolio");
	$query="SELECT tblstudent.name, tblresult.username, tblstudent.class FROM tblresult INNER JOIN tblstudent ON tblresult.username=tblstudent.username where tblstudent.username='$user' GROUP BY tblstudent.username";
	$result=mysqli_query($connect,$query);
	if($res=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<td>Name:</td>";
		echo "<td>".$res['name']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Username:</td>";
		echo "<td>".$res['username']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Class:</td>";
		echo "<td>".$res['class']."</td>";
		echo "</tr>";
		
	}
	$query="SELECT tblresult.marks,tblsubject.subject FROM tblresult INNER JOIN tblsubject ON tblresult.subjectcode=tblsubject.subjectcode where tblresult.username='$user'";
	$result=mysqli_query($connect,$query);
	echo "<table class='resulttable' border='1'>";
	echo "<tr>";
	echo "<th>Subject</th>";
	echo "<th>Obtained Marks</th>";
	echo "</tr>";
	/*echo "<tr>";
	echo "<th>".$res['subject']."</th>";
	echo "<td>".$res['marks']."</td>";
	echo "</tr>";*/
	
	while($res=mysqli_fetch_assoc($result))
	{
		$total+=$res['marks'];
		echo "<tr>";
		echo "<th>".$res['subject']."</th>";
		echo "<td>".$res['marks']."</td>";
		echo "</tr>";
		if($res['marks']<30)
		{
			$flag=false;
		}
	}
	echo "<tr>";
	echo "<th>Total Marks</th>";
	echo "<td><b>".$total."<b></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Result</th>";
	if($flag)
	{
	
		echo "<td><b>Pass<b></td>";
	}
	else
	{
		echo "<td><b>Failed<b></td>";
	}
	echo "</tr>";
		
	echo "</table>";
	echo "<a href='userloggedin.php'>Back Home</a>";
}

?>
</div>

</table>
</body>
</html>