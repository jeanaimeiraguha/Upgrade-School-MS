<?php
$conn = new mysqli("localhost", "root", "", "GIKONKO_TSS");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
