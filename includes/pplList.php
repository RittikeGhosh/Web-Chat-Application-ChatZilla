<style type="text/css">
	#container #list1 #pplList .outerppl{
		background-color: #e0e0e0;
		width: 90%;
		height: 4em;
		margin: 3px auto;
		border-radius: 20px;
	}
	#container #list1 #pplList .outerppl:nth-child(odd){
		background-color: #ff8f00;
	}

	#container #list1 #pplList .outerppl:hover{
		background-color: red;
	}
	#container #list1 #pplList .outerppl a{
		text-decoration: none;
		color: purple;
		text-decoration: underline;
	}
	#container #list1 #pplList .outerppl a .ppls{
		width: 100%;
		height: 4em;
		border-radius: 20px;
		padding: 8px 20px 0px 10px;
		overflow-x: hidden;
		}
	#container #list1 #pplList .outerppl a .ppls span{
		position: relative;
		top: 15px;
		cursor: pointer;
		font-style: italic;
	}
	#container #list1 #pplList .outerppl a .ppls .dp{
		width: 3em;
		height: 3em;
		float: left;
		background-color: white;
		border-radius: 1.5em;
		margin: 0px 10px 0px 0px;
		overflow: hidden;
	}
	#container #list1 #pplList .outerppl a .ppls .dp img{
		width: 3em;
		height: 3em;
	}
</style>


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
		echo " <div class='outerppl'><a href = 'pplProfile.php?id=" . $data['id'] ."'><div class='ppls'><div class='dp'><img src =' " . $data['profileimg'] . "'></div><span>" . ucwords($data['name']) . "</span></div></a></div>";

	}
}
mysqli_close($conn);
}
else{
	header("location : ../index.php");
}

?>