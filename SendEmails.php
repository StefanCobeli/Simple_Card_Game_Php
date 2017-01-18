<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/18/2017
 * Time: 3:14 PM
 */
include 'MasterPage.php';
$con = new mysqli($host, $usrname, $passwd, $dbname);
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

if(isset($_GET["emailText"])){


    $result = $con->query("SELECT Email FROM users WHERE ID <> " . $_SESSION["id"]);
    if (isset($result->num_rows) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if(mail($row["Email"], 'News-feed Razboi', $_GET['emailText'], $headers)){
                echo 'The mail for ' . $row["Email"] . " was successfully send!" . "<br>";
            }
            else{
                echo 'There was a problem with the mail ' . $row["Email"] . "!" . "<br>";
            }
        }
    }

}
echo '<a href="AdminPanel.php">Go back to Admin Panel!</a>';
$con -> close();