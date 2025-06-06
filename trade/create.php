
<?php include 'db.php'; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['Trade_Name'];
  $conn->query("INSERT INTO Trades (Trade_Name) VALUES ('$name')");
  header('Location: index.php');
} ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Trade</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="Trade_Name" placeholder="Trade Name" required class="border px-4 py-2">
    <button class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
  </form>
</body>
</html>