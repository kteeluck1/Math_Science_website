<?php include "config.php"; ?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Task Tracker</title>
</head>
<body>

<h1>Tasks</h1>

<form method="POST" action="add.php">
  <input type="text" name="title" required>
  <button type="submit">Add</button>
</form>

<ul>
<?php
$result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<li>";
    echo $row['is_done'] ? "<s>{$row['title']}</s>" : $row['title'];
    echo " <a href='done.php?id={$row['id']}'>[done]</a>";
    echo " <a href='delete.php?id={$row['id']}'>[x]</a>";
    echo "</li>";
}
?>
</ul>

</body>
</html>
