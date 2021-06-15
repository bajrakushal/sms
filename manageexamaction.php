<?php 
session_start();
include ("adminheader.php");
?>
<!doctype html>
<html>
<head>
<style>
th{
	font-size:20px;
}
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="container">
<h2 class="loginh2">Update Exam Routine</h2>
<table>
<?php
if(isset($_REQUEST['class']))
{
	$class=$_REQUEST['class'];
	$connect=mysqli_connect("localhost","root","","portfolio");
	$query="SELECT st.class,e.exam_type,e.exam_time,s.subject,s.subjectcode,e.exam_date from tblstudent st,tblexam e,tblsubject s WHERE s.subjectcode=e.subjectcode and st.class=s.grade and st.class='$class'";
	$result=mysqli_query($connect,$query);
	
	echo "<form action='#' method='post'>";
	if($res=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<th>Exam Type:</th>";
		echo "<td><input type='text' name='type' value=".$res['exam_type']."></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Time:</th>";
		echo "<td><input type='time' name='time' value=".$res['exam_time']."></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>".$res['subject']."</th>";
		echo "<td><input type='date' name=".$res['subjectcode']." value=".$res['exam_date'].">";
		echo "</tr>";
	}
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<th>".$row['subject']."</th>";
		echo "<td><input type='date' name=".$row['subjectcode']." value=".$row['exam_date'].">";
		echo "</tr>";
	}
	echo"<tr>";
	echo "<td><input class='loginbutton' type='submit' name='Update' value='Update'></td>";
	echo "</tr>";
	echo "</form>";
	
}
?>
</table>
</div>
<?php
if(isset($_REQUEST['Update']))
{
	$s=sizeof($_POST);
	$i=0;
	$time=$_REQUEST['time'];
	$error=false;
	$flag=false;
	$connect=mysqli_connect("localhost","root","","portfolio");
	foreach($_POST as $key=>$val)
	{
		if($i==0 or $i==$s)
		{
		}
		$i++;
	}
		foreach($_POST as $key=>$val)
		{
			if($i==1 or $i==$s)
			{
			}
			else
			{
				if($val)
				{	
					$sql="Update tblexam set exam_date='$val' and exam_time='$time' where subjectcode='$key'";
					if(mysqli_query($connect,$sql))
					{
						$flag=true;
					}
				}
			}
			$i++;
		}
		if($flag)
		{
			echo'<script language="javascript">';
			echo'alert("Exam routine publised")';
			echo'</script>';
		}
}
?>
</body>
</html>