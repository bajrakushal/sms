<?php
@session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Portfolio System</title>
<link rel="stylesheet" type="text/css" href="css/style.css?version=20">
</head>

<body class="adminbody">
	<div class="header">
    	<div>
        <img src="images/logo.png" href="Logo">
        </div>
        <div>
        <ul id="navtext">
        <?php
		if(isset($_SESSION['admin']))
		{
		?>
        <li><a class="adminhome" href="Student.php">Students</a></li>
        <li><a class="adminhome" href="exams.php">Exams</a></li>
        <li><a class="adminhome" href="result.php">Result</a></li>
        <li><a class="adminhome" href="subject.php">Subjects</a></li>
        <li><a class="adminhome" href="logout.php">Logout</a></li>
        <?php
		}
		if(isset($_SESSION['user']))
		{
		?>
     	<li><a class="adminhome" href="viewresult.php">View Result</a></li>
        <li><a class="adminhome" href="viewexam.php">Exam Routine</a></li>
        <li><a class="adminhome" href="logout.php">Logout</a></li>
        <?php
		}
		?>
        </div>
	</div>
    <div class="divv"></div>
   
   
   

</body>
</html>