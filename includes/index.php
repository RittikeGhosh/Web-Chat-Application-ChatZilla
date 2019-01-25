<?php

include_once 'db.php';

$query = "SELECT id,status FROM `userdata` WHERE status=1 AND TIMESTAMPDIFF(MINUTE, logdate, NOW()) > 20;";
$sql = mysqli_query($conn,$query);

if (mysqli_num_rows($sql)>0) {
	echo mysqli_num_rows($sql);
	while($row = mysqli_fetch_assoc($sql))
	{
		$id = $row['id'];

		$uquery = "UPDATE `userdata` SET status = 0 WHERE id = $id;";
		$sql = mysqli_query($conn,$uquery);
	}

}

mysqli_close($conn);

?>