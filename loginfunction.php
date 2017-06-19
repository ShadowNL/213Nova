<?php
session_start();
include 'dbh.php';

$DocentID = $_POST['DocentID'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM docenten WHERE DocentID='$DocentID' AND Password='$Password'";
$result = mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)){
    echo "Your DocentID or Password is incorrect!";
} else {
    echo "Hello";
    $_SESSION['DocentID'] = $row['DocentID'];
}