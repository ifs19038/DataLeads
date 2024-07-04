<?php
$mysqli = new mysqli("localhost", "root", "", "lead_management");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
