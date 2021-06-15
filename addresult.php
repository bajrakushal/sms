<?php
session_start();
 include ("adminheader.php");
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
.table2{
	border-collapse:collapse;
	margin-top:2%;
}
input[type=text]
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
<title>Untitled Document</title>
</head>
<body>
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
		$query="SELECT username,name from tblstudent where class LIKE'$class%'";
		$result=mysqli_query($connect,$query);
		echo "<form action='#' method='post'>
			<tr>
			<th><font size='4'>Select Student</font></th>
			<td>
			<select class='select' name='user' required>
			<option value=''>Select name</option>";
			while($res=mysqli_fetch_assoc($result))
			{
				$user=$res['username'];
				$name=$res['name'];
				echo "<option value='$user'>$name</option>";
			}
			echo"</select></td></tr>";
	

		$query="SELECT subject,subjectcode from tblsubject where Grade LIKE'$class%'";
		//echo $query;
		$result=mysqli_query($connect,$query);
		while($res=mysqli_fetch_assoc($result))
		{
			$a=$res['subjectcode'];
			echo "
			<tr>
			<th><font size='4'>$res[subject]</font></th>
			<td><input type='text'  name='$a' placeholder='out of 100' required></td>
			</tr>";	
		}
		$_SESSION['class']=$class;
		echo"<tr>
		<td><input class='loginbutton' type='submit' name='Set' value='Set'></td>
		</tr>
		</form>";
		
		
	}
}
	?>
    <?php

if(isset($_REQUEST['Set']))
{
	$id=$_POST['user'];
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
			if($i==0 or $i==$s)
			{
			}
			else
			{
				if($val)
				{
					//echo $id."--".$key."--".$val.", ";	
					$sql="INSERT INTO tblresult values('$id','$key','$val')";
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
			echo'alert("Result publised")';
			echo'</script>';
		}
	}
}
?>
</table>
</div>
</body>
</html>