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
$query="SELECT st.class,e.exam_type,e.exam_time,s.subject,e.exam_date from tblstudent st,tblexam e,tblsubject s WHERE s.subjectcode=e.subjectcode and st.class=s.grade Group by st.class";
$result=mysqli_query($connect,$query);
echo "<thead>";
echo "<tr>";
echo "<th>Class</th>";
echo "<th>Exam Type</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "<thead>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tbody>";
	echo "<tr>";
	echo "<td>".$row['class']."</td>";
	echo "<td>".$row['exam_type']."</td>";
	echo "<td> <a href='manageexamaction.php?class=".$row['class']."'>Edit,<a href='deleteexam.php?class=".$row['class']."'>Delete</td>";
	echo "</tr>";
}


?>
</table>
</div>
</body>
</html>