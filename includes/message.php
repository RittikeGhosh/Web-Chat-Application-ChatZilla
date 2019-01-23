<?php
session_start();

$id  = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(!empty($id))
{
	if(isset($_POST['newmessage']) && !empty($_POST['newmessage']))
	{
		$newmessage = test_input($_POST['newmessage']);
		$length =  strlen($newmessage);

		if($length < 256)
		{
			$fid = $_POST['fid'];
		
			//$fid = 2;
	
			$messagetable = $id. "_to_" . $fid;
	
			include_once 'db.php';
	
			//code to save the message in database ....
	
			$query = "INSERT INTO $messagetable(id,message)VALUES($id,'$newmessage');";
			mysqli_query($conn,$query);
			//echo $newmessage;
	
			echo "<div class ='outerme'><br><div class='me'>" .modify_str($newmessage) . "</div></div>";
			mysqli_close($conn);
		}
		else
		{
			echo "<p style='color:red;text-align:center;'>Warining !!! your message size has exceed its limit</p>";
		}
	}

}
function test_input($data) {
  //$data = trim($data);
  $data = str_replace('\\', '&#92;', $data);
 // $data = str_replace('{', '&#123;', $data);
  return $data;
}
function modify_str($data) {
	$find = array('  ','<');
	$replace = array(' &nbsp;','&lt;');
	$data = str_replace('&', '&amp', $data);
	$data = str_replace($find,$replace, $data);
	$data = nl2br($data);
	return $data;

}



?>