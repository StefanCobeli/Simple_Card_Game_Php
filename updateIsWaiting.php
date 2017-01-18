<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/15/2017
 * Time: 1:05 AM
 */

include "MasterPage.php";

$con = new mysqli($host, $usrname, $passwd, $dbname);
if (mysqli_connect_errno()) {
    exit('Connect failed: '. mysqli_connect_error());
}
$getOpponentQuery = "SELECT ID FROM users WHERE Is_Server = 1 AND ID <> " . $_SESSION['id'];
$result = $con->query($getOpponentQuery);

if($result->num_rows > 0) {
//The player is not a server and he initialise the game in Matches, where the server is constantly searching
    $row = $result->fetch_assoc();

    $startMatchQuery = "INSERT INTO Matches (User_Id1, User_Id2) VALUES " . '(' . $_SESSION['id'] . ', ' . $row['ID'] . ')';
    $con->query($startMatchQuery);
    $updateQuery = "UPDATE users SET Is_Playing = 1, Is_Server = 0 WHERE ID = " . $_SESSION["id"];

    echo $startMatchQuery . '<br>' . $updateQuery;
    $con->query($updateQuery);
    $con->query('COMMIT');
    $con->close();
    header('Location: ' . "GamePlay.php?Opponent=" . $row['ID']);
}
else{

    $updateQuery = "UPDATE users SET Is_Playing = 0, Is_Server = 1 WHERE ID = " . $_SESSION["id"];
    $con->query($updateQuery);
    while(true){
        $findMatchQuery = 'SELECT User_Id1 FROM Matches WHERE User_Id2 = ' . $_SESSION['id'] .' AND Winner IS NULL';
        $match = $con->query($findMatchQuery);
        if($match->num_rows > 0) {
            $row = $match->fetch_assoc();
            $updateMatchFound = "UPDATE Users SET Is_Playing = 1, Is_Server = 0 WHERE ID = " . $_SESSION["id"];
            $con -> query($updateMatchFound);
            $con->query('COMMIT');
            $con->close();
            header('Location: ' . "GamePlay.php?Opponent=" . $row['User_Id1']);
            die();
        }
    }
}

$con->close();
header('Location: ' . "GamePlay.php");