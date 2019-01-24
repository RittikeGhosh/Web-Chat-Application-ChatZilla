<?php

session_start();

$query = $sql = $tablename = $id = "";

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id)){

    include_once 'db.php';

	$tablename = $id . "_frndlist";
	$query = "SELECT $tablename.id as id, userdata.name as name,userdata.profileimg,userdata.status FROM $tablename INNER JOIN userdata ON $tablename.id=userdata.id WHERE $tablename.frndstatus = 3 ORDER BY name;";
	$sql = mysqli_query($conn,$query);
	$num_row = mysqli_num_rows($sql);
	if($num_row > 0)
	{
		while($data = mysqli_fetch_assoc($sql))
	    {
	    	$fid = $data['id'];
	    	$status = $data['status'];

	    	$msgtable = $fid . "_to_" . $id ;

				// query to check fro new message from $frnd ...

				$newquery = "SELECT status FROM $msgtable WHERE status = 0 ;";
				$newsql = mysqli_query($conn,$newquery);
				$row_num = mysqli_num_rows($newsql);

				if(!empty($row_num))
				{
					$count = $row_num;
				}
				else{$count = 0;}

		   echo "<div class ='outerfrnd'><a href = 'chat.php?id=". $data['id'] . "'><div class='frnds'><div class='dp'><div style='background-color :";
		   if($status == 1)
		   {echo "#1faa00";} 
		elseif ($status == 0) {
			echo "red";
		}
			echo ";border-radius:7.5px; width:15px;height:15px; position:absolute;right:0px;bottom:0px;'></div><img src = '" . $data['profileimg'] . "'></div><span>". ucwords($data['name']) . "</span><div class= 'msgcount'>" . $count ."</div></div></a></div>";

	    }
	}
	else{
		echo "<br><br>&nbsp;&nbsp;&nbsp;no freind...........<br>&nbsp;&nbsp;&nbsp;Make new friends";
	}
	mysqli_close($conn);

}

?>