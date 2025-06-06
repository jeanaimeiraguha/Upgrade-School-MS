<?php include 'db.php'; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first = $_POST['FirstNames'];
  $last = $_POST['LastName'];
  $gender = $_POST['Gender'];
  $trade_id = $_POST['Trade_Id'];
  $conn->query("INSERT INTO Trainees (FirstNames, LastName, Gender, Trade_Id) VALUES ('$first', '$last', '$gender', $trade_id)");
  header('Location: index.php');
} $trades = $conn->query("SELECT * FROM Trades"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Trainee</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="FirstNames" placeholder="First Names" required class="border px-4 py-2 block">
    <input name="LastName" placeholder="Last Name" required class="border px-4 py-2 block">
    <select name="Gender" required class="border px-4 py-2 block">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <select name="Trade_Id" required class="border px-4 py-2 block">
      <?php while ($trade = $trades->fetch_assoc()): ?>
        <option value="<?php echo $trade['Trade_Id']; ?>"><?php echo $trade['Trade_Name']; ?></option>
      <?php endwhile; ?>
    </select>
    <button class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
  </form>
</body>
</html>