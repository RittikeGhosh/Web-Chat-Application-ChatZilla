<style type="text/css">

#container #list2 #frndList .outerfrnd{
            background-color: #e0e0e0;
			width: 90%;
			height: 4em;
			margin: 3px auto;
			border-radius: 20px;
}
#container #list2 #frndList .outerfrnd:nth-child(odd){
            background-color: #ff8f00;
}
#container #list2 #frndList .outerfrnd:hover{
	background-color: red;
}
	#container #list2 #frndList .outerfrnd a .frnds{
			width: 100%;
			height: 4em;
			border-radius: 20px;
			padding: 8px 20px 0px 40px;
			overflow:hidden;
			overflow-wrap: break-word;
			position: relative;
		}
	#container #list2 #frndList .outerfrnd a .frnds span{
		position: relative;
		top: 15px;
		cursor: pointer;
		font-style: italic;
	}
	#container #list2 #frndList .outerfrnd a .frnds .dp{
		width: 3em;
		height: 3em;
		float: left;
		background-color: white;
		border-radius: 1.5em;
		margin: 0px 10px 0px 0px;/*
		overflow: hidden;*/
		position: relative;
	}
	#container #list2 #frndList .outerfrnd a .frnds .dp img{
		width: 3em;
		height: 3em;
		border-radius: 1.5em;
	}
	.msgcount{
        background-color :#1e88e5;
        padding: 5px 5px 2px 5px;
        border-radius:7.5px; 
        width:auto;
        height:25px; 
        float: right;
        position: absolute;
        top: -2px;
        right: 20px;
        text-align: center;
        color: white;
        /*position:relative; 
        left:90%;
        top:-5px;*/
	}
</style>

<?php

$query = $sql = $tablename = $id = "";

session_start();

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