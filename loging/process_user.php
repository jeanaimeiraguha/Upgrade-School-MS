<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Change if needed
$database = 'GIKONKO_TSS'; // Replace with your DB name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
      $userId = intval($_POST['user_id']);

      $stmt = $conn->prepare("SELECT User_Id, Username, Role FROM users WHERE User_Id = ?");
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
          echo '
            <h2 class="text-2xl font-bold mb-4 text-blue-600">User Details</h2>
            <div class="space-y-2">
              <p><span class="font-semibold">ID:</span> ' . htmlspecialchars($user['User_Id']) . '</p>
              <p><span class="font-semibold">Username:</span> ' . htmlspecialchars($user['Username']) . '</p>
              <p><span class="font-semibold">Role:</span> ' . htmlspecialchars($user['Role']) . '</p>
            </div>
          ';
      } else {
          echo '<div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded">User not found.</div>';
      }

      $stmt->close();
  } else {
      echo '<div class="bg-red-100 text-red-800 px-4 py-2 rounded">No user selected. <a href=\"select_user.php\" class="underline text-blue-600">Go back</a></div>';
  }

  $conn->close();
  ?>

  <div class="mt-6">
    <a href="select_user.php" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Back to User Selection</a>
  </div>
</div>

</body>
</html>
