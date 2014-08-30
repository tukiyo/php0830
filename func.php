<?php
function logincheck() {
    if (($_POST["username"] == "user1") && $_POST["password"] == "pass1") {
        $_SESSION["uid"] = "1001";
    }
}

function logout() {
    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    session_destroy();
    $_SESSION=array();
}

