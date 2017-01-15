<text style="color:red;">
<?php
    include 'MasterPage.php';
    if(isset($_GET["ceva"])) {
        if ($_GET["ceva"] == "altceva") {
            echo "Username or password wrong!";
        }
    }
//    $variabila = $host;
//    echo $host;
?>
</text>

<form action="login_request.php" method="get">
    Username:<br>
    <input type="text" name="username">
    <br>
    Password:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Login">
</form>
