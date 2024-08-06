<!DOCTYPE html>
<html>
<head>
    <title>Key-Value Manager</title>
</head>
<body>
    <div class="container">
        <h1>Submit Key-Value Pair</h1>
        <form method="post" action="<?php echo site_url('KeyValueController/set_value'); ?>">
            <label for="key">Key:</label>
            <input type="text" id="key" name="key" required>

            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required>

            <button type="submit">Submit</button>
        </form>

        <h1>View or Delete Value by Key</h1>
        <form method="post" action="<?php echo site_url('KeyValueController/fetch_value'); ?>" id="fetchForm">
            <label for="key_fetch">Key:</label>
            <input type="text" id="key_fetch" name="key" required>
            
            <button type="submit">Fetch Value</button>
        </form>

        <form method="post" action="<?php echo site_url('KeyValueController/delete_value'); ?>" id="deleteForm" style="display:inline;">
            <input type="hidden" id="key_delete" name="key">
            <button type="submit" onclick="setDeleteKey()">Delete</button>
        </form>

        <?php if (isset($key) && isset($value)) { ?>
            <div class="result">
                <h2>Result:</h2>
                <p><strong>Key:</strong> <?php echo $key; ?></p>
                <p><strong>Value:</strong> <?php echo $value; ?></p>
            </div>
        <?php } ?>

        <a href="<?php echo site_url('KeyValueController/company_info'); ?>">View Company Information</a>
    </div>

    <script>
        function setDeleteKey() {
            document.getElementById('key_delete').value = document.getElementById('key_fetch').value;
        }
    </script>
</body>
</html>
