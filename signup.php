<?php
session_start();

if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}


if($_SESSION['effd454fd545df5fdfd5flog'] != 1 )
{
echo "
<html>
<head>
    <title>Signup for ChatZilla</title>
    <link rel='stylesheet' href='css/signup.css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei' rel='stylesheet'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
    <script
	src='https://code.jquery.com/jquery-3.3.1.min.js'
    integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8='
    crossorigin='anonymous'></script>
    <script>
           $(document).ready(function(){
               var log = 0;
               log = "; $log = $_SESSION['effd454fd545df5fdfd5flog'];echo $log;$log = 9 ;$_SESSION['effd454fd545df5fdfd5flog'] = $log;

    echo ";
           if(log==3)
           {
               alert('This email is incorrect or is already registered with us  OR    TRY DIFFERENT EMAIL OR LOGIN INSTEAD ');
           }
           });

    </script>
</head>

<body>
    <div id='head'>";
        include 'includes/header.php';
        echo "
    </div>
    <div id='container'>

        <div id='info'>
            <img src='images\signup.png'>
        </div>
        <div id='form'>
            <div id='signup'>
                <div id='logo'>
                    <span style='font-size: 5em;color:#2196F3;'>
                        <i class='fas fa-user'></i>
                    </span>
                </div>
                <form action='includes/signup.php' method='post'>
                    <div class='input'>
                        <input type='text' name='name' required autofocus>
                        <label>Enter Your Name</label>
                    </div>
                    <div class='gender'>
                        <label><b>GENDER :</b></label>
                        <br>
                        &nbsp;&nbsp;
                        <input type='radio' value='male' name='gender' required>&nbsp;
                        <label>Male</label>&nbsp;&nbsp;&nbsp;
                        <input type='radio' value='female' name='gender' required>&nbsp;<label>Female</label>&nbsp;&nbsp;&nbsp;
                        <input type='radio' value='transgender' name='gender' required>&nbsp;<label>Transgender</label><br><br>
                        <label><b>DATE OF BIRTH :</b></label>&nbsp;&nbsp;&nbsp;
                        <input type='date' name='dob' required>
                    </div>
                    <div class='input'>
                        <input type='text' name='email' required>
                        <label>Enter Your Email</label><br>
                    </div>
                    <div class='input'>
                        <input type='password' name='password' required>
                        <label>Enter Your Password</label>
                    </div><br>
                    <input type='submit' value='Sign Up' name='signup'>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
";
}
elseif($_SESSION['effd454fd545df5fdfd5flog'] == 1){
   
    header("location: landpage.php");
}
?>