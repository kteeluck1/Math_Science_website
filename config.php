<?php
$host = "localhost";
$db   = "taskdb";
$user = "appuser";
$pass = "StrongPasswordHere!";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB connection failed");
}
?>
