<html>
<head>
    <title>View Value</title>
</head>
<body>
    <h1>View Value by Key</h1>
    <form method="post" action="<?php echo site_url('KeyValueController/fetch_value'); ?>">
        <label for="key">Key :</label>
        <input type="text" id="key" name="key" required>
        <button type="submit">Fetch Value</button>
    </form>

    <?php if (isset($value)) { ?>
        <h2>Result:</h2>
        <?php if ($value) { ?>
            <p>Key: <?php echo $value['key']; ?></p>
            <p>Value: <?php echo $value['value']; ?></p>
        <?php } else { ?>
            <p>No value found for the given key.</p>
        <?php } ?>
    <?php } ?>
</body>
</html>
