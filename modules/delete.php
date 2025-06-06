<?php include 'db.php'; $id = $_GET['id']; $conn->query("DELETE FROM Modules WHERE Module_Id=$id"); header('Location: index.php'); ?>
