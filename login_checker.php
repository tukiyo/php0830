<?php
require_once("func.php");

session_start();
logincheck();
if (!$_SESSION["uid"]) {
    if (false === strpos($_SERVER["PHP_SELF"],"login.php")) {
        header("Location: login.php");
    }
}

require_once("header.html");

