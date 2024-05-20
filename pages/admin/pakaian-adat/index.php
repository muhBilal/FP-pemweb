<?php
require '../../../controller/pakaianAdatController.php';
$pakaian_adat = getPakaianAdat();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deletePakaianAdat($id);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Traditional Attires</title>
</head>
<body>
<h1>List of Traditional Attires</h1>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pakaian_adat as $pakaian) { ?>
        <tr>
            <td><?php echo $pakaian['name']; ?></td>
            <td><?php echo $pakaian['description']; ?></td>
            <td>
                <a href="/pemweb/pages/admin/pakaian-adat/update.php?id=<?php echo $pakaian['id']; ?>">Update</a>
<!--                <a href="index.php?id=--><?php //echo $pakaian['id']; ?><!--" onclick="return confirm('Are you sure you want to delete this traditional attire?')">Delete</a>-->
                <a href="index.php?id=<?php echo $pakaian['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>