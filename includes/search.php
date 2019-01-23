<?php
session_start();

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'] ;

if(!empty($id))
{
	if(isset($_POST['data']) && !empty($_POST['data']))
	{
		include_once 'db.php';

		$str = test_input($_POST['data']);

		$namequery = "SELECT name,id FROM userdata WHERE name LIKE '$str%' && id != $id; ";
		$namesql = mysqli_query($conn,$namequery);

		$emailquery = "SELECT email,id FROM userdata WHERE email = '$str' && id != $id; ";
		$emailsql = mysqli_query($conn,$emailquery);

		$row_num = mysqli_num_rows($namesql) ;
		if($row_num == 0)
		{
			if(mysqli_num_rows($emailsql) == 1)
			{
				$email = mysqli_fetch_assoc($emailsql);

				echo "<a href='pplprofile.php?id=".$email['id']."'><div class='name'>" . $email['email'] ."</div></a>";
			}
			else
			{
				echo "<br><div style='width:100%;heigth:3em;padding:10px 20px;'>no user....<br>For email enter the complete email</div>";
			}
		}
		else{
			echo "<br>";
			while ($data = mysqli_fetch_assoc($namesql)) {
				echo "<a href='pplprofile.php?id=".$data['id']."'><div class='name'>" .ucwords($data['name']) ."</div></a>";
				# code...
			}
			echo "<br>";
		}
		
	}

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}
?>