<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job Vacancies</title>
    <link rel="stylesheet" href="src/style.css" type="text/css">
</head>
<body>


<header>
    <section>
        <ul>
            <li class="left"><img src="images/logo.png" id="logo" width="50" height="50"></li>
            <li class="right" ><button onclick="location.href='loginpage.php'">LogIn</button></li>
            <li class="right"><button onclick="location.href='mainpage.php'">Home</button></li>
        </ul>
    </section>
</header>


<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "midtermproject";

$connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

if (isset($_POST['details'])) {




    if (!empty($_POST['jobId'])) {
        foreach ($_POST['jobId'] as $value) {

            $sql = "SELECT * FROM jobs WHERE jobId='$value'";
            $result = mysqli_query($connection, $sql);

            while($row=mysqli_fetch_assoc($result)){
                $usersId=$row['usersId'];
                $sqlUser="SELECT * FROM users WHERE usersId='$usersId'";
                $resultUsers=mysqli_query($connection,$sqlUser);

                while($rowUsers=mysqli_fetch_assoc($resultUsers)){
                    $companyName=$rowUsers['companyName'];
                    $contact=$rowUsers['phoneNumber'];


                }
                $jobTitle=$row['jobTitle'];
                $category=$row['category'];
                $descJob=$row['description'];
                $cityName=$row['cityName'];


                echo "<div>";
                echo "<form id='detailBox'>";
                echo "<img src='images/profile".$usersId.".jpg' width='200' height='200'>";
                echo "<h1>$companyName</h1>";

                echo "<div class='detailsText'><label>Job Title: $jobTitle</label><br/>
                      <label>Category: $category</label><br/>
                      <label>City: $cityName</label><br/>
                      <label>Description: $descJob</label><br/>
                      <label>Contact: $contact</label></div>";


                echo "</form>";
                echo "</div>";

            }

        }
    }

}
else{
    header("location: ../mainpage.php");
}
?>



</body>
</html>
