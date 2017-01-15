<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 5:59 PM
 */
$host = '127.0.0.1';
$usrname = 'root';
$passwd = '';
$dbname = 'RazboiDB';
session_start();

if(isset($_GET["isWaiting"])) {

    $con = new mysqli($host, $usrname, $passwd, $dbname);
    if (mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());
    }
    $getOpponentQuery = "SELECT ID FROM users WHERE Is_Waiting = 1 AND ID <> " . $_SESSION['id'];
    $result = $con->query($getOpponentQuery);
    if($result->num_rows > 0) {
        header('Location: ' . "GamePlay.php?gameStarted=true");
    }
    header('Location: ' . "GamePlay.php?isWaiting=true");
}
else if(isset($_GET["gameStarted"])) {
    // impartirea cartilor
    // gameplay-ul respectiv
}
echo '<a href="updateIsWaiting.php">Find a match</a>';

if (! $_SESSION['logged']){
    header('Location: ' . "login.php?ceva=altceva");
}



