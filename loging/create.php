<?php
include 'db.php';

$trainees = mysqli_query($conn, "SELECT * FROM Trainees");
$modules = mysqli_query($conn, "SELECT * FROM Modules");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainee = $_POST['trainee'];
    $module = $_POST['module'];
    $formative = $_POST['formative'];
    $summative = $_POST['summative'];
    $total = $formative + $summative;

    mysqli_query($conn, "INSERT INTO Marks (Trainee_Id, Module_Id, Formative_Assessment, Summative_Assessment, Total_Marks) 
                  VALUES ('$trainee', '$module', '$formative', '$summative', '$total')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Mark</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
    <h2 class="text-2xl font-bold mb-4">Add Mark</h2>
    <form method="POST" class="space-y-4">
        <select name="trainee" required class="block w-full border p-2">
            <option value="">Select Trainee</option>
            <?php while($t = mysqli_fetch_assoc($trainees)):
                echo "<option value='{$t['Trainee_Id']}'>{$t['FirstNames']} {$t['LastName']}</option>";
            endwhile; ?>
        </select>
        <select name="module" required class="block w-full border p-2">
            <option value="">Select Module</option>
            <?php while($m = mysqli_fetch_assoc($modules)):
                echo "<option value='{$m['Module_Id']}'>{$m['Module_Name']}</option>";
            endwhile; ?>
        </select>
        <input type="number" name="formative" placeholder="Formative Assessment (/50)" class="block w-full border p-2" required>
        <input type="number" name="summative" placeholder="Summative Assessment (/50)" class="block w-full border p-2" required>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</body>
</html>