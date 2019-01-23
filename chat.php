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

    if(isset($_GET['id']) && !empty($_GET['id']))
	    {
	    	$fid = test_input($_GET['id']);

	    	include_once 'includes/db.php';

            $usertablename = $id . "_frndlist";
	    	//echo $usertablename;

	    	$chkquery = "SELECT id FROM $usertablename WHERE id = $fid;";
	        $chksql = mysqli_query($conn,$chkquery);

	        if(mysqli_num_rows($chksql) == 1)
	        {
	        	$query = "SELECT userdata.name FROM $usertablename INNER JOIN userdata ON $usertablename.id = userdata.id WHERE userdata.id = $fid;";
		    	$sql = mysqli_query($conn,$query);
		    	$row_num = mysqli_num_rows($sql);

		    	if($row_num == 1)
		    	{
					$data = mysqli_fetch_assoc($sql);

			    	$name = strtoupper($data['name']);

					echo "<html>
						<head>
							<title>ChatZilla</title>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' type='image/png' href='images/favicon.png'>
							<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
							<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
							<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
							<script type='text/javascript' >
								$(function(){
									$.post('includes/messageload.php',{fid : " . $fid . "},function(data,status){
									
										$('#innerChatBox').append(data);
									    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},0);

									    $('textarea').focus(function(){
											$('#textBox').css({'border':'2px solid #2e7d32'});
										});
										$('textarea').blur(function(){
											$('#textBox').css({'border':'1px solid #2e7d32'});
										});

										$('#sendBox').click(function(){
											//val msg = ;
											if ($('textarea').val() !='') 
											{
												var str = $('textarea').val();

												var newstr = str;
												//alert(newstr);

												$.post('includes/message.php',{newmessage : newstr,fid : ". $fid . "},function(data,status){

													$('#innerChatBox').append(data);
												    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},1000);

												});
												
											    $('textarea').val('');
											    $('textarea').focus();
											}
										
										});

										setInterval(loadnew,1000);

									    function loadnew()
									    {
											$.post('includes/loadnewmessage.php',{fid :" . $fid ." },function(data,status){
													//alert(status + data);
													if(data != '')
													{
														$('#innerChatBox').append(data);
													    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},1000);
													}
											});
									    }
									});
								});
						    </script>
							<link rel='stylesheet' type='text/css' href='css/chat.css'>
						</head>
						<body>
						<div>";
						include 'includes/nav.php'; 

					echo "</div>
						<div id='container'>
							<p><br><br><br><br></p>";

						include 'includes/pplList1.php';
					echo " <div id='body'>
								<div id='box'>
									<p id='fname'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color:red;' href='pplprofile.php?id=" . $fid ."'><span title='view profile'>" . $name . "</span></a> <font color='#888' size='1px'>click to view profile</font></p>
									<div id='chatBox'>
										<div id='innerChatBox'></div>
									</div>
									<div id='msgBox'>
										<div id='textBox'>
											<textarea rows='1' placeholder='Type here...' id='txt' autofocus=''></textarea>
										</div>
										<div id='sendBox' title='send'>
											<span style='font-size: 48px; color: #2e7d32;'>
												 <i class='fas fa-paper-plane'></i>
											</span>
										</div>
									</div>
						        </div>
						    </div>";

						 include 'includes/frndList2.php' ;

						echo "</div>
						</body>
					</html>
					";
				}

	    	}
    	else
			{
				echo "<script>alert('This is not your Freinds id....\\n Your trying to make illegal command');history.back();</script>";
			}
			mysqli_close($conn);

		}
}
elseif($_SESSION['effd454fd545df5fdfd5flog'] != 1){
   header("location: landpage.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}
?>