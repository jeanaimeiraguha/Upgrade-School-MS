<?php include 'db.php'; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['Module_Name'];
  $trade_id = $_POST['Trade_Id'];
  $conn->query("INSERT INTO Modules (Module_Name, Trade_Id) VALUES ('$name', $trade_id)");
  header('Location: index.php');
} $trades = $conn->query("SELECT * FROM Trades"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Module</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="Module_Name" placeholder="Module Name" required class="border px-4 py-2 block">
    <select name="Trade_Id" class="border px-4 py-2 block">
      <?php while ($trade = $trades->fetch_assoc()): ?>
        <option value="<?php echo $trade['Trade_Id']; ?>"><?php echo $trade['Trade_Name']; ?></option>
      <?php endwhile; ?>
    </select>
    <button class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
  </form>
</body>
</html>
