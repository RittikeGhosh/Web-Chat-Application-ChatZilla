<?php
include_once 'db.php';
session_start();

$name = $email = $ePassword = $gender = $dob = $log="";

if(isset($_POST['signup']) && !empty($_POST['signup']))
{
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['gender']) && !empty($_POST['gender']) && isset($_POST['dob']) && !empty($_POST['dob']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['otp']) && !empty($_POST['otp'])) 
    {
        
        $name =test_input(strtolower($_POST['name']));
        $gender = test_input($_POST['gender']);
        $dob=test_input($_POST['dob']);
        $email = test_input(strtolower($_POST['email']));
        $otp = test_input($_POST['otp']);
        $ePassword = md5(test_input($_POST['password']));

        $realotp = $_SESSION['s5d4sdotpsdv5x'];

        unset($_SESSION['s5d4sdotpsdv5x']);

        if($realotp == $otp)
        {
            echo "OTP successfully verified ...";
             //for default image.......
            $profileimg = "images/".$gender.".JPG";

            $query="SELECT gender FROM userdata WHERE email='$email';";
            $sql=mysqli_query($conn,$query);
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && (mysqli_num_rows($sql)==0))
            {

                $query="SELECT max(id) FROM userdata ;";
                $sql=mysqli_query($conn,$query);
                $row = mysqli_num_rows($sql);
                if(mysqli_num_rows($sql)==0)
                {
                    $id=1;
                }
                else
                {
                    $row = mysqli_fetch_array($sql, MYSQLI_NUM);
                    $id=$row[0]+1;
                }

                $query="INSERT INTO userdata (name,gender,dob,email,password,id,profileimg) VALUES('$name','$gender','$dob','$email','$ePassword','$id','$profileimg'); ";
                $sql=mysqli_query($conn,$query);
                $tablename = $id . "_frndlist";
                $query="CREATE TABLE $tablename(id integer(11) PRIMARY KEY, frndstatus varchar(20));";
                $sql=mysqli_query($conn,$query);
            //   mysqli_free_result($sql);
            //    mysqli_close($conn);
                $log = 2;
                $_SESSION['effd454fd545df5fdfd5flog'] = $log;
                header("location: ../index.php");

            }
            else
            {
                $log = 3;
                $_SESSION['effd454fd545df5fdfd5flog'] = $log;         
                header("location: ../signup.php");
            }

        }
        else
        {
           // echo "OTP doesnot match";
            $log = 7;
            $_SESSION['effd454fd545df5fdfd5flog'] = $log;         
            header("location: ../signup.php");

        }
    }
}
else
{
     header("location: ../index.php");
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_close($conn);

?>