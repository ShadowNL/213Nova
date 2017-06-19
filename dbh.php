<?php

$conn = mysqli_connect ("localhost", "root", "","213server");

if (!$conn) {
    die("onnection failed: ".mysqli_connect_error());
}