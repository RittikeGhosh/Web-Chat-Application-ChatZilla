<?php

session_start();

if($_SESSION['effd454fd545df5fdfd5flog'] == 1 ){
	$log = 5 ;
   $_SESSION['effd454fd545df5fdfd5flog'] = $log ;
   $id =$_SESSION['f56f56f5d6f5user6f654fidf5f'];

   unset($_SESSION['f56f56f5d6f5user6f654fidf5f']);

   include_once 'db.php';

   $query = "UPDATE userdata SET status=0 WHERE id=$id;";
   $sql = mysqli_query($conn,$query);

   header("location: ../index.php");
}
else{
	$log = 9 ;
   $_SESSION['effd454fd545df5fdfd5flog'] = $log ;
	header("location: ../index.php");

}

