<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 7:11 PM
 */
include 'MasterPage.php';
if ($_SESSION["isAdmin"] && $_SESSION["logged"]) {

    $con = new mysqli($host, $usrname, $passwd, $dbname);
    if (mysqli_connect_errno()) {
        exit('Connect failed: ' . mysqli_connect_error());
    }
}
if (isset($_GET["insert"])) {
    echo '<form action="InsertOrUpdate.php" method="get">';
    echo '<input type="hidden" name="insert" value="Insert user">';
    echo '<input type="text" name="User_Name" placeholder="User Name">';
    echo '<br>';
    echo '<input type="text" name="Password" placeholder="Password">';
    echo '<br>';
    echo '<input type="text" name="Email" placeholder="Email">';
    echo '<br>';
    echo '<input type="submit" value="Insert User">';
    echo '</form>';
}
if (isset($_GET["update"])){
    $selectQuery = 'SELECT * FROM Users WHERE ID = ' . $_GET["update"];
    $result = $con->query($selectQuery);
    $row = $result->fetch_assoc();
    echo '<form action="InsertOrUpdate.php" method="get">';
    echo '<input type="hidden" name="update" value=' . $row["ID"] . '>';
    echo 'The user ID is: ' . $row["ID"] . '<br>';
    echo 'User Name: <input type="text" name="User_Name" placeholder=' . $row["User_Name"] . '>';
    echo '<br>';
    echo 'Password: <input type="text" name="Password" placeholder=' . $row["Password"] . '>';
    echo '<br>';
    echo 'Email: <input type="text" name="Email" placeholder=' . $row["Email"] .'>';
    echo '<br>';
    echo 'The user was registered on: ' . $row["Register_Date"] . '<br>';
    echo 'The user last logged on: ' . $row["Last_Login"] . '<br>';
    echo 'The user logged in '. $row["Number_Of_Logins"] . ' times.<br>';
    echo 'Is Playing: <input type="text" name="Is_Playing" placeholder=' . $row["Is_Playing"] .'>';
    echo '<br>';
    echo 'Is Server: <input type="text" name="Is_Server" placeholder=' . $row["Is_Server"] .'>';
    echo '<br>';
    echo '<input type="submit" value="Update User">';
    echo '</form>';
}
if (isset($_GET["delete"])){
    $deleteQuery="DELETE FROM Users WHERE ID = " . $_GET['delete'];
    if ($con->query($deleteQuery) === TRUE) {
        echo 'The user was deleted';
        echo '<br>';
        echo '<a href="AdminPanel.php">Go back to Admin Panel!</a>';
    }
    else {
        echo 'Eroare: '. $con2->error;
        echo '<br>';
    }

    $con->close();
}