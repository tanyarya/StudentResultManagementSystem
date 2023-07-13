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
$s1=$_POST['s1'];
$s2=$_POST['s2'];
$s3=$_POST['s3'];
$s4=$_POST['s4'];
$s5=$_POST['s5'];
if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL)
{
	// 
}
else
{	
	$sql=mysqli_query($al,"INSERT INTO subjects(s1,s2,s3,s4,s5,sem) VALUES('$s1','$s2','$s3','$s4','$s5','$sem')");
	if($sql)
	{
		$msg="Successfully Saved";
	}
	else
	{
		$msg="Already Saved for Your Sem";
	}
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="addSubjects.css" rel="stylesheet" type="text/css" />
</head>

<body><br />
<div class="wrapper">
	<div class="registration_form">
		<?php echo $msg;?>
		<form method="post" action="">
			<div class="form_wrap">
					<div class="input_wrap">
						<label for="fname">Subject 1</label>
						<input type="text"  name="s1" required="required">
					</div>
				<div class="input_wrap">
					<label for="sid">Subject 2</label>
					<input type="text" name="s2" required="required">
				</div>
				<div class="input_wrap">
					<label for="sem">Subject 3</label>
					<input type="text" name="s3" required="required">
				</div> 
				<div class="input_wrap">
					<label for="sem">Subject 4</label>
					<input type="text" name="s4"  required="required">
				</div> 
				<div class="input_wrap">
					<label for="email">Subject 5</label>
					<input type="text" name="s5" style="margin-bottom:40px" required="required">
				<div class="input_wrap">
					<input type="submit" value="Add Subject" class="submit_btn">
				</div>
        <a href="home.php" class="link"style="text-decoration:none; color: white; text-align: center;">Go Back</a>
			</div>
		</form>
	</div>
</div>
<br />
<br />
<br />
</div>
</body>
</html>