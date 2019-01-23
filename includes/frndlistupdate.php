
<?php

session_start();

if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
     $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}
$log = $_SESSION['effd454fd545df5fdfd5flog'] ;

if($log == 1)
{
if(isset($_POST['status']) && isset($_POST['fid']) && !empty($_POST['fid']) && $_POST['status']< 4)
{


	$id =$_SESSION['f56f56f5d6f5user6f654fidf5f'];      //user id ..........

	$fid = $_POST['fid'];
	$frndstatus = $_POST['status'];

    include_once 'db.php';

    $ftablename = $fid . "_frndlist";
    $usertablename = $id . "_frndlist";

    $umsgtable = $id  . "_to_" . $fid;           //messages from user to freind will store here...
    $fmsgtable = $fid . "_to_" . $id;             //messages from friend to user will be stored here..


    if($frndstatus == 0)
    {   
    	$newfrndstatus = 1;
    	$fnewfrndstatus = 2;

    	$query = "INSERT INTO $usertablename (id,frndstatus) VALUES($fid,$newfrndstatus) ;";
		$sql = mysqli_query($conn,$query);

		 //for the friend table .......

		$query = "INSERT INTO $ftablename (id,frndstatus) VALUES($id,$fnewfrndstatus) ;";
		$sql = mysqli_query($conn,$query);

		echo "Request Sent";
    }
    elseif ($frndstatus == 1) 
    {
    	//for the user table ........

		$query = "DELETE FROM $usertablename WHERE id = $fid ;";
	    $sql = mysqli_query($conn,$query);
        
        //for the friend table .......

	    $query = "DELETE FROM $ftablename WHERE id = $id ;";
	    $sql = mysqli_query($conn,$query);

	    echo "Add Friend";
    }
    elseif ($frndstatus == 2)
    {
    	
    	//for the user table ........

	    $query = "UPDATE $usertablename SET frndstatus = 3 WHERE id = $fid ;";
	    $sql = mysqli_query($conn,$query);

	    //for the friend table .......

	    $query = "UPDATE $ftablename SET frndstatus = 3 WHERE id = $id ;";
	    $sql = mysqli_query($conn,$query);

	    //for the message tables ...
	    $uquery = "CREATE TABLE $umsgtable(msgid integer(11) UNIQUE AUTO_INCREMENT NOT NULL,id integer(11) , message varchar(3000) NOT NULL,dandti datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,status integer(2) DEFAULT 0 NOT NULL);"  ;   //query for the user

	    $fquery = "CREATE TABLE $fmsgtable(msgid integer(11) UNIQUE AUTO_INCREMENT NOT NULL,id integer(11) , message varchar(3000) NOT NULL,dandti datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,status integer(2) DEFAULT 0 NOT NULL);" ;        //query for the user friend

	    mysqli_query($conn,$uquery);
	    mysqli_query($conn,$fquery);

	    echo "Friend";

    }
    elseif ($frndstatus == 3) 
    {
    	//for the user table ........

		$query = "DELETE FROM $usertablename WHERE id = $fid ;";
	    $sql = mysqli_query($conn,$query);
        
        //for the friend table .......

	    $query = "DELETE FROM $ftablename WHERE id = $id ;";
	    $sql = mysqli_query($conn,$query);

	    //drop table....

	    $dquery = "DROP TABLE $umsgtable,$fmsgtable;";
	    $sql = mysqli_query($conn,$dquery);

	    echo "Add Friend";

    }
    mysqli_close($conn);
}
else
{
	echo "fail";
}
}
 else
{
	header("location : ../index.php");
}

?>
	   