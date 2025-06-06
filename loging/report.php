<?php
require_once 'db.php';

$query = "
SELECT 
    m.Mark_Id,
    CONCAT(t.FirstNames, ' ', t.LastName) AS TraineeName,
    mo.Module_Name,
    m.Formative_Assessment,
    m.Summative_Assessment,
    m.Total_Marks
FROM marks m
JOIN trainees t ON m.Trainee_Id = t.Trainee_Id
JOIN modules mo ON m.Module_Id = mo.Module_Id
ORDER BY t.Trainee_Id, mo.Module_Id
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Trainee Report</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
  <div class="max-w-6xl mx-auto bg-white p-6 shadow-md rounded">
    <h2 class="text-xl font-semibold mb-4 text-center">Trainee Assessment Report</h2>
    <table class="min-w-full border border-gray-300 text-sm">
      <thead class="bg-gray-200">
        <tr>
          <th class="border px-3 py-2">#</th>
          <th class="border px-3 py-2">Trainee</th>
          <th class="border px-3 py-2">Module</th>
          <th class="border px-3 py-2">Formative</th>
          <th class="border px-3 py-2">Summative</th>
          <th class="border px-3 py-2">Total</th>
          <th class="border px-3 py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): 
          $n = 1;
          while ($row = $result->fetch_assoc()): 
            $status = ($row['Total_Marks'] >= 70) ? "Competent" : "Not Yet Competent";
        ?>
          <tr class="hover:bg-gray-100">
            <td class="border px-3 py-2"><?php echo $n++; ?></td>
            <td class="border px-3 py-2"><?php echo htmlspecialchars($row['TraineeName']); ?></td>
            <td class="border px-3 py-2"><?php echo htmlspecialchars($row['Module_Name']); ?></td>
            <td class="border px-3 py-2"><?php echo $row['Formative_Assessment']; ?></td>
            <td class="border px-3 py-2"><?php echo $row['Summative_Assessment']; ?></td>
            <td class="border px-3 py-2 font-semibold"><?php echo $row['Total_Marks']; ?></td>
            <td class="border px-3 py-2 text-center font-medium <?php echo ($status === 'Competent') ? 'text-green-600' : 'text-red-600'; ?>">
              <?php echo $status; ?>
            </td>
          </tr>
        <?php endwhile; else: ?>
          <tr>
            <td colspan="7" class="text-center py-4 text-red-500">No data available.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
