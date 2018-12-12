<?php
$server="localhost";
$rootname="root";
$key="";
$database="chatzilla";
$conn=mysqli_connect($server,$rootname,$key,$database);

if($conn===false){
	die("my error is   : ".mysqli_connect_error());
}

?>
