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
	$class="";
	$connect=mysqli_connect("localhost","root","","portfolio");
	$query="SELECT tblstudent.class from tblstudent where tblstudent.username='$user'";
	$result=mysqli_query($connect,$query);
	if($res=mysqli_fetch_assoc($result))
	{
		$class=$res['class'];
		echo "<tr>";
		echo "<th>Class:</th>";
		echo "<td>".$res['class']."</td>";
		echo "</tr>";
		
	}
	//$query="SELECT tblexam.exam_type, tblsubject.subject,tblexam.exam_date,tblexam.exam_time FROM tblexam INNER JOIN tblsubject ON tblexam.subjectcode=tblsubject.subjectcode where tblsubject.Grade='$class'";
	$query="SELECT st.class,e.exam_type,e.exam_time,s.subject,e.exam_date from tblstudent st,tblexam e,tblsubject s WHERE s.subjectcode=e.subjectcode and st.class=s.grade and st.username='$user'";
	$result=mysqli_query($connect,$query);
	if($res=mysqli_fetch_assoc($result))
	{
		$time=$res['exam_time'];
		echo "<tr>";
		echo "<th>Exam Type:</th>";
		echo "<td>".$res['exam_type']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Time:</th>";
		echo "<td>".date('g:i A',strtotime($time))."</td>";
		echo "</tr>";
	}
	echo "<table class='resulttable' border='1'>";
	echo "<tr>";
	echo "<th>Subject</th>";
	echo "<th>Exam Date</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<tr>";
	echo "<th>".$res['subject']."</th>";
	echo "<td>".$res['exam_date']."</td>";
	echo "</tr>";
	while($res=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<th>".$res['subject']."</th>";
		echo "<td>".$res['exam_date']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<a href='userloggedin.php'>Back Home</a>";
}

?>
</div>

</table>
</body>
</html>