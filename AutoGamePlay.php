<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/18/2017
 * Time: 1:03 PM
 */

include "MasterPage.php";


?>
<script type="text/javascript" src="AutoGamePlay.js">

</script>

<header style="text-align: center">
    <text style="border: dotted">Play Razboi agains Eva</text><br>
    <text id="Score">0:0</text>
</header>

<div id="Player" style="width: 50%; float: left">
    <text style="margin-left: 30%">Player's Ground:</text><br>
    <img id="PlayersCard" src="svg-cards/Card_back.svg" style="margin-left: 30%; margin-top: 20%;">
    <input type="button" value="Move" onclick="makeMove()">
</div>




<div id="Eva" style="width: 50%; float: right;">
    <text style="margin-left: 30%">Player's Ground:</text><br>
    <img id="EvasCard" src="svg-cards/Card_back.svg" style="margin-left: 30%; margin-top: 20%;">
</div>

<div id="">