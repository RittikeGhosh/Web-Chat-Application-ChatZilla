<?php
session_start();

$id  = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id))
{
	include_once 'db.php';

	if(isset($_POST['fid']) && !empty($_POST['fid']))
	{
		$fid = $_POST['fid'];

		$usertable = $id. "_to_" . $fid;
		$frndtable = $fid. "_to_" . $id;

		$query = "SELECT * FROM $usertable UNION SELECT * FROM $frndtable ORDER BY dandti;";
		$sql = mysqli_query($conn,$query);

		$no_of_data = mysqli_num_rows($sql);
		if($no_of_data > 0)
		{
			echo "<div id = 'info' style = 'text-align : center;'>no more message</div> ";
			while($data = mysqli_fetch_assoc($sql))
			{
				$message = modify_str($data['message']);

				if($data['id'] == $id)
				{
					echo "<div class ='outerme'><br><div class='me'>" . $message . "</div></div>";
				}
				elseif($data['id'] == $fid)
				{
					echo "<div class ='outerfrnd'><br><div class='frnd'>" . $message . "</div></div>";
					if($data['status'] == 0)
					{
						//query to update status ....
						$msgid = $data['msgid'];

						$updatequery = " UPDATE $frndtable SET status = 1 WHERE msgid = $msgid;";
						mysqli_query($conn,$updatequery);

					}
				}
			}

		}
		else
		{
			echo "<div id = 'info' style = 'text-align : center;'>no message</div> ";	
		}

		mysqli_close($conn);
	}

}
function modify_str($data) {
	$find = array('  ','<');
	$replace = array(' &nbsp;','&lt;');
	$data = str_replace('&', '&amp', $data);
	$data = str_replace($find,$replace, $data);
	$data = nl2br($data);
	return $data;

}


?>