<?php
session_start();
include "DatabaseConnection.php";

$username = $_POST['user'];
$password = $_POST['pass'];
//retrieve username and pass
$sqlcheck = "SELECT Username, Password FROM docenten WHERE (Username = '" . $username . "') and (Password = '" . $password . "')";

$result = $conStr->query($sqlcheck);

if ($result && $result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()){
        $_SESSION['username'] = $row['Username'];
        header("Location: 4_adminoverview.php");
    }
}else{
    echo"in here";
    header ("Location: 3_adminlogin.php?err=1");
}