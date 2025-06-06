
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trades List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
  <h1 class="text-2xl font-bold mb-4">Trade List</h1>
  <a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Add Trade</a>
  <table class="table-auto border mt-4 w-full">
    <thead>
      <tr class="bg-gray-200">
        <th class="border px-4 py-2">ID</th>
        <th class="border px-4 py-2">Trade Name</th>
        <th class="border px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $result = $conn->query("SELECT * FROM Trades"); while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td class="border px-4 py-2"><?php echo $row['Trade_Id']; ?></td>
          <td class="border px-4 py-2"><?php echo $row['Trade_Name']; ?></td>
          <td class="border px-4 py-2">
            <a href="edit.php?id=<?php echo $row['Trade_Id']; ?>" class="text-blue-500">Edit</a>
            <a href="delete.php?id=<?php echo $row['Trade_Id']; ?>" class="text-red-500 ml-2">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>