<?php require_once("login_checker.php"); ?>

<form method="post" action="exam_info.php">
ログイン <br>
username: <input type="text" name="username" value="<?php $_POST['username']; ?>">user1 <br>
password: <input type="password" name="password" value="<?php $_POST['password']; ?>">pass1 <br>
<input type="submit" value="ログイン">
</form>
