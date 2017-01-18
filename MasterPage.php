<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 8:30 PM
 */
$host = '127.0.0.1';
$usrname = 'root';
$passwd = '';
$dbname = 'RazboiDB';

session_start();

echo '<header>';
echo '<a href="index.php" style="float: left"> Home </a><br>';
if (isset($_SESSION["isAdmin"])){
    echo '<a href="AdminPanel.php">Admin Panel</a><br>';
}
else{
    if (isset($_SESSION["logged"])){
        echo '<a href="GamePlay.php">Play Razboi online</a><br>';
        echo '<a href="AutoGamePlay.php">Play Razboi with a computer</a><br>';
        echo '<a href="SendEmails.php"><br>';
    }
}
echo '<a href="Statistics.php">Statistics</a>';
if (isset($_SESSION["logged"]))  {
    echo '                  Hello ' . $_SESSION['userName'];
    echo '<a href="logout.php" value="Logout" style="float: right;">Logout</a>';
}
else {
    echo '<a href="login.php" style="float: right">Login</a>';
}
echo '</header>';

?>