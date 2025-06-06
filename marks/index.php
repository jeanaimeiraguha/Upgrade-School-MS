<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT Marks.*, Trainees.FirstNames, Trainees.LastName, Modules.Module_Name FROM Marks 
    JOIN Trainees ON Marks.Trainee_Id = Trainees.Trainee_Id 
    JOIN Modules ON Marks.Module_Id = Modules.Module_Id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Marks List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
    <h2 class="text-2xl font-bold mb-4">Marks List</h2>
    <a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Add Mark</a>
    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Trainee</th>
                <th class="px-4 py-2">Module</th>
                <th class="px-4 py-2">Formative</th>
                <th class="px-4 py-2">Summative</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Decision</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): 
                $decision = ($row['Total_Marks'] >= 70) ? "Competent" : "Not Yet Competent";
            ?>
            <tr>
                <td class="border px-4 py-2"><?= htmlspecialchars($row['FirstNames'] . ' ' . $row['LastName']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($row['Module_Name']) ?></td>
                <td class="border px-4 py-2"><?= $row['Formative_Assessment'] ?></td>
                <td class="border px-4 py-2"><?= $row['Summative_Assessment'] ?></td>
                <td class="border px-4 py-2"><?= $row['Total_Marks'] ?></td>
                <td class="border px-4 py-2 <?= $decision === 'Competent' ? 'text-green-600 font-bold' : 'text-red-600 font-bold' ?>">
                    <?= $decision ?>
                </td>
                <td class="border px-4 py-2">
                    <a href="edit.php?id=<?= $row['Mark_Id'] ?>" class="text-blue-500 hover:underline">Edit</a>
                    <a href="delete.php?id=<?= $row['Mark_Id'] ?>" class="text-red-500 hover:underline ml-2">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
