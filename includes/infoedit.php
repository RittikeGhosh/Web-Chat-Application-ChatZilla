<?php
session_start();
if($_SESSION['effd454fd545df5fdfd5flog'] == 1)
{

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ChatZilla</title>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<style type="text/css">
*{
	padding:0px 0px;
	margin: 0px 0px;
	font-family: 'Arimo', sans-serif;
	box-sizing: border-box;
}
#infoupdate{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-300px,-300px);
	width: 630px;
	height: 700px;
	background-color: rgba(122, 190, 104,0.8);
	padding: 50px 50px;
	box-shadow: 10px 10px 30px #eee;
}
#infoupdate #profileimg{
	width: 200px;
	height: 200px;
	border-radius: 100px;
	background-color: white;
	float: left;
	overflow: hidden;
	border:2px solid #087f23;
}
#infoupdate #profileimg img{
	width: 200px;
	height: 200px;

}
#infoupdate	td{
		height: 4em;
		text-align: center;
	}
#infoupdate	td:nth-child(even){
	padding: 0px 20px;
}
#infoupdate td input{
	width: 300px;
	height: 2em;
	border:0.5px solid default;
	outline: none;
	border-radius: 8px;
}
 #try{
	width: 50px;
	height: 2em;
}
#infoupdate td textarea{
	width: 300px;
	height: 4em;
}
#infoupdate #update{
	width: 100px;
	height: 4em;
	border:0px;
	border-radius: 20px 20px 0px 20px;
	background-color: #039be5;
	color: white;
	font-weight: bold;
}
#infoupdate #update:hover{
	background-color: #29b6f6;
}
</style>
</head>
<body>
	<div id="infoupdate">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div id="profileimg">
				<img src="../images/muser.jpg">
            </div>
            <input type="file" name="profileimg" style="width: 200px;">
            <button>Upload</button>
		</form>
				
		<form method="POST" action="updateinfo.php">
			<table>
				<tr>
					<td><br>Your name: </td>
					<td><br><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><textarea name="address"></textarea></td>
				</tr>
			</table><br><br>
			<div style="text-align: center;">
				<button id="update">Update</button>
			</div>
		</form>

	</div>

</body>
</html>