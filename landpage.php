<?php
session_start();
if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}


if($_SESSION['effd454fd545df5fdfd5flog'] == 1 )
{

 echo "<html>
<head>
	<title>ChatZilla</title>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
	<link rel='stylesheet' type='text/css' href='css/landpage.css'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

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
			<div id='msgicon'>MESSAGES</div>
			
				
		    </div>
	    </div>";
		     include 'includes/frndList2.php';
		     echo "
</body>
</html>";

}
elseif($_SESSION['effd454fd545df5fdfd5flog'] != 1){
   
    header("location: landpage.php");
}


?>