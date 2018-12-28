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

    include_once 'includes/db.php';

    if(isset($_POST['id']) && !empty($_POST['id']))
    {
    	$fid = $_POST['id'];

        $id =$_SESSION['f56f56f5d6f5user6f654fidf5f'];      //user id ..........

        $usertablename = $id . "_frndlist";          //tablename............

        //query for the user friend list access ...........

        $fquery = "SELECT id,frndstatus FROM $usertablename WHERE id = $fid; ";
        $fsql = mysqli_query($conn,$fquery);
        $frow_num = mysqli_num_rows($fsql);
        $fdata = mysqli_fetch_assoc($fsql);

        //query for the friend profile ......

        $query = "SELECT name,dob,email,address,profileimg FROM userdata WHERE id = $fid ;";
        $sql = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($sql);

        //main body starts here ..........

        echo "<html>
        <head>
            <title>ChatZilla</title>
        </head>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
        <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/pplprofile.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

        <!-- script for the body -->

         <script type='text/javascript'>
    	
    	    $(function(){
                 var status = ";if($frow_num == 0){echo 0;}else{ echo $fdata['frndstatus'];}echo ";
    		   $('#frnd').click(function(){
    			   $.post('includes/frndlistupdate.php' , { status :status "; echo ",fid : "; echo $fid; echo " },
    			   function(data)
    			    { 
    				  $('#frnd').text(data);window.location.reload();
    			    });
    		   });

    	    });
        </script>


        <body>
        <div>";

        include 'includes/nav.php';
                
            echo "</div>
            <p><br><br><br><br></p>
            <div id='container'>";

                include 'includes/frndList2.php';

            echo "    <div id='outerBody'>
                    <div id='body'>
                        <div id='userinfo'>
                            <div id='userimg'>
                                <img src='"; echo $data['profileimg']; echo "'>
                            </div>
                            <div id='userdtls'>
                                <name style='font-weight:bold;'>" ; echo strtoupper($data['name']); echo " </name><br><br>

                                <p>Born on: &nbsp;&nbsp;<dob>"; echo $data['dob']; echo"</dob></p><br>

                                <p>E-mail:&nbsp; <email>"; echo $data['email']; echo "</email> </p><br>

                                <p>Address: &nbsp;<addrress>"; echo $data['address']; echo "</addrress></p><br>
                            </div>
                        </div>

                        <br><br><br><br><br>
                        <div id = 'edit'>";
                        if($frow_num > 0)
                        {
                        	if($fdata['frndstatus'] == 3)
                        	{
                        		echo "<div id='friend'>
                                          <button id='frnd'>Freinds</button>
                                      </div>
                                      <div id='message'>
                                          <button id = 'msg'>MESSAGE</button>
                                      </div>";
                            }

                            elseif($fdata['frndstatus'] == 1)
                            {
                	            echo "<div id='friend'>
                                          <button id='frnd'>Request sent</button>
                                      </div> ";
                	        }

                            elseif($fdata['frndstatus'] == 2){
                        	    echo "<div id='friend'>
                                          <button id='frnd'>Accept request</button>
                                      </div>";
                        	}

                        }
                        else{
                        	echo "<div id='friend'>
                                      <button id='frnd'>Add friend</button>
                                  </div>";
                        	}
                        
                        echo "
                    </div>
                </div>
            </div>

        </body>
        </html>";

        mysqli_close($conn);
    }

}
else{
    header("location: index.php");
}


?>

