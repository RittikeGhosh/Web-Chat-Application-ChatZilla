<?php
session_start();

if(!empty($_POST['email']) && !empty($_POST['otp']) && !empty($_POST['password']))
{
	$email = $_SESSION['d6d46demailc54s'];
	$otp = $_SESSION['s5d4sdotpsdv5x'];
	$email2 = $_POST['email'];
	$password = $_POST['password'];
	$otp2 = $_POST['otp'];

	if($email === $email2)
	{
		if($otp == $otp2)
		{
			include_once 'db.php';

			$query = "SELECT id FROM userdata WHERE email='$email';";
			$sql = mysqli_query($conn,$query);

			if(mysqli_num_rows($sql) == 1)
			{
				$pass= md5($password);

				$uquery = "UPDATE userdata SET password ='$pass' WHERE email = '$email';";
				$sql = mysqli_query($conn,$uquery);

				header("location:../index.php");
			}
			else
			{
				header("location:../forgetpass.php");
			}
		}
	}
	else
	{
		header("location:../forgetpass.php");
	}
}
?>