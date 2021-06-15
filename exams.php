<?php
 include ("adminheader.php");
 ?>
 <!doctype html>
<html>
<head>
<style>
.table2{
	border-collapse:collapse;
	margin-top:4%;
}

input[type=date]
{
	height:25px;
	width:84%;
}
.select{
	font-size:15px;
	height:30px;
	width:100%;
}
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<button class="addresult"><a href="manageexam.php">Manage Exam</a></button>
<div class="containeraddresult">
<table borderalign="center">
<form action="#" method="post">
<tr>
<th ><font size="5">Class</font></th>
<td>
<select name="class" required>
<option value="">Class</option>
<option value="11">Grade 11</option>
<option value="12">Grade 12</option>
<option value="bim">BIM</option>
</select>
</td>
<td ><input  type="submit" value="submit" name="submit"></td>
</tr>
</div>
</form>
<div class="table2">
</table>
<table border="1" class="table2">
<?php
if(isset($_REQUEST['submit']))
{
	$i=0;
	@$class=$_REQUEST['class'];
	//echo $class;
	$connect=mysqli_connect("localhost","root","","portfolio");
	if($class==11 || $class==12 || $class=="bim")
	{
		echo "<form action='#' method='post'>
			<tr>
			<th><font size='4'>Select Exam Type</font></th>
			<td>
			<select class='select' name='exam' required>
			<option value=''>Select Type</option>
			<option value='1st_term'>1st Term</option>
			<option value='2nd_term'>2nd Term</option>
			<option value='3rd_term'>3rd Term</option>
			</select></td></tr>
			<tr>
			<th>Time</th>
			<td><input type='time' name='exam_time' required></td>
			</tr>
			";
			
			
	}
	$query="SELECT subject,subjectcode from tblsubject where Grade LIKE'$class%'";
		//echo $query;
		$result=mysqli_query($connect,$query);
		while($res=mysqli_fetch_assoc($result))
		{
			$a=$res['subjectcode'];
			echo "
			<tr>
			<th><font size='4'>$res[subject]</font></th>
			<td><input type='date' name='$a' required></td>
			</tr>";	
		}
		echo"<tr>
		<td><input class='loginbutton' type='submit' name='Set' value='Set'></td>
		</tr>
		</form>";
}
?>
<?php

if(isset($_REQUEST['Set']))
{
	$exam=$_POST['exam'];
	$time=$_POST['exam_time'];
	$s=sizeof($_POST);
	$i=0;
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
					$sql="INSERT INTO tblexam values('$exam','$key','$val','$time')";
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