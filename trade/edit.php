<?php include 'db.php'; $id = $_GET['id']; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['Trade_Name'];
  $conn->query("UPDATE Trades SET Trade_Name='$name' WHERE Trade_Id=$id");
  header('Location: index.php');
} $result = $conn->query("SELECT * FROM Trades WHERE Trade_Id=$id"); $trade = $result->fetch_assoc(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Trade</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="Trade_Name" value="<?php echo $trade['Trade_Name']; ?>" required class="border px-4 py-2">
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
  </form>
</body>
</html>
