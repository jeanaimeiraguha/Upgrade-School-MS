<?php
include 'db.php';
$id = $_GET['id'];
$mark = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Marks WHERE Mark_Id = $id"));
$trainees = mysqli_query($conn, "SELECT * FROM Trainees");
$modules = mysqli_query($conn, "SELECT * FROM Modules");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainee = $_POST['trainee'];
    $module = $_POST['module'];
    $formative = $_POST['formative'];
    $summative = $_POST['summative'];
    $total = $formative + $summative;

    mysqli_query($conn, "UPDATE Marks SET Trainee_Id='$trainee', Module_Id='$module', Formative_Assessment='$formative', Summative_Assessment='$summative', Total_Marks='$total' WHERE Mark_Id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mark</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Mark</h2>
    <form method="POST" class="space-y-4">
        <select name="trainee" required class="block w-full border p-2">
            <?php while($t = mysqli_fetch_assoc($trainees)):
                $selected = $t['Trainee_Id'] == $mark['Trainee_Id'] ? 'selected' : '';
                echo "<option value='{$t['Trainee_Id']}' $selected>{$t['FirstNames']} {$t['LastName']}</option>";
            endwhile; ?>
        </select>
        <select name="module" required class="block w-full border p-2">
            <?php while($m = mysqli_fetch_assoc($modules)):
                $selected = $m['Module_Id'] == $mark['Module_Id'] ? 'selected' : '';
                echo "<option value='{$m['Module_Id']}' $selected>{$m['Module_Name']}</option>";
            endwhile; ?>
        </select>
        <input type="number" name="formative" value="<?= $mark['Formative_Assessment'] ?>" class="block w-full border p-2" required>
        <input type="number" name="summative" value="<?= $mark['Summative_Assessment'] ?>" class="block w-full border p-2" required>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</body>
</html>