<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Change this to your DB password
$database = 'GIKONKO_TSS'; // Change to your DB name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT User_Id, Username FROM users ORDER BY Username ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

  <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <form action="process_user.php" method="POST">
      <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Select a User:</label>
      <select name="user_id" id="user_id" class="block w-full border border-gray-300 rounded px-3 py-2 mb-4">
        <option value="">-- Choose a User --</option>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row['User_Id']) . "\">" . htmlspecialchars($row['Username']) . "</option>";
            }
        } else {
            echo "<option disabled>No users found</option>";
        }
        ?>
      </select>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Submit
      </button>
    </form>
  </div>

</body>
</html>

<?php
$conn->close();
?>
