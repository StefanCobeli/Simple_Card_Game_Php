
<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 7:58 PM
 */
include 'MasterPage.php';
$conn = new mysqli($host, $usrname, $passwd, $dbname);
$username = $_GET["User_Name"];
$password = $_GET["Password"];
$email = $_GET["Email"];
$isPlaying = (int)$_GET["Is_Playing"];
$isServer = (int)$_GET["Is_Server"];

if(isset($_GET["insert"])){
    $insertQuery = "INSERT INTO USERS (User_Name, Password, Email) VALUES ( '$username', '$password', '$email')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "The user was added to the database!";
    }
    else {
        echo 'Error: '. $conn->error;
    }
}

if (isset($_GET["update"])){

    $updateQuery = "UPDATE Users SET User_Name = '$username', Password = '$password', Email = '$email', Is_Playing = $isPlaying, Is_Server = $isServer WHERE ID = " . $_GET["update"];
    echo $updateQuery;
    if ($conn->query($updateQuery) === TRUE) {
        echo "The user information was updated!";
    }
    else {
        echo 'Error: '. $conn->error;
    }
}

$conn->close();
echo '<br>';
echo '<a href="AdminPanel.php">Go back to Admin Panel!</a>';