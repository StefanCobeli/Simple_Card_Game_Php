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

$updateQuery = "UPDATE users SET Is_Waiting = 1 WHERE ID = " . $_SESSION["id"];
$con->query($updateQuery);


header('Location: ' . "GamePlay.php?isWaiting=true");