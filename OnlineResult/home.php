<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="home.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image:url(images/welcome2.png)"><br />
<br />
<br />
<span class="subhead">Welcome <?php echo $name;?></span>
<br />
<br />
<br />
<div class="design">
<a href="submitMarks.php" class="cmd">Submit Marks</a>
<br />
<br />
<br />
<a href="viewUsers.php" class="cmd">View Users</a>
<br />
<br />
<br />
<a href="addSubjects.php" class="cmd">Add Subjects</a>
<br />
<br />
<br />
<a href="changePassword.php" class="cmd">Change Password</a>
<br />
<br />
<br />
<a href="logout.php" class="cmd">Logout</a>
</div>
<br />
<br />
</div>

</body>
</html>