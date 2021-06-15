<?php include ("adminheader.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
select{
	height:32px;
	margin-top:-40px;
	width:88px;
	margin-left:18%;
}
</style>
</head>

<body>
<table border="1" class="content-table">
<div>
<button class="addstudent"><a href="addstudent.php">+ Add Student</a></button>
</div>
<div>
<form action="#" method="get">
<input class="searchpanel" type="text" placeholder="Search for Students" name="search">
<input class="searchbutton" type="submit" name="Search" value="Search">
<select name="filter">
<option value="">Filter</option>
<option value="name">Name</option>
<option value="gender">Gender</option>
<option value="shift">Shift</option>
<option value="stream">Stream</option>
<option value="class">Class</option>
<option value="section">Section</option>
</select>
</div>
</form>


<?php
if(isset($_REQUEST['Search']))
{
	$connect=mysqli_connect("localhost","root","","portfolio");
	echo "<thead>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<td>Gender</th>";
	echo "<th>Username</th>";
	echo "<th>Roll</th>";
	echo "<th>Class</th>";
	echo "<th>Stream</th>";
	echo "<th>Address</th>";
	echo "<th>Parent</th>";
	echo "<th>Shift</th>";
	echo "<th>Section</th>";
	echo "<th>Contact</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	echo "</thead>";
	if($_REQUEST['search']==null)
	{
		$query="SELECT name,gender,username,roll,class,stream,address,parent,section,shift,contact from tblstudent";
		$res=mysqli_query($connect,$query);
	}
	else
	{
		$filter=$_REQUEST['filter'];
		$search=$_REQUEST['search'];
		if($filter==null)
		{
		$query="SELECT name,gender,username,roll,class,stream,address,parent,section,shift,contact from tblstudent where name LIKE '$search%'";
		}
		else
		{
			$query="SELECT name,gender,username,roll,class,stream,address,parent,section,shift,contact from tblstudent where $filter LIKE '$search%'";
		}
		$res=mysqli_query($connect,$query);
	}
		
			while($result=mysqli_fetch_assoc($res))
			{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>".$result['name']."</td>";
				echo "<td>".$result['gender']."</td>";
				echo "<td>".$result['username']."</td>";
				echo "<td>".$result['roll']."</td>";
				echo "<td>".$result['class']."</td>";
				echo "<td>".$result['stream']."</td>";
				echo "<td>".$result['address']."</td>";
				echo "<td>".$result['parent']."</td>";
				echo "<td>".$result['section']."</td>";
				echo "<td>".$result['shift']."</td>";
				echo "<td>".$result['contact']."</td>";
				echo "<td> <a href='update.php?username=".$result['username']."'>Edit</a>";
				echo "</tr>";
				echo "</tbody>";
				}
	
}
?>
</table>
</body>
</html>