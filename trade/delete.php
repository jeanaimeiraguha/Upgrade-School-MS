
<?php include 'db.php'; $id = $_GET['id']; $conn->query("DELETE FROM Trades WHERE Trade_Id=$id"); header('Location: index.php'); ?>
