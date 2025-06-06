<?php include 'db.php'; $id = $_GET['id']; if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first = $_POST['FirstNames'];
  $last = $_POST['LastName'];
  $gender = $_POST['Gender'];
  $trade_id = $_POST['Trade_Id'];
  $conn->query("UPDATE Trainees SET FirstNames='$first', LastName='$last', Gender='$gender', Trade_Id=$trade_id WHERE Trainee_Id=$id");
  header('Location: index.php');
} $trainee = $conn->query("SELECT * FROM Trainees WHERE Trainee_Id=$id")->fetch_assoc(); $trades = $conn->query("SELECT * FROM Trades"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Trainee</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <form method="POST" class="space-y-4">
    <input name="FirstNames" value="<?php echo $trainee['FirstNames']; ?>" required class="border px-4 py-2 block">
    <input name="LastName" value="<?php echo $trainee['LastName']; ?>" required class="border px-4 py-2 block">
    <select name="Gender" required class="border px-4 py-2 block">
      <option value="Male" <?php if ($trainee['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
      <option value="Female" <?php if ($trainee['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select>
    <select name="Trade_Id" required class="border px-4 py-2 block">
      <?php while ($trade = $trades->fetch_assoc()): ?>
        <option value="<?php echo $trade['Trade_Id']; ?>" <?php if ($trade['Trade_Id'] == $trainee['Trade_Id']) echo 'selected'; ?>>
          <?php echo $trade['Trade_Name']; ?>
        </option>
      <?php endwhile; ?>
    </select>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
  </form>
</body>
</html>
