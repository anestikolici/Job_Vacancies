<?php
if(isset($_POST["submit"])){
    session_start();
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "midtermproject";

    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

    $jobTitle=$_POST["title"];
    $category=$_POST["category"];
    $description=$_POST["description"];

    $usersId=$_SESSION['id'];
    $cityName=$_SESSION['city'];




    $sql="INSERT INTO jobs (jobTitle, category, description, usersId, cityName)
        VALUES ('$jobTitle','$category', '$description', '$usersId', '$cityName')";

    $result=mysqli_query($connection, $sql);

    header("location: ../editList.php");
}
