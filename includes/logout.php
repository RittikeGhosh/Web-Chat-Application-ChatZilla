<?php

session_start();

if($_SESSION['effd454fd545df5fdfd5flog'] == 1 ){
	$log = 5 ;
   $_SESSION['effd454fd545df5fdfd5flog'] = $log ;

    header("location: ../index.php");
}
else{
	$log = 9 ;
   $_SESSION['effd454fd545df5fdfd5flog'] = $log ;
	header("location: ../index.php");

}

