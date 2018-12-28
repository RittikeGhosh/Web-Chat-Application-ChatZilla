<style type="text/css">
	#container #list1 #pplList .ppls{
			background-color: #e0e0e0;
			width: 90%;
			height: 4em;
			margin: 3px auto;
			border-radius: 20px;
			padding: 8px 20px 0px 10px;
			overflow-x: hidden;
		}
	#container #list1 #pplList .ppls:nth-child(even){
		background-color: #ff8f00;

	}
	#container #list1 #pplList .ppls span{
		position: relative;
		top: 15px;
		cursor: pointer;
		font-style: italic;
	}
	#container #list1 #pplList .ppls .dp{
		width: 3em;
		height: 3em;
		float: left;
		background-color: white;
		border-radius: 1.5em;
		margin: 0px 10px 0px 0px;
		overflow: hidden;
	}
	#container #list1 #pplList .ppls .dp img{
		width: 3em;
		height: 3em;
	}
</style>
<script>
	$(document).ready(function(){
         $(".ppls").click(function(){
			$(this).find("form").submit();
			}) ;
			});
</script>


<?php

session_start();

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id)){
include_once 'db.php';


$query = "SELECT name,id,profileimg FROM userdata WHERE NOT id = $id ORDER BY name;";
$sql = mysqli_query($conn,$query);
$row_num = mysqli_num_rows($sql);
if($row_num == 0)
{
	echo "&nbsp;&nbsp;&nbsp;no user registered other than you<br> ";
	echo "&nbsp;&nbsp;&nbsp;Congrats u r the first";
}
else
{
	while($data = mysqli_fetch_assoc($sql))
	{
		echo " <div class='ppls'> 
		<div class='dp'><img src = ";echo $data['profileimg'];
		echo "></div><span>" . strtoupper($data['name']) . "</span><form method ='post' action = 'pplProfile.php'><input type ='hidden' name ='id' value =' " . $data['id'] ." ' style ='width :10px;'></form></div>";

	}
}
}
else{
	header("location : ../index.php");
}

?>