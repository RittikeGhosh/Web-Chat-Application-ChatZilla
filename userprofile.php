<?php 

session_start();

if(empty($_SESSION['effd454fd545df5fdfd5flog']))
{
     $log = 9;
  $_SESSION['effd454fd545df5fdfd5flog'] = $log;

}
$log = $_SESSION['effd454fd545df5fdfd5flog'] ;

if($log == 1){

include_once 'includes/db.php';

$id =$_SESSION['f56f56f5d6f5user6f654fidf5f'];
$query = "SELECT name,dob,email,address,profileimg FROM userdata WHERE id = $id ;";
$sql = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($sql);
echo "<html>
<head>
    <title>ChatZilla</title>
</head>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='css/userprofile.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<style type='text/css'>
        
</style>
    <!-- scripting  for the upper nav -->

     <script type='text/javascript'>
            $(document).ready(function(){
                $('#logout').click(function(){
                    window.location.href = 'includes/logout.php';

                });
                $('#home').click(function(){
                    window.location.href='landpage.php';
                });
                $('#profile').click(function(){
                    window.location.href='userprofile.php';
                })
                $('#messages').click(function(){
                    window.location.href='';
                })
            });
        </script>
        <!-- script for the frnd list -->
        <script type='text/javascript'>
            $(function(){
                setInterval(frndList,2000);
            function frndList(){
                $('#frndList').load('includes/frndList.php',{call : 'frndList'});

            }
            })

        </script>
        </script>
        <!-- script for the body -->
        <script type='text/javascript'>
            $(function(){
              $('button').click(function(){
                window.location.href = 'includes/infoedit.php';
                });
            });

        </script>


<body>
<div>
        <div id='nav'>
        <div id='logo'>
            <img src='images/logo.png' style='width:58px;height: auto;' title='ChatZilla'>
        </div>
        <div id='links'>
            <div id='home'>
            <span style='font-size: 2em; color: #009624;' title='home'>
            <i class='fas fa-home'></i>
            </span></div>
            <div id='messages'>
            <span style='font-size: 2em; color: #009624;' title='new messages'>
            <i class='fas fa-comment-alt'></i>
            </span></div>
            <div id='profile'>
            <span style='font-size: 2em; color: #009624;' title='profile'>
            <i class='fas fa-user-circle'></i>
            </span></div>
            <div id='logout'>
            <span style='font-size: 2em; color: #009624;' title='logout'>
                <i class='fas fa-power-off'></i>
           </span></div>
        </div>
        <div id='search-bar'>
            <input type='text' name='search-bar' placeholder='Search people....'>
        </div>
    </div>
    </div>
    <p><br><br><br><br></p>
    <div id='container'>
        <div id='list2'>
            <div style='width: 100%; background-color: rgb(122, 190, 104); height: 2em;text-align: center;border-bottom:2px dashed white;padding: 5px 0px;'>YOUR FREINDS </div><br><br>
            <div id='frndList'>

            </div>


        </div>  
        <div id='outerBody'>
            <div id='body'>
                <div id='userinfo'>
                    <div id='userimg'>
                        <img src='";
                        echo $data['profileimg'];
                        echo "'>
                    </div>
                    <div id='userdtls'>
                        <name style='font-weight:bold;'>" ; 
                        echo strtoupper($data['name']);

                 echo " </name><br><br>
                        <p>Born on: &nbsp;&nbsp;<dob>";
                         echo $data['dob'];
                        echo"</dob></p><br>
                        <p>E-mail:&nbsp; <email>";
                        echo $data['email'];
                        echo "</email> </p><br>
                        <p>Address: &nbsp;<addrress>";
                        echo $data['address'];
                        echo "</addrress></p><br>
                    </div>
                </div>
                <br><br><br><br><br>
                <div id='edit'>
                    <button>EDIT &nbsp;DETAILS</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>";
}
else{
    echo $log;
    header("location: index.php");
}

mysqli_close($conn);

?>