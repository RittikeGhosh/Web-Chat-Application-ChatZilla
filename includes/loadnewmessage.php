<?php
session_start();

$id  = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id))
{

	if(isset($_POST['fid']) && !empty($_POST['fid']))
	{
		$fid = $_POST['fid'];

	    include_once 'db.php';

		$frndtable = $fid. "_to_" . $id;

		$query = "SELECT * FROM $frndtable WHERE status = 0 ORDER BY dandti;";
		$sql = mysqli_query($conn,$query);

		$no_of_data = mysqli_num_rows($sql);

		if($no_of_data > 0)
		{
		
			while($data = mysqli_fetch_assoc($sql))
			{
				if($data['id'] == $fid)
				{
					
					//query to update status ....
					$msgid = $data['msgid'];

					$updatequery = " UPDATE $frndtable SET status = 1 WHERE msgid = $msgid;";

					mysqli_query($conn,$updatequery);

					echo "<div class ='outerfrnd'><br><div class='frnd'>" . modify_str($data['message']) . "</div></div>";


				}
			}
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