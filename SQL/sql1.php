<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection</title>
    <link rel="shortcut icon" href="../Resources/hmbct.png"/>
</head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<body>

<div style="background-color:#c9c9c9;padding:15px;">
    <button type="button" name="homeButton" onclick="location.href='../homepage.html';">Home Page</button>
    <button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';">Main Page</button>
</div>

<div align="center">
    POST
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <p>John -> Doe</p>
        First name : <input type="text" name="firstname">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<br />
<div align="center">
    GET
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
        <p>John -> Doe</p>
        First name : <input type="text" name="firstname">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<br />

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "1ccb8097d0e9ce9f154608be60224c7c";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

if (isset($_POST["submit"]) || isset($_GET["submit"])){
$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : $_GET["firstname"];

$sql = "SELECT lastname FROM users WHERE firstname='$firstname'";//String
$result = mysqli_query($conn, $sql);
?>
<table id="customers">
    <thead>
    <tr>
        <th>
            Last Name
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>";
            echo $row["lastname"];
            echo "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    }

    ?>
    </tbody>
</table>
</body>
</html>
