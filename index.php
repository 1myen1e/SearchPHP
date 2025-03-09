<?php
include 'connect-db.php';
include 'ultilities.php';

$search = $_GET['search'] ?? '';
$sort_by = $_GET['sort_by'] ?? 'id';
$order = $_GET['order'] ?? 'asc';

$valid_columns = ['id', 'name', 'age'];
if (!in_array($sort_by, $valid_columns)) $sort_by = 'id';
$order = $order === 'desc' ? 'desc' : 'asc';

$sql = "SELECT `id`, `name`, `age` FROM users";
if ($search) {
    $sql .= " WHERE `name` LIKE '%" . $conn->real_escape_string($search) . "%'";
}
$sql .= " ORDER BY $sort_by $order";
$result = $conn->query($sql);

$toggle_order = $order === 'asc' ? 'desc' : 'asc';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search & Sort</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="GET">
        <input type="text" name="search" placeholder="Search..." value="<?= $search ?>">
        <input type="hidden" name="sort_by" value="<?= $sort_by ?>">
        <input type="hidden" name="order" value="<?= $order ?>">
        <button type="submit">Search</button>
    </form>
    <table>
        <tr>
            <th><a href="?search=<?= $search ?>&sort_by=id&order=<?= $toggle_order ?>">ID <?= getSortIcon('id', $sort_by, $order) ?></a></th>
            <th><a href="?search=<?= $search ?>&sort_by=name&order=<?= $toggle_order ?>">Name <?= getSortIcon('name', $sort_by, $order) ?></a></th>
            <th><a href="?search=<?= $search ?>&sort_by=age&order=<?= $toggle_order ?>">Age <?= getSortIcon('age', $sort_by, $order) ?></a></th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['age'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif ?>
    </table>
</body>
</html>
