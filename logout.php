<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/14/2017
 * Time: 10:59 PM
 */


setcookie(session_name(),'',0,'/');
unset($_SESSION);
header('Location: ' . "index.php");