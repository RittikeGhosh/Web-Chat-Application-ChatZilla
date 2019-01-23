<?php
session_start();

if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}

if($_SESSION['effd454fd545df5fdfd5flog'] == 1)
{

$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

	echo "
	<!DOCTYPE html>
	<html>
	<head>
		<title>ChatZilla</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' type='image/png' href='images/favicon.png'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<link rel='stylesheet' type='text/css' href='css/infoedit.css'>
	<script src ='js/infoedit.js'></script>
	</head>
	<body>
	<div>";
	include 'includes/nav.php';echo "</div><br><br><br><br><br><br>
		<div id='infoupdate'>
			<p>UPDATE YOUR PERSONAL INFO</p>
			<div id='info'>
				<div id='image'>
					<form method='post' action='includes/upload.php' enctype='multipart/form-data'>
						<div id='profileimg'>";
						include_once 'includes/db.php';

	                $query = "SELECT profileimg,name,address FROM userdata WHERE id = $id;";
	                $sql = mysqli_query($conn,$query);
	                $data = mysqli_fetch_assoc($sql);

	                echo "<img src='". $data['profileimg']. "?name=".rand()."'>
			            </div>
			            Change profile picture:<br><br>
			            <input type='file' name='profileimg' style='width: 200px;' required><br><br><br>
			            <button name='upload'>Upload</button>
					</form>
		        </div>
		        <div id='details'>
					<form method='POST' action='includes/updateinfo.php' id = 'infoform'>
						<table>
							<tr>
								<td><br>Your name: </td>
								<td><br><input id ='name' type='text' name='name' value ='" . ucwords($data['name']) . "'></td>
							</tr>
							<tr>
								<td>Address:</td>
								<td><br><textarea name='address' value ='" . $data['address'] . "'></textarea></td>
							</tr>
							<tr>
							<td>New Password (optional):</td>
							<td><input type='password' name='newpassword'></td>
							</tr>
						</table><br><br><br>
						<div id = 'password'>Confirm your current password:<br><br>
							<input type='password' name='password' required placeholder = 'Enter your password'><span style='margin:0 auto;font-weight:lighter;'></span><br><br><br>
						</div>
						<div style='text-align: center;'>
							<button id='update'>Update</button>
						</div>
					</form>
				</div>
			</div>

		</div>

	</body>
	</html>	";


}
else
{
	header("location:index.php");
}



?>