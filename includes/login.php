<?php
include 'db.php';
session_start();

$name = $email =$ePassword= "";

if(isset($_POST['login']) && !empty($_POST['login'])){
    $email = test_input(strtolower($_POST['email']));
    $ePassword = md5(test_input($_POST['password']));
    
    $query="SELECT id,name,password FROM userdata WHERE email='$email';";
    $DBquery=mysqli_query($conn,$query);
    $row_num= mysqli_num_rows($DBquery);

    if($row_num>0)
    {
        $rows=mysqli_fetch_assoc($DBquery);
        if($rows['password']==$ePassword)
        {
            //echo "<br>Ypu R SUCCESSFUlY LOGGED IN";

            $log = 1;
            $id = $rows['id'];

            $_SESSION['effd454fd545df5fdfd5flog'] = $log;
            $_SESSION['f56f56f5d6f5user6f654fidf5f'] = $id;
            $_SESSION['df5df56fduserdf4fdfg4namegb'] = $rows['name'];

            $statquery = "UPDATE userdata SET status=1 WHERE id=$id;";
            $atatsql = mysqli_query($conn,$statquery);
            
            header("location: ../landpage.php");
        }
        else
        {
            $log = 4;
            $_SESSION['effd454fd545df5fdfd5flog'] = $log;
            header("location: ../index.php");
        }
    }
    elseif($row_num == 0)
    {
            $log = 3;
            $_SESSION['effd454fd545df5fdfd5flog'] = $log;
          header("location: ../index.php");
    }
}

else {
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
