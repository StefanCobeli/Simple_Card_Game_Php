

<script>
    function insertUser() {
        document.location = "AdminAction.php?insert=true";
    }

    function updateUser(id) {
        // redirect to AdminAction with $_GET["update"] = id;
        document.location = "AdminAction.php?update=" + id;
    }

    function deleteUser(id) {
        // redirect to AdminAction with $_GET["delete"] = id;
        document.location = "AdminAction.php?delete=" + id;
    }
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 6:44 PM
 */
include 'MasterPage.php';
if ($_SESSION["isAdmin"] && $_SESSION["logged"]){

    $con = new mysqli($host, $usrname, $passwd, $dbname);
    if (mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());
    }

    echo '<form action="AdminAction.php" method="get">';
    echo '<table>';
    $result = $con->query("SELECT * FROM users WHERE ID <> " . $_SESSION["id"]);
    if(isset($result->num_rows) && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            // username
            echo $row["User_Name"];
            echo '</td>';
            echo '<td>';
            // update button
            echo '<input type="button" onclick="updateUser(' . $row["ID"] . ')" value="Update">';
            echo '</td>';
            echo '<td>';
            //delete
            echo '<input type="button" onclick="deleteUser(' . $row["ID"] . ')" value="Delete">';
            echo '</td>';
            echo '</tr>';
        }
        // insert button
        echo '<input type="button" onclick="insertUser()" value="Insert">';

    }
    echo '</table>';
    echo '</form>';

}
else{
    header('Location: '. "login.php");
}