<?php include 'db.php'; $id = $_GET['id']; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['Module_Name'];
  $trade_id = $_POST['Trade_Id'];
  $conn->query("UPDATE Modules SET Module_Name='$name', Trade_Id=$trade_id WHERE Module_Id=$id");
  header('Location: index.php');
} $module = $conn->query("SELECT * FROM Modules WHERE Module_Id=$id")->fetch_assoc(); $trades = $conn->query("SELECT * FROM Trades"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Module</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="Module_Name" value="<?php echo $module['Module_Name']; ?>" required class="border px-4 py-2 block">
    <select name="Trade_Id" class="border px-4 py-2 block">
      <?php while ($trade = $trades->fetch_assoc()): ?>
        <option value="<?php echo $trade['Trade_Id']; ?>" <?php if ($trade['Trade_Id'] == $module['Trade_Id']) echo 'selected'; ?>>
          <?php echo $trade['Trade_Name']; ?>
        </option>
      <?php endwhile; ?>
    </select>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
  </form>
</body>
</html>