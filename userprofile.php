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
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' type='image/png' href='images/favicon.png'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='css/userprofile.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<style type='text/css'>
        
</style>
        <!-- script for the body -->
        <script type='text/javascript'>
            $(function(){
              $('button').click(function(){
                window.location.href = 'infoedit.php';
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
        echo "<div id='outerBody'>
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
    header("location: index.php");
}

mysqli_close($conn);

?>