<?php

session_start();


$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if(isset($_POST['id']) && !empty($_POST['id']))
    {
    	$fid = $_POST['id'];

    	include_once 'includes/db.php';

    	$usertablename = $id . "_frndlist";
    	//echo $usertablename;

    	$query = "SELECT userdata.name FROM $usertablename INNER JOIN userdata ON $usertablename.id = userdata.id WHERE userdata.id = $fid;";
    	$sql = mysqli_query($conn,$query);
    	$row_num = mysqli_num_rows($sql);

    	if($row_num == 1){


    	$data = mysqli_fetch_assoc($sql);

    	$name = strtoupper($data['name']);

		echo "<html>
		<head>
			<title>ChatZilla</title>
			<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
			<script type='text/javascript' src='js/chat.js'></script>
			<link rel='stylesheet' type='text/css' href='css/chat.css'>
		</head>
		<body>
		<div>";
		    include 'includes/nav.php'; 
		    echo "
		</div>
		<div id='container'>
			<p><br><br><br><br></p>";

		     include 'includes/pplList1.php';
		echo "
		    <div id='body'>
				<div id='box'>&nbsp;
					<p id='fname'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span title='view profile'>";echo $name;
					echo "</span></p>
					<div id='chatBox'>
						<p id='loadmsg'>load all messages</p>
						<div id='innerChatBox'>

						</div>

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
?>