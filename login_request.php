<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 5:39 PM
 */
include 'MasterPage.php';
$username = $_GET["username"];
$password = $_GET["password"];

$con = new mysqli($host, $usrname, $passwd, $dbname);
if (mysqli_connect_errno()) {
    exit('Connect failed: '. mysqli_connect_error());
}

$selectQuery = "SELECT * FROM users WHERE User_Name = '$username' AND Password = '$password'";
$updateLogins = "UPDATE  ";


$result = $con->query($selectQuery);

if(isset($result->num_rows) && $result->num_rows > 0) {
    $_SESSION['logged'] = true;
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row["ID"];
    $numberOfLogins = (int) ($row['Number_Of_Logins']) + 1;
    var_dump($numberOfLogins);
    $nrLogins = (string) $numberOfLogins;
    $updateQuery = "UPDATE Users SET Number_Of_Logins = $nrLogins WHERE User_Name = '$username'";
    $con->query($updateQuery);
    if($row["Is_Admin"] == 1){
        $_SESSION['isAdmin'] = true;
        header('Location: '. "AdminPanel.php");
    }
    else {
        header('Location: ' . "GamePlay.php");
    }
}
else {
    header('Location: '. "login.php?ceva=altceva");
}

$con->close();
?>
