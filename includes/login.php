<?php
include 'db.php';

$name = $email = $gender = $comment = $website = "";

if(isset($_POST['login'])){
     $email = test_input($_POST['email']);
     $ePassword = test_input($_POST['password']);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $ePassword."<br>".$email;
$query="SELECT password FROM userdata WHERE email='$email';";
$DBquery=mysqli_query($conn,$query);
$row_num= mysqli_num_rows($DBquery);
echo "<br>".$row_num;
if($row_num>0)
{
    $rows=mysqli_fetch_assoc($DBquery);
    if($rows['password']==$ePassword)
    {
        echo "<br>Ypu R SUCCESSFU;Y LOGGED IN";
    }
    else
    {
        echo "<br>thw enterwef passwor is incorrect";
         header("location: ../index.html");
    }
}
else
{
   echo "<br>this email is npt registred with us"; 
    header("location: ../index.html");
}

?>