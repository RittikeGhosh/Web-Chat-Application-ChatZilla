<?php

session_start();
if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}


if($_SESSION['effd454fd545df5fdfd5flog'] != 1 )
{
 
echo "<html>
<head>
    <title>Login to ChatZilla </title>
    <link rel='stylesheet' href='css/login.css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei' rel='stylesheet'>
        <script
	src='https://code.jquery.com/jquery-3.3.1.min.js'
    integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
    crossorigin='anonymous'></script>
     <script>
        $(document).ready(function(){
         var log = 0;
         log =";
           $log = $_SESSION['effd454fd545df5fdfd5flog'];echo $log; $log = 9 ;$_SESSION['effd454fd545df5fdfd5flog'] = $log;
          echo ";

         if(log == 4)
                {
                    alert('Incorrect Password');
                }
        if(log == 3)
            {
                alert('This EMAIL is not registered with us ');
            }
        if(log == 5)
            {
                alert('succesfully logged out');
            }
        if(log == 2)
            {
                alert('You have successfully created your account');
            }

        });
    </script>
</head>

<body>
     <div id='head'>";
            include 'includes/header.php';
    echo "</div>
    <div class='container'>
        <div id='form_details'>
            <h1>WELCOME </h1><br>
            <img src='images/logo.png'><br><br>
            <p style='color:white;'><span>ChatZilla</span> provides the platform to connect to the people you love to talk to share.</p>

        </div>

        <div id='login'>
            <h1 style='color: #FF3D00 ;text-shadow: 2px 2px 0px #888'>Login</h1>to your account
            <br><br>
            <hr><br><br>
            <div>
                <form action='includes/login.php' method='post'>
                    <div class='input'>
                        <input type='text' name='email' required autofocus>
                        <label>Enter Your email</label><br>
                    </div>
                    <div class='input'>
                        <input type='password' name='password' required>
                        <label>Enter Your Password</label>
                    </div><br>
                    <p><a href='#' style='font-size: 15px;text-decoration: none;float: right; position: relative;top: -35px;'>Forgot Password ??</a></p><br>
                    <input type='submit' value='Login' name='login'>
                </form>
            </div>
            <p>OR</p>
            <a href='signup.php' target='_self'><input type='submit' value='Sign up' name='signup'></a>
        </div>
    </div>

</body>
</html>";
}
elseif($_SESSION['effd454fd545df5fdfd5flog'] == 1){
   
    header("location: landpage.php");
}


?>
