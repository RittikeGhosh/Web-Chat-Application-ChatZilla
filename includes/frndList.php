<style type="text/css">
	#container #list2 #frndList .frnds{
			background-color: #e0e0e0;
			width: 90%;
			height: 4em;
			margin: 3px auto;
			border-radius: 20px;
			padding: 8px 20px 0px 50px;
			overflow:hidden;
			overflow-wrap: break-word;
		}
	#container #list2 #frndList .frnds:nth-child(odd){
		background-color: #ff8f00;

	}
	#container #list2 #frndList .frnds span{
		position: relative;
		top: 15px;
		cursor: pointer;
		font-style: italic;
	}
	#container #list2 #frndList .frnds .dp{
		width: 3em;
		height: 3em;
		float: left;
		background-color: white;
		border-radius: 1.5em;
		margin: 0px 10px 0px 0px;
		overflow: hidden;
	}
	#container #list2 #frndList .frnds .dp img{
		width: 3em;
		height: 3em;
	}
</style>
<script>
	$(document).ready(function(){
         $(".frnds").click(function(){
			$(this).find("form").submit();
			});
	});
</script>

<?php

$query = $sql = $tablename = $id = "";

session_start();

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id)){

    include_once 'db.php';

	$tablename = $id . "_frndlist";
	$query = "SELECT $tablename.id as id, userdata.name as name,userdata.profileimg as profileimg FROM $tablename INNER JOIN userdata ON $tablename.id=userdata.id WHERE $tablename.frndstatus = 3;";
	$sql = mysqli_query($conn,$query);
	$num_row = mysqli_num_rows($sql);
	if($num_row > 0)
	{
		while($data = mysqli_fetch_assoc($sql))
	    {
		   echo " <div class='frnds'> <ul style='color :#1faa00;font-size : 40px;float:left;'><li></li></ul><div class='dp'><img src = '";echo $data['profileimg'];echo "'></div><span>";echo  strtoupper($data['name']); echo  "</span><form method ='post' action = 'chat.php'><input type ='hidden' name ='id' value =' ";echo $data['id'] ;echo " ' style ='width :10px;'></form></div>";

	    }
	}
	else{
		echo "<br><br>&nbsp;&nbsp;&nbsp;no freind...........<br>&nbsp;&nbsp;&nbsp;Make new friends";
	}

}

?>