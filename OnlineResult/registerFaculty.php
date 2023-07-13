<?php
include("config.php");
$name=$_POST['name'];
$sem=$_POST['sem'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);

if($name==NULL || $sem==NULL || $email==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"INSERT INTO faculty(name,sem,email,password) VALUES('$name','$sem','$email','$pass')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="Email or Sem Already Exists";
	}
}
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link href="registerFaculty.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<div class="wrapper">
	<div class="registration_form">
		<?php echo $msg;?>
		<form method="post">
			<div class="form_wrap">
					<div class="input_wrap">
						<label for="fname">Full Name</label>
						<input type="text" name="name" id="name" required="required">
					</div>
					<div class="input_wrap">
					<label for="email">E-mail</label>
					<input type="text" name="email" id="email" style="margin-bottom:10px" required="required">
				<div class="input_wrap">
					<label for="sem">Semester</label>
					<select name="sem" class="fields" style="background-color:white; width:350px; height:43px;border-radius:3.5px;" required>
					<option value="" disabled="disabled" selected="selected">- - Semester - -</option>
					<option value="1">First Sem</option>
					<option value="2">Second Sem</option>
					<option value="3">Third Sem</option>
					<option value="4">Fourth Sem</option>
					<option value="5">Fifth Sem</option>
					<option value="6">Sixth Sem</option>
					<option value="7">Seventh Sem</option>
					<option value="8">Eighth Sem</option>
					</select>
				</div> 
				<div class="input_wrap">
					<label for="pass">Password</label>
					<input type="password" required="required" name="pass"  style="width: 350px; height: 45px;margin-bottom:40px;" required="required">
				<div class="input_wrap">
					<input type="submit" value="Login" class="submit_btn">
				</div>
        <a href="index.php" class="link"style="text-decoration:none; color: #2b2727;; text-align: center;">Main Page</a>
			</div>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body> 
</html> 