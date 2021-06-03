<?php
if(isset($_POST["submit"])){
    $file = $_FILES["file"];

    $fileName=$file["name"];
    $fileTmpName=$file["tmp_name"];
    $fileSize=$file["size"];
    $fileError=$file["error"];
    $fileType=$file["type"];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png');


    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "midtermproject";

    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);


    session_start();
    $id=$_SESSION['id'];

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize<5000000){
                $fileNameNew="profile".$id.".jpg";
                $fileDestination="../images/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql="UPDATE pfp SET status=0 WHERE usersId='$id'";
                $result=mysqli_query($connection, $sql);


                header("location: ../profilepage.php?success");
            }else{
                echo "File too big.";
            }
        }
        else{
            echo "Something went wrong.";
        }

    }
    else{
        echo "Wrong file type";
    }

}