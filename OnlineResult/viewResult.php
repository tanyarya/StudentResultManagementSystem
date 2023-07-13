<?php
include("config.php");
$roll=$_POST['roll'];
$x=mysqli_query($al,"SELECT * FROM students WHERE roll='$roll'");
$y=mysqli_fetch_array($x);
$sem=$y['sem'];
$name=$y['name'];
$a=mysqli_query($al,"SELECT * FROM marks WHERE roll='$roll' AND sem='$sem'");
$b=mysqli_fetch_array($a);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="viewResult.css" rel="stylesheet" type="text/css" />
</head>

<body><br />

<div align="center">

<span class="labels1" style="color:#284048e7;">
Name : <?php echo $name;?><br>
Roll No.: <?php echo $roll;?><br>
Semester : <?php echo $sem;?>
</span>

<br />
<br />
<?php $m=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem'");
$n=mysqli_fetch_array($m);
?>
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td class="labelss" style="text-decoration:underline;color:#f16754;">Subject</td><td class="labels" style="text-decoration:underline;color:#f16754;">Marks</td></tr>
<tr><td class="labelss"><?php echo $n['s1'];?></td><td class="labels"><?php echo $b['s1'];?></td></tr>
<tr><td class="labelss"><?php echo $n['s2'];?></td><td class="labels"><?php echo $b['s2'];?></td></tr>
<tr><td class="labelss"><?php echo $n['s3'];?></td><td class="labels"><?php echo $b['s3'];?></td></tr>
<tr><td class="labelss"><?php echo $n['s4'];?></td><td class="labels"><?php echo $b['s4'];?></td></tr>
<tr><td class="labelss"><?php echo $n['s5'];?></td><td class="labels"><?php echo $b['s5'];?></td></tr>
<tr style="text-decoration:underline;color:#f16754;"><td class="labels">Total : </td><td class="labels"><?php echo $b['total'];?> %</td></tr>
<tr><td class="labels">Result : </td><td style="color:#f16754;"><?php echo $b['result'];?></td></tr>
</table>
<br />
<br />

</div>
</body>
</html>