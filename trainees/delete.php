<?php include 'db.php'; $id = $_GET['id']; $conn->query("DELETE FROM Trainees WHERE Trainee_Id=$id"); header('Location: index.php'); ?>
