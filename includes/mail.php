<?php

session_start();
//echo 'success';
if(isset($_POST['d5d55demail5rdf']) && !empty($_POST['d5d55demail5rdf']))
{
	$mailto = test_input($_POST['d5d55demail5rdf']);

	$otp = mt_rand(100000,999999);

	$msg = "
	From ChatZilla<br><br>
    Do not share your OTP with anyone.OTP for the verification of your email is : <b><label style='font-size:25px;'>" . $otp . "</label></b>.The OTP is valid for 5 minutes.
    <br>

	Thankyou
	";

	$msg = wordwrap($msg,70);

	$header = "Reply-To: noreply@example.com";
	$header .= "MIME-Version: 1.0" . "\r\n";
 	$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";


	$subject = "OTP for ChatZilla ";


	$r = mail($mailto, $subject, $msg ,$header);
	
	if($r == true)
		{
			$_SESSION['s5d4sdotpsdv5x'] = $otp;
			$_SESSION['d6d46demailc54s'] = $mailto;

			echo "success";

		}
	else
		{
			echo "fail";
		}
}


function test_input($data) {
  $data = stripslashes($data);
  return $data;
}
?>