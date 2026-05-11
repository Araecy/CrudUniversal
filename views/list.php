<h1><?php echo ucfirst($type); ?> List</h1>

<label>Type</label>
<select id="typeSelector">
    <?php foreach ($types as $key => $label): ?>
        <option value="<?php echo $key; ?>" <?php echo $key === $type ? 'selected' : ''; ?>>
            <?php echo $label; ?>
        </option>
    <?php endforeach; ?>
</select>

<script>
    document.getElementById("typeSelector").addEventListener("change", function () {
        window.location.href = "index.php?action=index&type=" + this.value;
    });
</script>

<br><br>

<a href="index.php?action=create&type=<?php echo $type; ?>">
    Create New
</a>

<hr>

<?php foreach ($records as $record): ?>

    <h3><?php echo htmlspecialchars($record['title']); ?></h3>
    <p><?php echo htmlspecialchars($record['content']); ?></p>

    <a href="index.php?action=edit&type=<?php echo $type; ?>&id=<?php echo $record['id']; ?>">Edit</a>
    <a href="index.php?action=delete&type=<?php echo $type; ?>&id=<?php echo $record['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>

    <hr>

<?php endforeach; ?>