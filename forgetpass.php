<?php
if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}


if($_SESSION['effd454fd545df5fdfd5flog'] == 1 )
{ header("location: landpage.php");}?>


<!DOCTYPE html>
<html>
<head>
	<title>ChatZilla</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Charm:700|Rokkitt" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/forgetpass.css">
<script
	src='https://code.jquery.com/jquery-3.3.1.min.js'
    integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
    crossorigin='anonymous'></script>
  <script type="text/javascript" src="js/forgetpass.js"></script>
<body>
	<?php

echo "<div id='head'>";
            include 'includes/header.php';
    echo "</div>";
?>
	<div><br><br><br></div>
	<div id="logo">
		<img src="images/logo1.png" width="150" height="auto">
	</div><br>
	<div id="contain">
		<div id="head">NO WORRIES !! iF yOU HAVE a WORKING eMAIL...</div>
		<div id="form">
			<form action="includes/forgetpass.php" method="post">
				<div id="email">
					<span><sup>*</sub>Enter the email id registered with us </span><br>
					<input type="text" name="email" required placeholder="Your Email id ...">
				</div>
				<div id='sendotp'>
                    <span> &nbsp; Click to verify email &nbsp; &nbsp; &nbsp;</span>
                </div>
                <div id='otp'>
                    <span> &nbsp; Enter The OTP :&nbsp; &nbsp; &nbsp;</span>
                    <input type='text' name = 'otp' required
                     placeholder="OTP" id="otp1"> &nbsp; <span><sup>*</sub></span>
                </div>
                <div id="password">
                	<span><sup>**</sub>Enter new password</span><br>
                	<input type="password" name="password" required placeholder="Enter New password">
                </div>
                <div id="repassword">
                	<span><sup>**</sub>Re-enter your password</span><br>
                	<input type="password" name="repassword" required placeholder="Re-enter New password">
                </div>
                <div id="submit">
                	<input type="submit" name="submit" value="submit" id="sub">
                </div>
			</form>
		</div>
	</div>

</body>
</html>