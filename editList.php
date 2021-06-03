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
            <li class="right"><button onclick="location.href='includes/logout.php'">Log Out</button></li>
            <li class="right"><button onclick="location.href='mainpage.php'">Home</button></li>
        </ul>
    </section>
</header>


<?php

    session_start();
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "midtermproject";

    $usersId= $_SESSION['id'];

    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

    $sql="SELECT * FROM jobs WHERE usersId='$usersId'";

    $result=mysqli_query($connection, $sql);

    echo "<form action='includes/deleteJob.php' method='post' enctype='multipart/form-data'>";
    echo "<table>";
    echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Category</th>";
        echo "<th>Description</th>";
        echo "<th>Check</th>";
    echo "</tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";

        echo "<td>".$row['jobTitle']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td><input type='checkbox' name='jobId[]' value='".$row['jobId']."'></td>";


        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
    echo "<button id='delButton' type='submit' name='delete'>Delete</button>";

?>

<form id='jobForm' action='includes/addJob.php' method='post' enctype='multipart/form-data'>
    <label>Title: </label>
    <input type='text' name='title' />
    <label>Category: </label>
    <input type='text' name='category'/>
    <label>Description: </label>
    <textarea id="descText" name="description"></textarea>

    <button type='submit' name='submit'>Add</button>

</form>


</body>
</html>
