<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
mysql_connect('localhost','root','');
mysql_select_db('person');
$query="select * from person";
$result=mysql_query($query);
?>
<table border="1">
<tr>
<td> Username</td>
<td> Password</td>
<td> Action</td>
</tr>
<?php
while($user=mysql_fetch_assoc($result))
{                                                 
	echo"<tr>";
	echo"<td>".$user['username']."</td>";
	echo"<td>".$user['password']."</td>";
	echo"<td> <a href='update.php?username=$user[username] & password=$user[password]'target='_blank'>edit</a>,
	<a href='delete.php?username=$user[username] & password=$user[password]'> delete</a>";
	echo"</tr>";
	
}
?>


</body>
</html>