<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action ="loginfunction.php" method="post">
    <input type="text" name="DocentID" placeholder="DocentID">
    <br>
    <input type="password" name="Password" placeholder="Password">
    <br>
    <button type="submit">Login</button>
</form>
<br>
<form action="logout.php">
    <button> Log out </button>
</form>
</body>
</html>
