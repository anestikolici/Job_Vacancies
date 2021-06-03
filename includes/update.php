<?php
if(isset($_POST["submit"])){

    session_start();
    $id=$_SESSION['id'];

    $companyName=$_POST['companyname'];
    $cityName=$_POST['cityname'];
    $phone=$_POST['phone'];

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "midtermproject";

    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);


    $sql="UPDATE users SET companyName='$companyName', cityName='$cityName', phoneNumber='$phone' WHERE usersId='$id'";
    $result=mysqli_query($connection, $sql);

    $_SESSION['company']=$companyName;
    $_SESSION['city']=$cityName;
    $_SESSION['phone']=$phone;
    header("location: ../profilepage.php?success");



}
else{
    echo "error";
}