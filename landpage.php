<?php
session_start();
if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}


if($_SESSION['effd454fd545df5fdfd5flog'] == 1 )
{
	$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

	date_default_timezone_set("Asia/Kolkata");

	include_once 'includes/db.php';
	$date = date("Y-m-d H:i:s");
	$query = "UPDATE userdata SET logdate = '$date',status = 1 WHERE id = $id; ";
	$sql = mysqli_query($conn,$query);

 echo "<html>
<head>
	<title>ChatZilla</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' type='image/png' href='images/favicon.png'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
	<link rel='stylesheet' type='text/css' href='css/landpage.css'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type='text/javascript' src = 'js/landpage.js'></script>
	<style type='text/css' href = 'css/pplList.css'></style>

</head>
<body>
	<div>";

	include 'includes/nav.php';

	echo "	
	</div>
	<p><br><br><br><br></p>
	<div id='container'>";
	
            include 'includes/pplList1.php';
	echo "
		<div id='outerBody'>
			<div id='body'>
			<div id='msgicon'>Notifications</div>
			<div id = 'new'>
			</div>
				
		    </div>
	    </div>";
		     include 'includes/frndList2.php';
		     echo "</body></html>";

}
elseif($_SESSION['effd454fd545df5fdfd5flog'] != 1){
   
    header("location: landpage.php");
}


?>