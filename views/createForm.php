<h1>Create <?php echo ucfirst($type); ?></h1>

<form method="POST" action="index.php?action=store&type=<?php echo $type; ?>">

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
            window.location.href = "index.php?action=create&type=" + this.value;
        });
    </script>

    <br><br>

    <input type="text" name="title" placeholder="Title" required>
    <br><br>

    <textarea name="content" placeholder="Content" required></textarea>
    <br><br>

    <button type="submit">Save</button>

</form>