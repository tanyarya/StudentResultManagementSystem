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
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$msg="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$msg="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al,"UPDATE faculty SET password='$p2' WHERE email='$email'");
		$msg="Successfully Changed your Password";
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="changePassword.css" />
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body style=" background-image:url(images/changepass.png);">
	
<div class="login-wrapper">
        <form action="" method="POST" class="form">
			<?php echo $msg;?>
            <!-- <h2>Change Password</h2> -->
            <div class="input-group">
                <input type="password" name="old"  id="loginUser" required="required" />
                <label for="loginUser">Old Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="p1" id="loginPassword" required />
                <label for="loginPassword">New Password</label>
            </div>
			<div class="input-group">
                <input type="password" name="p2" id="loginPassword" required />
                <label for="loginPassword">Re-enter New Password</label>
            </div>
            <input type="submit" value="Change" class="submit-btn" />  <br> 
			<a href="home.php" class="link"style="text-decoration:none; color: white;; text-align: center">Go Back</a>
        </form>
    </div>
</body>
</html>