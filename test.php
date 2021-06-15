<form action="#" method="post">
<input type="password" name="pass"><br>
<input type="submit" value="submit" name="submit">
</form>
<?php
if(isset($_REQUEST['submit']))
{
	$pass=$_REQUEST['pass'];
	$pass1=md5($pass);
	echo $pass1;
}
?>