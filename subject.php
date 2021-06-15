<?php include ("adminheader.php");?>
<div class="containeraddresult">
<table align="center">
<form action="#" method="get">
<tr>
<td ><font size="5">Class</font></td>
<td>
<select name="grades">
<option value="">Class</option>
<option value="11">Grade 11<?php if(isset($_REQUEST['grades'])) ?></option>
<option value="12">Grade 12</option>
<option value="BIM">BIM</option>
</select>
</td>
<td ><input type="submit" value="submit" name="submit"></td>
</tr>
</div>
</form>
</table>
<div>
<table border="1" class="designtable">
<?php
if(isset($_REQUEST['submit']))
{
	$n=1;
	$class=$_REQUEST['grades'];
	$connect=mysqli_connect("localhost","root","","portfolio");
	if($class==11 || $class==12  || $class=="BIM");
	{	
		$query="SELECT * from tblsubject where Grade LIKE'$class%'";
		$result=mysqli_query($connect,$query);
		echo"<tr>
		<th>Subject</th>
		<th>Subject Code</th>
		</tr>";
		while($res=mysqli_fetch_assoc($result))
		{
			echo"<tr>
			<td>$res[subject]</td>
			<td>$res[subjectcode]</td>
			</tr>";
		}
	}
	
}
?>
</div>
</table>