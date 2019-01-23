<?php

session_start();
$id = $_SESSION['f56f56f5d6f5user6f654fidf5f'];

if (isset($_POST['upload'])) {
    # code...
    $file = $_FILES['profileimg'];
    //print_r($files);
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileDest = "images/uploads/";

    $allowed = array('jpg','jpeg','png');
if($fileName != '')
    {
         if (in_array($fileActualExt, $allowed)) {
            # code...
            if ($fileError === 0) {
                # code...
                if ($fileSize < 10000000) {
                    # code...
                    $fileNewName = $id . "." .$fileActualExt;
                    $fileDest = $fileDest . $fileNewName;
                    //echo $fileDest;
                    move_uploaded_file($fileTmpName, "../" . $fileDest);

                    include_once 'db.php';

                    $query = "UPDATE userdata SET profileimg = '$fileDest' WHERE id = $id;";
                    $sql = mysqli_query($conn,$query);

                   // header("location: ../infoedit.php?status=success");

                    echo "<script>history.back();</script>";
                }
                else
                {
                    echo "<script>alert('the size of image if more than 10mb');history.back();</script>";
                }
            }
            else{
                echo "<script>alert('error uploading file');history.back();</script>";
            }

    }
    else{
        echo "<script>alert('this file type is not supported');history.back();</script>";
    }
}
else
{
    echo "<script>alert('empty selection');history.back();</script>";
}
   
}
?>