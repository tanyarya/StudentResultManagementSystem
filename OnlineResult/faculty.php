<?php
include("config.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$email=mysqli_real_escape_string($al,$_POST['email']);
$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
if($_POST['email']==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$email;
		header("location:home.php");
	}
	else
	{
		$msg="Incorrect Email ID or Password";
	}
}
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link href="faculty.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Login Here
		</div>
		<?php echo $msg;?>
		<form method="post">
			<div class="form_wrap">
				<div class="input_wrap">
					<label for="sid">E-mail ID</label>
					<input type="text" required="required" name="email">
				</div>
				
				<div class="input_wrap">
					<label for="pass">Password</label>
					<input type="password" required="required" name="pass"  style="width: 300px; height: 45px;margin-bottom:40px;" required="required">
				<div class="input_wrap">
					<input type="submit" value="Login" class="submit_btn">
				</div>
        <a href="index.php" class="link"style="text-decoration:none; color: #2b2727;; text-align: center">Main Page</a>
			</div>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body> 
</html>
