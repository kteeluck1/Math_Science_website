<?php
include "config.php";

$id = $_GET['id'];
$conn->query("UPDATE tasks SET is_done=1 WHERE id=$id");

header("Location: index.php");
