<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM Marks WHERE Mark_Id = $id");
header("Location: index.php");
?>