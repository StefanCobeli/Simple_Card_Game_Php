

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
?>

<form style="float: right" method="get" action="SendEmails.php">
        Email Text:<br>
    <textarea cols="40" rows="7"  name="emailText"></textarea>
        <br><br>
        <input type="submit" value="Send this emails to all users allong with the game statistics">
    </form>
</form>

<?php
$url = 'http://crisplusina.ro/';
$content = file_get_contents($url);
$first_step = explode( '<div id="primary">' , $content );
$second_step = explode("</div>" , $first_step[1] );

//echo '<div sty>'
echo $second_step[0];
echo $second_step[1];
echo $second_step[2];
//$html = str_get_html($html);
//$amounts = array();
//foreach ( $html->find("div[class=hm_bottom] span") as $span ) {
//    $amount = trim($span->plaintext);
//    if (strpos($amount, "\$") === 0)
//        $amounts[] = $amount;
//}
//
//var_dump($amounts);

?>