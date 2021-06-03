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
    <form action="mainpage.php" method="post" enctype="multipart/form-data">

        <input type="text" name="categoryFilter" value="" placeholder="Category"/>
        <input type="text" name="cityFilter" value="" placeholder="City"/>
        <button type="submit" name="search">Search</button>

    </form>


    <?php

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "midtermproject";
    $connection = mysqli_connect($servername, $dbUsername,$dbPassword,$dbname);

    session_start();

    if(empty($_POST['cityFilter'])&& empty($_POST['categoryFilter']))
    {
        $_SESSION['cityFilter']="";
        $_SESSION['categoryFilter']="";
    }
    else{
        $_SESSION['cityFilter']=$_POST['cityFilter'];
        $_SESSION['categoryFilter']=$_POST['categoryFilter'];
    }


    if(empty($_SESSION['cityFilter'])&& empty($_SESSION['categoryFilter']))
    {

        $sql="SELECT * FROM jobs";

        $result=mysqli_query($connection, $sql);

        echo "<form action='details.php' method='post' enctype='multipart/form-data'>";
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

        echo "<button type='submit' name='details'>Details</button>";
        echo "</form>";
        session_destroy();
    }

    elseif(!empty($_SESSION['cityFilter']) && empty($_SESSION['categoryFilter']))
    {

        $city=$_SESSION['cityFilter'];

        $sql="SELECT * FROM jobs WHERE cityName='$city'";

        $result=mysqli_query($connection, $sql);

        echo "<form action='details.php' method='post' enctype='multipart/form-data'>";
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

        echo "<button type='submit' name='details'>Details</button>";
        echo "</form>";
        session_destroy();
    }


    elseif(empty($_SESSION['cityFilter']) && !empty($_SESSION['categoryFilter']))
    {
        $category=$_SESSION['categoryFilter'];

        $sql="SELECT * FROM jobs WHERE category='$category'";

        $result=mysqli_query($connection, $sql);

        echo "<form action='details.php' method='post' enctype='multipart/form-data'>";
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

        echo "<button type='submit' name='details'>Details</button>";
        echo "</form>";
        session_destroy();
    }


    else if(!empty($_SESSION['cityFilter'])&& !empty($_SESSION['categoryFilter'])){

        $city=$_SESSION['cityFilter'];
        $category=$_SESSION['categoryFilter'];

        $sql="SELECT * FROM jobs WHERE cityName='$city' AND  category='$category'";

        $result=mysqli_query($connection, $sql);

        echo "<form action='details.php' method='post' enctype='multipart/form-data'>";
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

        echo "<button type='submit' name='details'>Details</button>";
        echo "</form>";
        session_destroy();
    }


    ?>



</body>
</html>