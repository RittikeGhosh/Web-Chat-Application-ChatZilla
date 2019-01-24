<?php

session_start();

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id)){
include_once 'db.php';

$frndlist = $id.'_frndlist';
$query = "SELECT name,id,profileimg FROM userdata WHERE id != $id && id NOT IN(SELECT id FROM $frndlist WHERE frndstatus = 3)ORDER BY name;";
$sql = mysqli_query($conn,$query);
$row_num = mysqli_num_rows($sql);
if($row_num != 0)
{
	while($data = mysqli_fetch_assoc($sql))
	{
		echo " <div class='outerppl'><a href = 'pplprofile.php?id=" . $data['id'] ."'><div class='ppls'><div class='dp'><img src =' " . $data['profileimg'] . "'></div><span>" . ucwords($data['name']) . "</span></div></a></div>";

	}
}
mysqli_close($conn);
}
else{
	header("location : ../index.php");
}

?>