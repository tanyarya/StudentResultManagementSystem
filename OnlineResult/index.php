<?php
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>

<body><br />

<div align="center">

<br/>
<br/>

<br />
<br />
<br />

<div class="login-wrapper">
<form action="viewResult.php" method="POST" class="form">
        <?php echo $msg;?>
            <h2>View Result</h2>
            <div class="input-group">
                <input type="text" name="roll"  id="loginUser" required="required" />
                <label for="loginUser">Enter Roll No.</label>
            </div>
            <input type="submit" value="View" class="submit-btn" />  <br>
            <p>New student?<br>
            <a href="register.php"style="text-decoration:none;">Register here</a>
            </p>
        </form> 
</div>
<br />
<br />
<div class="a1">
<a href="faculty.php" class="link">Faculty Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="registerFaculty.php" class="link">Faculty Registration</a>
</div>
</div>
</body>
</html>