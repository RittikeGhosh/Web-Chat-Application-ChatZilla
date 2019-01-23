<?php
session_start();

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id))
{
	$frndlist = $id . "_frndlist";
	$count = 0;

	include_once 'db.php';

	$query = "SELECT * FROM $frndlist WHERE frndstatus = 3 OR frndstatus = 2; ";
	$sql = mysqli_query($conn,$query);

	if(mysqli_num_rows($sql) > 0)
	{
		while($frnd = mysqli_fetch_assoc($sql))
		{
			$frndstatus = $frnd['frndstatus'];
			$fid = $frnd['id'];
			if ($frndstatus == 3) 
			{

				$msgtable = $fid . "_to_" . $id ;

				// query to check fro new message from $frnd ...

				$newquery = "SELECT status FROM $msgtable WHERE status = 0 ;";
				$newsql = mysqli_query($conn,$newquery);

				$row_num = mysqli_num_rows($newsql);

				if($row_num > 0)
				{
					$namequery = "SELECT name FROM userdata WHERE id = $fid ;";
					$namesql = mysqli_query($conn,$namequery);
					$name  = mysqli_fetch_assoc($namesql);
					echo "<a href = 'chat.php?id=" . $fid . "'><div class = 'newmsg'><span>" . ucwords($name['name']) . "</span><br><br><br>You have " . $row_num . " unread messages . </div></a><br>";
					$count = $count + 1;
				}
			}
			elseif ($frndstatus == 2) {
				$namequery = "SELECT name FROM userdata WHERE id = $fid ;";
				$namesql = mysqli_query($conn,$namequery);
				$name  = mysqli_fetch_assoc($namesql);
				echo "<a href = 'pplprofile.php?id=" . $fid . "'><div class = 'frndrqst'>New request from &nbsp;&nbsp;<span>" . ucwords($name['name']) . "</span><br></div></a><br>";
			}
			
			
		}
	}
	if($count == 0)
	{
		echo "You have no new messages";
	}
}


?>