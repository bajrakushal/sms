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
<h2 class="loginh2">Update Result</h2>
<table>
<?php
if(isset($_REQUEST['username']))
{
	$user=$_REQUEST['username'];
	$_SESSION['username']=$user;
	$connect=mysqli_connect("localhost","root","","portfolio");
	$query="SELECT tblresult.marks,tblsubject.subject,tblsubject.subjectcode FROM tblresult INNER JOIN tblsubject ON tblresult.subjectcode=tblsubject.subjectcode where tblresult.username='$user'";
	$result=mysqli_query($connect,$query);
	echo "<form action='#' method='post'>";
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<th>".$row['subject']."</th>";
		echo "<td><input type='text' name=".$row['subjectcode']." value=".$row['marks'].">";
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
	$id=$_SESSION['username'];
	$s=sizeof($_POST);
	$i=0;
	$error=false;
	$flag=false;
	$connect=mysqli_connect("localhost","root","","portfolio");
	foreach($_POST as $key=>$val)
	{
		if($i==1 or $i==$s)
		{
		}
		else
		{
			if($val<0 || $val>100)
			$error=true;
		}
		$i++;
	}
	if($error)
	{
		echo'<script language="javascript">';
		echo'alert("Please insert valid marks")';
		echo'</script>';
	}
	else{
		foreach($_POST as $key=>$val)
		{
			if($i=0 or $i==$s)
			{
			}
			else
			{
				if($val)
				{
					//echo $id."--".$key."--".$val.", ";	
					$sql="UPDATE tblresult set marks='$val' where username='$id' and subjectcode='$key'";
					//echo $sql;
					$result=mysqli_query($connect,$sql);
					if($result>0)
					{
						$flag=true;
						
					}
					else
					{
						$flag=false;
						
					}
				}
			}
			$i++;
		}
		if($flag==true)
		{
			echo'<script language="javascript">';
			echo'alert("updated Successfully")';
			echo'</script>';
		}
		else
		{
			echo'<script language="javascript">';
			echo'alert("Not updated")';
			echo'</script>';
		}
		
	}
}
?>
</body>
</html>