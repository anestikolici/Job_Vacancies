<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="src/style.css" type="text/css">
</head>
<body>

    <header>
        <section>
            <ul>
                <li class="left"><img src="images/logo.png" id="logo" width="50" height="50"></li>
                <li class="right"><button onclick="location.href='mainpage.php'">Home</button></li>

            </ul>

        </section>

    </header>

    <div class="login_box">

        <form ction ="loginpage.php" class="LoginForm" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <label>Username: </label>
                <input type="text" name="Username"/>
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input type="password" name="Password"/>
            </div>

            <input type="submit" name="Login" class="button" value="Log In"/>
            <div class="goToRegister">
                <input  class="button" type="button" value="No account? Register Here" name="Go To Register" onclick="location.href='register.php'"/>
            </div>

        </form>

        <?php
        if(isset($_POST["Login"])) {
            $username = $_POST["Username"];
            $password = $_POST["Password"];


            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "midtermproject";

            $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

            require_once 'includes/functions.php';

            if (emptyInput2($username, $password) !== false) {
                exit();
            }

            loginUser($connection, $username, $password);

        }
        ?>

    </div>




</body>
</html>