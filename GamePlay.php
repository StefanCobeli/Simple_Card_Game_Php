<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 5:59 PM
 */

include "MasterPage.php";

$con = new mysqli($host, $usrname, $passwd, $dbname);
if (mysqli_connect_errno()) {
    exit('Connect failed: '. mysqli_connect_error());
}
if(isset($_GET["Opponent"])) {
    // impartirea cartilor
    //0 make server and client
    //1 update isWaiting
    //2 insert isPlaying
    // gameplay-ul respectiv
    echo 'Your opponent is ' . $_GET["Opponent"];
}
else{
    echo '<a href="updateIsWaiting.php">Find a match</a>';
}

if (! $_SESSION['logged']){
    $con->close();
    header('Location: ' . "login.php?ceva=altceva");
    die();
}


if(isset($_GET["Difference"])){
        $insertQuery = "INSERT INTO Matches_Against_Eva (User_Id, Difference) VALUES ( " . $_SESSION["id"] . ", " . $_GET["Difference"] . ")";
        if ($con->query($insertQuery) === TRUE) {
            echo "The game was added to the database!";
        }
        else {
            echo 'Error: '. $con->error;
        }
        $con -> close();
}



