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
$sem=$b['sem'];
if(!empty($_POST))
{
	$s1=$_POST['s1'];
	$s2=$_POST['s2'];
	$s3=$_POST['s3'];
	$s4=$_POST['s4'];
	$s5=$_POST['s5'];
	$roll=$_POST['roll'];
	if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL || $roll==NULL)
	{
		//
	}
	else
	{
		$total=$s1+$s2+$s3+$s4+$s5;
		$per=($total/100)*100;
		if($per<=35)
		{
			$result="Fair";
		}elseif($per>=36 && $per<=50)
			{
				$result="Good";
			}
			elseif($per>=51 && $per<=70)
				{
					$result="Better";
				}
				else
				{
					$result="Best";
				}
				$sql=mysqli_query($al,"INSERT INTO marks(roll,sem,s1,s2,s3,s4,s5,total,percent,result) VALUES('$roll','$sem','$s1','$s2','$s3','$s4','$s5','$total','$per','$result')");
				if($sql)
				{
					$msg="Successfully Saved Marks";
				}
				else
				{
					$msg="Marks Already Submitted to this Roll No.";
				}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="submitMarks.css" rel="stylesheet" type="text/css" />
</head>

<body><br />
<?php 
$x=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem'");
$y=mysqli_fetch_array($x);
$m=mysqli_query($al,"SELECT * FROM students WHERE sem='$sem'");
?>
<div class="wrapper">
	<div class="registration_form">
	<?php echo $msg;?>
		<form method="post" action="">
			<div class="form_wrap">
					<div class="input_wrap">
						<label for="roll">Roll Number</label>
						<select name="roll" class="fields" style="background-color:white;" required>
						<option value="" selected="selected" disabled="disabled">- - Select Roll - -</option>
						<?php
						while($n=mysqli_fetch_array($m)){
						?>
						<option value="<?php echo $n['roll'];?>">
						<?php echo $n['roll'];?></option>
						<?php } ?>
						</select>
					</div>
					<div class="input_wrap">
					<label for="s1"><?php echo $y['s1'];?></label>
					<input type="text" name="s1"placeholder="Enter marks out of 20" required="required">
				</div>
				<div class="input_wrap">
					<label for="s2"><?php echo $y['s2'];?></label>
					<input type="text" name="s2"placeholder="Enter marks out of 20" required="required">
				</div> 
				<div class="input_wrap">
					<label for="s3"><?php echo $y['s3'];?></label>
					<input type="text" name="s3" placeholder="Enter marks out of 20" required="required">
				</div>
				<div class="input_wrap">
					<label for="s4"><?php echo $y['s4'];?></label>
					<input type="text" name="s4"  placeholder="Enter marks out of 20"required="required">
				</div> 
				<div class="input_wrap">
					<label for="s5"><?php echo $y['s5'];?></label>
					<input type="text" name="s5" placeholder="Enter marks out of 20"style="margin-bottom:25px" required="required">
				<div class="input_wrap">
					<input type="submit" value="Submit Marks" name="submit" class="submit_btn">
				</div>
        <a href="home.php" class="link"style="text-decoration:none; color: white; text-align: center;">Go Back</a>
			</div>
		</form>

	</div>
</div>
