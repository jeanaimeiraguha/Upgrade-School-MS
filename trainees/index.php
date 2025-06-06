<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trainees List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <h1 class="text-2xl font-bold mb-4">Trainees</h1>
  <a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Add Trainee</a>
  <table class="table-auto border mt-4 w-full">
    <thead class="bg-gray-200">
      <tr>
        <th class="border px-4 py-2">ID</th>
        <th class="border px-4 py-2">First Names</th>
        <th class="border px-4 py-2">Last Name</th>
        <th class="border px-4 py-2">Gender</th>
        <th class="border px-4 py-2">Trade</th>
        <th class="border px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT Trainees.*, Trades.Trade_Name FROM Trainees JOIN Trades ON Trainees.Trade_Id = Trades.Trade_Id";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td class="border px-4 py-2"><?php echo $row['Trainee_Id']; ?></td>
          <td class="border px-4 py-2"><?php echo $row['FirstNames']; ?></td>
          <td class="border px-4 py-2"><?php echo $row['LastName']; ?></td>
          <td class="border px-4 py-2"><?php echo $row['Gender']; ?></td>
          <td class="border px-4 py-2"><?php echo $row['Trade_Name']; ?></td>
          <td class="border px-4 py-2">
            <a href="edit.php?id=<?php echo $row['Trainee_Id']; ?>" class="text-blue-500">Edit</a>
            <a href="delete.php?id=<?php echo $row['Trainee_Id']; ?>" class="text-red-500 ml-2">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>