<?php

include_once 'db.php';

$query = "SELECT id FROM `userdata` WHERE status=1 AND TIMESTAMPDIFF(SECOND, logdate, NOW()) > 20;";
$sql = mysqli_query($conn,$query);

if (mysqli_num_rows($sql)>0) {
	//echo mysqli_num_rows($sql);
	while($data=mysqli_fetch_assoc($sql))
	{
		$id = $data['id'];

		$uquery = "UPDATE `userdata` SET status = 0 WHERE id = $id;";
		$usql = mysqli_query($conn,$uquery);
	}

}

mysqli_close($conn);

?>