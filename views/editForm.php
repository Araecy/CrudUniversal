<h1>Edit Record</h1>

<form method="POST" action="index.php?action=update&type=<?php echo $type; ?>&id=<?php echo $record['id']; ?>">

    <label>Type</label>
    <select name="type" required>
        <?php foreach ($types as $key => $label): ?>
            <option value="<?php echo $key; ?>" <?php echo $key === $record['type'] ? 'selected' : ''; ?>>
                <?php echo $label; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($record['title']); ?>" required>
    <br><br>

    <textarea name="content" placeholder="Content" required><?php echo htmlspecialchars($record['content']); ?></textarea>
    <br><br>

    <button type="submit">Update</button>

</form>

<br>

<form method="POST" action="index.php?action=delete&type=<?php echo $type; ?>&id=<?php echo $record['id']; ?>" onsubmit="return confirm('Are you sure you want to delete this record?');">
    <button type="submit">Delete</button>
</form>

<br>

<a href="index.php?action=index&type=<?php echo $type; ?>">Back to List</a>
