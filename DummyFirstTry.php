<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 3:36 PM
 */
echo 'Hello world';
include 'MasterPage.php';
$con = new mysqli($host, $usrname, $passwd, $dbname);
if (mysqli_connect_errno()) {
    exit('Conectare nereusita: '. mysqli_connect_error());
}

$ins="INSERT INTO Users (User_Name, Email) VALUES ('Ana', 'ana@ana')";

if ($con->query($ins) === TRUE) {
    echo 'Am inserat cu succes';
}
else {
    echo 'Eroare: '. $con->error;
    echo '<br>';
}

$con->close();



?>