<?php

session_start();

if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}

$log = $_SESSION['effd454fd545df5fdfd5flog'];

if($log == 1)
{
	$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

	if(!empty($id))
	{
		if(!empty($_POST['name']) && !empty($_POST['password']))
		{
			$name = strtolower(test_input($_POST['name']));
			$address = test_input($_POST['address']);
			$newpassword = test_input($_POST['newpassword']);
			$password = md5(test_input($_POST['password']));

			include_once 'db.php';

			$query = "SELECT name,password,profileimg,address FROM userdata WHERE id = $id;";
			$sql = mysqli_query($conn,$query);
			$data = mysqli_fetch_assoc($sql);

			if($password == $data['password'])
			{
                if ($newpassword == '' ) {
                	# code...
                	$newpassword = $data['password'];
                }
                else
                {
                	$newpassword = md5($newpassword);
                }
                if ($address == '') {
                	# code...
                	$address = $data['address'];
                }

                $updatequery = "UPDATE userdata SET name = '$name' , address = '$address' , password ='$newpassword' WHERE id = $id; ";
                $updatesql = mysqli_query($conn,$updatequery);
                
                header("location:../userprofile.php?stat=success");
			}
			else{
				header("location:../infoedit.php?stat='incorrect password'");
			}

			mysqli_close($conn);
		}
		else{
			header("location:../infoedit.php?stat='name or password is empty'");
		}	
	}
	else{
		echo "illegal attempt";
	}
}
else
{
	//header("location:../index.php");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

