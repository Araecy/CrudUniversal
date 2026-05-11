<h1><?php echo ucfirst($type); ?> List</h1>

<a href="index.php?action=create&type=<?php echo $type; ?>">
    Create New
</a>

<hr>

<?php foreach ($records as $record): ?>

    <h3><?php echo htmlspecialchars($record['title']); ?></h3>
    <p><?php echo htmlspecialchars($record['content']); ?></p>

    <hr>

<?php endforeach; ?>